<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed $invoice_items
 * @property mixed $application
 */
class Invoice extends Model
{
    protected $table = 'invoices';

    protected $fillable = [
        'application_id', 'status', 'date_paid','amount', 'pk', 'bill_ref', 'description'
    ];

    public function application()
    {
        return $this->belongsTo(Application::class, 'application_id');
    }

    public function invoice_items()
    {
        return $this->hasMany(InvoiceItem::class, 'invoice_id');
    }

    /**
     * Boot all of the bootable traits on the model.
     */
    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->pk = \Uuid::generate()->string;
        });

        static::saving(function ($model) {
            $model->pk = \Uuid::generate()->string;
        });
    }

    public static function create_invoice($application_id, array $items, $description)
    {
        $invoice = null;
        \DB::transaction(function() use (&$invoice, $application_id, $items, $description){
            $_items =  collect($items);

            $invoice  =  new self([
                'application_id' => $application_id,
                'status' => 'unpaid',
                'amount' => $_items->sum('amount'),
                'bill_ref' => generate_random_string(),
                'description' => $description
            ]);

            $invoice->save();

            $invoice_items  =  self::parse_items($items, $invoice);
            //insert invoice items
            $invoice->invoice_items()->saveMany($invoice_items);

            $invoice->get_pesaflow_bill_ref();
            $invoice->send_invoice_notification();
        });

        return $invoice;
    }


    public function get_pesaflow_bill_ref()
    {
        $ref  = create_pesaflow_bill($this->pk, intval(round($this->amount)), $this->description, $this->application->user);
        /*
        $this->bill_ref =  $ref;
        $this->save();
        */

        return $ref;
    }

    public function send_invoice_notification()
    {

    }

    public static function parse_items(array  $items, self  $invoice)
    {
        return array_map(function($item) use($invoice){
            return new InvoiceItem([
                'invoice_id' => $invoice
            ] + $item);
        }, $items);
    }

    public function get_payment_signature($currency = 'KES')
    {
        $config = \App\Libs\PaymentManager::get_default_manager_settings();
        $user  =  $this->application->user;

        return sign_pesaflow_payload([
            $config['apiClientId'], intval(round($this->amount)), $config['apiServiceId'], $user->id_number,
            $currency, $this->bill_ref, $this->notes, $user->full_name, $config['apiSecret']
        ], $config['apiKey']);
    }
}
