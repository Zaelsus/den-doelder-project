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
        $orderId = $productLocationDetails['orderId'];
        $pallet = $productLocationDetails['pallet'];
        $productLocation = $productLocationDetails['productLocation'];

        if (location === null) {
            $locationName="no location";
            $locationQ=0;
        }
        else{
            $locationName=Location::find('id',$productLocation->location_id);
            $locationQ=$productLocationDetails->pa;
    }

        return view('productLocations.show', compact('locationName','locationQ', 'pallet', 'orderId'));
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
        $orderId = $productLocationDetails['orderId'];
        $productLocation = $productLocationDetails['productLocation'];

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
        $location = $productLocationDetails['location'];

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
        //
    }

    public function validateLocationChange(Request $request){
        $validatedAtributes = $request->validate([
            'name'=>'required',
        ]);

        return $validatedAtributes;
    }

    public function getProductLocation(Order $order)
    {
        $productLocation = ProductLocation::where('product_id', $order->pallet->product_id)->first();

        return $productLocation;
    }
}
