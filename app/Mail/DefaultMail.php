<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class DefaultMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $view;

    public $user;

    public $payload;

    /**
     * Create a new message instance.
     *
     * @param $view
     * @param array|null $payload
     */
    public function __construct($view, array $payload = null)
    {
        $this->view  =  $view;
        $this->payload = $payload;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view($this->view);
    }
}
