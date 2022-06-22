<?php

namespace Database\Seeders;

use App\Models\Material;
use App\Models\Order;
use App\Models\OrderMaterial;
use App\Models\PalletMaterial;
use Illuminate\Database\Seeder;

class OrderMaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orders=Order::all();
        foreach($orders as $order){
            $pallet = $order->pallet;
            $palletMaterials = PalletMaterial::where('pallet_id', $pallet->product_id)->get();
//            $this->command->info(json_encode($palletMaterials));
            foreach ($palletMaterials as $palletMaterial) {
                OrderMaterial::factory(1)->create(
                    [
                        'order_id' => $order->id,
                        'material_id' => $palletMaterial->material_id,
                        'total_quantity' => ($palletMaterial->total_quantity) * ($order->quantity_production),

                    ]
                );
            }
        }
    }
}
