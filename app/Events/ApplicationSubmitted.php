<?php

namespace App\Events;

use App\Models\Application;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ApplicationSubmitted
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $application;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Application $application)
    {
        $this->application =  $application;
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
