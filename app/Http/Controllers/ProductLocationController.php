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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\ProductLocation $productLocation
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
//        $productLocationDetails = $this->getPallettLocation($order);
//
////        if (location === null) {
////            $locationName="no location";
////            $locationQ=0;
////        }
////        else{
////            $locationName=Location::find('id',$productLocation->location_id);
////            $locationQ=$productLocationDetails->pa;
////    }
//
//        return view('productLocations.show', compact('locationName','locationQ', 'pallet', 'orderId'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\ProductLocation $productLocation
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
     * @param \App\Models\ProductLocation $productLocation
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
     * @param \App\Models\ProductLocation $productLocation
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductLocation $productLocation)
    {
        //
    }

    public function validateLocationChange(Request $request)
    {
        $validatedAtributes = $request->validate([
            'location_id' => 'required|integer',
            'product_id' => 'required|integer',
            'Quantity' => 'required|integer|min:0',
        ]);

        return $validatedAtributes;
    }

    public function getPallettLocation(Order $order)
    {
        $palletId = $order->pallet->product_id;
        $productLocations = ProductLocation::where('product_id', $palletId)->get();
        $locationsQuantity = [];
        foreach ($productLocations as $productLocation) {
            $locationsQuantity['location' . '_' . $productLocation->location_id . '_' . 'id'] = $productLocation->location->id;
            $locationsQuantity['location' . '_' . $productLocation->location_id . '_' . 'name'] = $productLocation->location->name;
            $locationsQuantity['location' . '_' . $productLocation->location_id . '_' . 'quantity'] = $productLocation->Quantity;
        }
        return ['locationsQuantity' => $locationsQuantity, 'productLocations' => $productLocations];
    }

    /**
     * Function to list all pallet locations
     *
     * @param $order - the order
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function list(Order $order)
    {
        $productLocationDetails = $this->getPallettLocation($order);
        $locationsQuantity = $productLocationDetails['locationsQuantity'];
        $productLocations = $productLocationDetails['productLocations'];

        return view('productLocations.index', compact('order', 'locationsQuantity', 'productLocations'));
    }

    /**
     * Function to add a new location and quantity of a pallet
     *
     * @param $order - the order
     * @param $locationId - the pallet's location
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function addLocation(Order $order)
    {
        $locations = Location::where('type', 'Pallets')->get();

        return view('productLocations.create', compact('locations', 'order'));
    }

    /**
     * Function to store the new location and quantity of a pallet
     *
     * @param $order - the order
     * @param $locationId - the pallet's location
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function storeLocation(Request $request, Order $order)
    {
        ProductLocation::create($this->validateLocationChange($request));

        return redirect(route('productLocations.list', $order));

    }

    /**
     * Function to edit the location and quantity of a pallet
     *
     * @param $order - the order
     * @param $locationId - the pallet's location
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function editLocation(Order $order, $locationId)
    {
        $palletLocation = Location::where('id', $locationId)->first();
        $palletQuantity = ProductLocation::where('product_id', $order->pallet_id)->where('location_id', $locationId)->first();

        return view('productLocations.edit', compact('palletLocation', 'palletQuantity', 'order'));
    }

    /**
     * Function to update the location and quantity of a pallet
     *
     * @param $order - the order
     * @param $locationId - the pallet's location
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function updateLocation(Request $request, Order $order, $locationId)
    {
        $palletQuantity = ProductLocation::where('product_id', $order->pallet_id)->where('location_id', $locationId)->first();
        $this->validateLocationChange($request);

        $loggedAmount = $request->Quantity;
        $request->Quantity = $palletQuantity->increasePalletQuantity($loggedAmount);

        $palletQuantity->update();

        return redirect(route('productLocations.list', $order));

    }
}
