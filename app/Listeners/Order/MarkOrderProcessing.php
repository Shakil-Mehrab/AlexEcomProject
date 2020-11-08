<?php

namespace App\Listeners\Order;

use App\Models\Order;
use App\Events\OrderCreated;

class MarkOrderProcessing
{
    /**
     * Handle the event.
     *
     * @param  OrderCreated  $event
     * @return void
     */
    public function handle($event)
    {

        $event->order->update([
            'status'=>Order::PROSSESING
        ]);
    }
}
