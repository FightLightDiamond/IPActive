<?php

namespace IPActive\Listeners;

use IPActive\Events\IPActiveEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use IPActive\Models\IpActiveLog;

class IPActiveListener
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
     * @param  IPActiveListener  $event
     * @return void
     */
    public function handle(IPActiveEvent $event)
    {
        IpActiveLog::create($event->data);
    }
}
