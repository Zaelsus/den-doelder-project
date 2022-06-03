<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductLocation;
use Illuminate\Http\Request;

class ProductLocationController extends Controller
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductLocation  $productLocation
     * @return \Illuminate\Http\Response
     */
    public function show($order)
    {
        $productLocationDetails = $this->getProductLocation($order);
        $orderId = $productLocationDetails[0];
        $pallet = $productLocationDetails[1];
        $productLocation = $productLocationDetails[2];

        return view('productLocations.show', compact('productLocation', 'pallet', 'orderId'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductLocation  $productLocation
     * @return \Illuminate\Http\Response
     */
    public function edit($order)
    {
        $productLocationDetails = $this->getProductLocation($order);
        $orderId = $productLocationDetails[0];
        $productLocation = $productLocationDetails[2];

        return view('productLocations.edit', compact('productLocation', 'orderId'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductLocation  $productLocation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $order)
    {

        $productLocationDetails = $this->getProductLocation($order);
        $location = $productLocationDetails[3];

        $location->update($this->validateLocationChange($request));

        return redirect(route('productLocations.show', $order));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductLocation  $productLocation
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductLocation $productLocation)
    {

    }

    public function validateLocationChange(Request $request){
        $validatedAtributes = $request->validate([
            'name'=>'required',
        ]);

        return $validatedAtributes;
    }

    public function getProductLocation($details)
    {
        $order = Order::find($details);
        $orderId = $order->id;
        $pallet = $order->pallet;
        $product = Product::find($pallet->product_id);
        $productLocation = ProductLocation::where('product_id', $product->id)->first();
        $location = Location::find($productLocation->location_id);

        return [$orderId, $pallet, $productLocation, $location];
    }
}
