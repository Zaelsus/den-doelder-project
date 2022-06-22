<?php

namespace App\Providers;

use App\Providers\AlertOrderChange;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class OrderEdited
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Handle the event.
     *
     * @param  \App\Providers\AlertOrderChange  $event
     * @return void
     */
    public function handle(AlertOrderChange $event)
    {
        $userInfo = $event->user;
        $order = $event->order;
        if ($userInfo->role === 'Administrator') {
            if($order->status==='In Production'){
                $event->changed=true;
            }
        }

        if($userInfo->role === 'Production' &&  $event->changed) {
            return redirect(route('modals.orderUpdate', $order));
        }
    }
}
