<?php

namespace App\Providers;

use App\Providers\AutomaticStatusChange;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class InitialCheckPending
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
                if (!(\App\Models\Order::initialCheckExists($order))) {
                    $order->update(['status' => 'Quality Check Pending']);
                } else {
                    if ($order->status === 'Quality Check Pending') {
                        $order->update(['status' => 'Admin Hold']);
                    }
                }
            }

        }
    }
}
