<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class DefaultMail extends Mailable
{
    use Queueable, SerializesModels;

    public $view;

    public $payload;
    public $downloads;

    /**
     * Create a new message instance.
     *
     * @param $view
     * @param array|null $payload
     */
    public function __construct($view, array $payload = null, array $attachments =  [])
    {
        $this->view  =  $view;
        $this->payload = $payload;
        $this->downloads  = $attachments;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $view  = $this->view($this->view, $this->payload)->subject("Hi");

        collect($this->downloads)->each(function($item) use (&$view){
            $file  =  $item['file'];
            $view->attach(storage_path($file), [
                'as' => "{$item['name']}.pdf",
                'mime' => 'application/pdf',
            ]);
        });

        return $view;
    }
}
