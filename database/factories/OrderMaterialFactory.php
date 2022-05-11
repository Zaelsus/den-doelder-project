<?php

namespace Database\Factories;

use App\Models\Material;
use App\Models\Order;
use App\Models\OrderMaterial;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderMaterialFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $check = false;
        $i = 0;
        while (!$check && $i <= 100) {
            $order_id = Order::all()->random()->id;
            $material_id = Material::all()->random()->product_id;

            if (OrderMaterial::all()->count() !== 0) {
                $j = 1;
                $innercheck = true;
                while ($innercheck && $j <= OrderMaterial::all()->count()) {
                    $currentRow = OrderMaterial::find($j);
                    $tempOrderID = $currentRow->order_id;
                    $tempMaterialID = $currentRow->material_id;
                    if ($order_id === $tempOrderID && $material_id === $tempMaterialID) {
                        $innercheck = false;
                    } else {
                        $innercheck = true;
                    }
                    $j++;
                }
                if ($innercheck) {
                    $check = true;
                } else {
                    $check = false;
                }

            } else {
                $check = true;
            }
            $i++;
        }
        if($check) {
            return [
                'order_id'=>$order_id,
                'material_id'=>$material_id,
                'test' => 'works',
            ];
        } else {
            return [
            'order_id'=>1,
            'material_id'=>4,
            'test' => 'stop',
        ];
        }
    }
}
