<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\Order;
use App\Models\OrderMaterial;
use App\Models\PalletMaterial;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class OrderMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Order $order)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the step Two Form for creating a new order.
     *
     * @return \Illuminate\Http\Response
     */
    public function createStepTwo(Request $request)
    {
        $order = $request->session()->get('order');
        $orderMaterial = $request->session()->get('orderMaterial');
        $palletMaterials = $order->pallet->palletMaterials;
        $collections = Material::all();
        $materials = collect();
        foreach ($collections as $collection) {
            if (!($palletMaterials->contains('material_id', $collection->product_id))) {
                $materials->push($collection);
            }
        }
        return view('orders.create-step-two', compact('order', 'orderMaterial', 'palletMaterials', 'materials'));
    }

    /**
     * Post Request to create step1 info in session
     *
     * @return \Illuminate\Http\Response
     */
    public function postCreateStepTwo(Request $request)
    {
        $order = $request->session()->get('order');
        $request->session()->forget('order');
        $array1 = $request->product;
        $array2 = $request->existMaterial;

        if ($array1 !== null) {
            for ($i = 0; $i < count($array1); $i++) {
                if ($array1[$i]['total_quantity'] > 0) {
                    $quantity = $request->product[$i]['total_quantity'] * $order->quantity_production;
                    OrderMaterial::create(['order_id' => $request->product[$i]['order_id'],
                        'material_id' => $request->product[$i]['material_id'], 'total_quantity' => $quantity]);
                }
            }
        }
        if ($array2 !== null){
            for ($j = 0; $j < count($array2); $j++) {
                if ($array2[$j]['total_quantity'] > 0) {
                    $quantity = $request->existMaterial[$j]['total_quantity'] * $order->quantity_production;
                    OrderMaterial::create(['order_id' => $request->existMaterial[$j]['order_id'],
                        'material_id' => $request->existMaterial[$j]['material_id'], 'total_quantity' => $quantity]);
                }
            }
        }

        (new OrderController)->statusChangeCheck();
        return redirect(route('orders.show', compact('order')));
    }

    /**
     * Show the step Two Form for updateing an order.
     *
     * @return \Illuminate\Http\Response
     */
    public function editStepTwo(Request $request)
    {
        $order = $request->session()->get('order');
        $orderMaterials = OrderMaterial::where('order_id', $order->id)->get();
        $collections = Material::all();
        $materials = collect();
        foreach ($collections as $collection) {
            if (!($orderMaterials->contains('material_id', $collection->product_id))) {
                $materials->push($collection);
            }
        }
//        foreach($materials as $key=>$products){
//            dd($products->product_id);
//        }

        return view('orders.edit-step-two', compact('order', 'materials', 'orderMaterials'));
    }

    /**
     * Post Request to update step2 info in session
     *
     * @return \Illuminate\Http\Response
     */
    public function updateEditStepTwo(Request $request)
    {
        $order = $request->session()->get('order');
        $request->session()->forget('order');
        $orderMaterials = $order->orderMaterials;
        $array1 = $request->product;
        $array2 = $request->existMaterial;

        for ($i = 0; $i < count($array1); $i++) {
                if ($array1[$i]['total_quantity'] > 0) {
                    $quantity = $request->product[$i]['total_quantity'] * $order->quantity_production;
                    OrderMaterial::create(['order_id' => $request->product[$i]['order_id'],
                        'material_id' => $request->product[$i]['material_id'], 'total_quantity' => $quantity]);
                }
        }
        if ($array2 !== null) {
            for ($i = 0; $i < count($array2); $i++) {
                $exists = false;
                $j = 0;
                while ($exists === false && $j < count($orderMaterials)) {
                    if ($array2[$i]['material_id'] == $orderMaterials[$j]->material_id) {
                        $exists = true;
                        if ($request->existMaterial[$i]['total_quantity'] > 0) {
                            $orderMaterials[$j]->update(['total_quantity' => ($request->existMaterial[$i]['total_quantity'] * $order->quantity_production)]);
                        } else {
                            $orderMaterials[$j]->delete();
                        }

                    }
                    $j++;
                }
                if ($exists === false) {
                    if ($array2[$i]['total_quantity'] > 0) {
                        $quantity = $request->product[$i]['total_quantity'] * $order->quantity_production;
                        OrderMaterial::create(['order_id' => $request->product[$i]['order_id'],
                            'material_id' => $request->product[$i]['material_id'], 'total_quantity' => $quantity]);
                    }
                }
            }
        }

        (new OrderController)->statusChangeCheck();
        (new OrderController)->orderEdited($order);
        return redirect(route('orders.show', $order));
    }


    /**
     * Display the specified resource.
     *
     * @param \App\Models\Order $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Order $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Order $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Order $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order, OrderMaterial $orderMaterial)
    {
        $orderMaterial->delete();
        return redirect(route('orders.show', $order));
    }

    /**
     * this function validates the attributes of Retro
     * @param Request $request
     * @return array
     */
    public function validateMaterialOrder(Request $request): array
    {
        $validatedAtributes = $request->validate([
            'order_id' => 'required',
            'material_id' => 'required',
            'total_quantity' => 'required|integer|min:0',
        ]);

        return $validatedAtributes;
    }

    // status manipulation

}
