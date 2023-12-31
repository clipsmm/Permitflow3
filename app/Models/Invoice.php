<?php

namespace App\Models;

use App\Jobs\SendSms;
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
            $model->pk = generate_random_string(7);
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
            $invoice->currency = settings('e-visa.currency', 'KES');
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
        $ref  = create_pesaflow_bill($this->pk, intval(round($this->amount)), $this->description, $this->application->user, $this->currency);
        $this->bill_ref =  $ref;
        $this->save();

        return $ref;
    }

    public function send_invoice_notification($email = false)
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

    public function get_payment_signature()
    {
        $config = \App\Libs\PaymentManager::get_default_manager_settings();
        $user  =  $this->application->user;

        return sign_pesaflow_payload([
            $config['apiClientId'], intval(round($this->amount)), $config['apiServiceId'], $user->id_number,
            $this->currency, $this->pk, $this->description, $user->full_name, $config['apiSecret']
        ], $config['apiKey']);
    }

    public function get_status_label()
    {
        switch ($this->status) {
            case 'paid':
                return '<span class="label label-success"><i class="fa fa-check"></i> paid </span>';
            case 'processing':
                return '<span class="label label-info"><i class="fa fa-info"></i> processing </span>';
            case 'unpaid':
                return '<span class="label label-danger"><i class="fa fa-ban"></i> not paid </span>';
            case 'cancelled':
                return '<span class="label label-default"><i class="fa fa-trash"></i> cancelled </span>';
            case 'pending':
                return '<span class="label label-danger"><i class="fa fa-ban"></i> not paid </span>';
            default:
                break;
        }
    }
}
