<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Message;

class RedisEvent implements ShouldBroadcast //cần implements mới lắng nghe đc sự kiện
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */

    public $message;

    public function __construct(Message $message)
    {
        $this->message = $message;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        // tên channel
        return ['channel_chat_support'];
        // return ['chat'];

        // return new PrivateChannel('chat');
    }
    public function broadcastAs(){
        // tên event có thể chọn event mặc định để chat chung
        // return $this->message->tag;
        // return 'message';
        // Nếu chat riêng giữa 2 người nên đặt tag cho cuộc hội thoại để chỉ 2 hoặc 1 nhóm người xem được
        return $this->message->tag;
    }
}
