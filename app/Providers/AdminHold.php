<?php

namespace App\Providers;

use App\Providers\AutomaticStatusChange;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AdminHold
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
     * @param \App\Providers\AutomaticStatusChange $event
     * @return void
     */
    public function handle(AutomaticStatusChange $event)
    {
        $userInfo = $event->user;
        $orders = $event->orders;

        if ($userInfo->role === 'Administrator') {
            foreach ($orders as $order) {
                if (count($order->orderMaterials) === 0 || $order->machine->name === 'None' || $order->start_date === null) {
                    $order->update(['status' => 'Admin Hold']);
                }
            }
        }

    }

}
