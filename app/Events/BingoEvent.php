<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class BingoEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $balance;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($balance)
    {
        $this->balance = $balance;
        $to_name = 'Тима Ращектаев';
        $to_email = '2616220@gmail.com';
        $data = array('name'=>"Sam Jose", "body" => "Test mail");
        Mail::send('mails.bingo', $data, function($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)->subject('Artisans Web Testing Mail');
            $message->from('olololo@gmail.ru','Artisans Web');
        });
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
