<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendSms implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    /**
     * @var
     */
    private $to;
    /**
     * @var array
     */
    private $payload;
    /**
     * @var
     */
    private $message;

    /**
     * Create a new job instance.
     *
     * @param $to
     * @param $message
     * @internal param array $payload
     */
    public function __construct($to, $message)
    {
        //
        $this->to = encode_phone_number($to);
        $this->message = $message;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        send_sms($this->to, $this->message);
    }

}
