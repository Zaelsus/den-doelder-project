<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class InitialFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $check = false;
        $i = 1;

        while(!$check && $i <= 100) {
            $order = Order::all()->random();
            $order_id = $order->id;
            $initial = $order->initial;
//            $production_id = $production->id;

//            dd($production);
            if ($initial === null) {
//                dd('hi');
                $check = true;
//                dd($production);
//                echo is_null($production);

//                dd($check);
//                dd($order_id);
            }
//            echo $check;
            $i++;
            if($check) {
                return [
                    'order_id' => $order_id
                ];
            }
        }

    }
}
