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
        return view('productLocations.index');
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
    public function show(Order $order)
    {
        dd($order);
        $productLocationDetails = $this->getPallettLocation($order);
//        $orderId = $productLocationDetails['orderId'];
//        $pallet = $productLocationDetails['pallet'];
//        $productLocation = $productLocationDetails['productLocation'];

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
        $productLocationDetails = $this->getPallettLocation($order);
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

        $productLocationDetails = $this->getPallettLocation($order);
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

    public function getPallettLocation(Order $order)
    {
        $palletId = $order->pallet->product_id;
        $productLocations = ProductLocation::where('product_id',$palletId)->get();
        $locationsQuantity=[];
        foreach($productLocations as $productLocation){
            $locationsQuantity['location'.'_'.$productLocation->location_id.'_'.'id']=$productLocation->location->id;
            $locationsQuantity['location'.'_'.$productLocation->location_id.'_'.'name']=$productLocation->location->name;
            $locationsQuantity['location'.'_'.$productLocation->location_id.'_'.'quantity']=$productLocation->Quantity;
        }
        return ['locationsQuantity'=>$locationsQuantity,'productLocations'=>$productLocations];
    }

    /**
     * Function to list all Hourly Check logs for a specific order
     *
     * @param $details - the order's slug
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function list(Order $order)
    {
        $productLocationDetails = $this->getPallettLocation($order);
        $locationsQuantity = $productLocationDetails['locationsQuantity'];
        $productLocations = $productLocationDetails['productLocations'];
//        dd($productLocation[0]->location_id);

        return view('productLocations.index', compact('order','locationsQuantity', 'productLocations' ));

    }
}
