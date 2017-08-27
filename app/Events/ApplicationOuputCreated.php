<?php

namespace App\Events;

use App\Models\ApplicationOutput;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ApplicationOuputCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $output;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(ApplicationOutput $output)
    {
        $this->output =  $output;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
