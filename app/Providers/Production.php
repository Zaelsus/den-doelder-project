<?php

namespace App\Providers;

use App\Providers\StatusChangeProduction;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class Production
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
     * @param \App\Providers\StatusChangeProduction $event
     * @return void
     */
    public function handle(StatusChangeProduction $event)
    {
        $order = $event->order;
        $note = $event->note;

//      If the status is paused and the note is a fix note, update the status to In Production.
        if (($order->status === 'Paused') && ($note->label === 'Fix')) {
            $order->update(['status' => 'In Production']);
        }
    }
}
