<?php

namespace App\Providers;

use App\Providers\StatusChangeProduction;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class Paused
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

        //If the status is "In Production" and the last note is an error note, or the label of the last note is "Lunch
        //Break", "End of Shift" or "Cleaning", set the status of the production to "Paused".
        if (($order->status === 'In Production') && (substr($note->label, -7) === '(Error)'
                || $note->label === 'Lunch Break' || $note->label === 'End of Shift' || $note->label === 'Cleaning')) {
            $order->update(['status' => 'Paused']);
        }
    }
}
