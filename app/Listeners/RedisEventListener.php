<?php

namespace App\Listeners;

use App\Events\RedisEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class RedisEventListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  RedisEvent  $event
     * @return void
     */
    public function handle(RedisEvent $event)
    {
        //
    }
}
