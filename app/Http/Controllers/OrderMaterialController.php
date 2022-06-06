<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\Order;
use App\Models\OrderMaterial;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

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
        dd($order->id);
        $materials = Material::all();
        return view('orderMaterials.create',compact('materials','order'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $orderMaterial = OrderMaterial::create($this->validateOrderMaterial($request));
        $order_id = $orderMaterial->order_id;
        $order = Order::find($order_id);
        // redirecting to show a page
        return redirect(route('orders.show', compact('order')));
    }

    /**
     * Show the step One Form for creating a new product.
     *
     * @return \Illuminate\Http\Response
     */
    public function createStepTwo(Request $request)
    {
        $materials = Material::all();
        $order = $request->session()->get('order');
        $orderMaterial = $request->session()->get('orderMaterial');

        return view('orders.create-step-two',compact('order','orderMaterial','materials'));
    }

    /**
     * Show the step One Form for creating a new product.
     *
     * @return \Illuminate\Http\Response
     */
    public function postCreateStepTwo(Request $request)
    {
        $order = $request->session()->get('order');
        $order->save();

        $request->session()->forget('order');

        $validatedData = $request->validate([
            'order_id'=>'required',
            'material_id'=>'required',
            'total_quantity'=>'required|integer|min:0',
        ]);

        if(empty($request->session()->get('orderMaterial'))){
            $orderMaterial = new OrderMaterial();
            $orderMaterial->fill($validatedData);
            $request->session()->put('orderMaterial', $orderMaterial);
        }else{
            $orderMaterial = $request->session()->get('orderMaterial');
            $orderMaterial->fill($validatedData);
            $request->session()->put('orderMaterial', $orderMaterial);
        }
        $orderMaterial->save();
        $request->session()->forget('orderMaterial');


        return redirect(route('orders.show',compact('order')));
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        $material = Material::all();
        return view('orderMaterials.edit', compact('order','material'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Order $order, OrderMaterial  $orderMaterial)
    {
        $orderMaterial->update($this->validateOrderMaterial($request));

        return redirect(route('orders.show', $order));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
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
    public function validateOrder(Request $request): array
    {
        $validatedAtributes = $request->validate([
            'order_id'=>'required',
            'material_id'=>'required',
            'total_quantity'=>'required|integer|min:0',
        ]);

        return $validatedAtributes;
    }

    // status manipulation

}
