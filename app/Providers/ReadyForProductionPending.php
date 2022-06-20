<?php

namespace App\Providers;

use App\Providers\AutomaticStatusChange;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ReadyForProductionPending
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
                if ($order->status === 'Admin Hold' || $order->status === 'Quality Check Pending') {
                    if ((\App\Models\Order::initialCheckExists($order)) && $order->start_date !== null && $order->machine->name !== 'None' && count($order->orderMaterials) > 0) {
                        $order->update(['status' => 'Production Pending']);
                    }
                }
            }

        }
    }
}
