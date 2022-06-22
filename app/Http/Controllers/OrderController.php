<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Machine;
use App\Models\Order;
use App\Models\Pallet;
use App\Models\Product;
use App\Models\ProductLocation;
use App\Providers\AutomaticStatusChange;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //looking about adding another order by accoridng to status as well as scheduled production
        $orders = Order::orderBy('machine_id', 'desc')->get();
        $previousMachine=null;
        //automatic status change
        $this->statusChangeCheck();
        return view('orders.index', compact('orders','previousMachine'));
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
     * Show the step One Form for creating a new product.
     *
     * @return \Illuminate\Http\Response
     */
    public function createStepOne(Request $request)
    {
        $pallets = Pallet::all();
        $machines = Machine::where('name','!=','None')->get();
        $nullMachine = Machine::where('name','None')->first();
        $order = $request->session()->get('order');

        return view('orders.create-step-one',compact('order','pallets','machines','nullMachine'));
    }

    /**
     * Post Request to store step1 info in session
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postCreateStepOne(Request $request)
    {
        $validatedData = $this->validateOrder($request);
            $order = new Order();
            $order->fill($validatedData);
            $request->session()->put('order', $order);
        $order->save();
        return redirect()->route('orders.create.step.two');
    }


    /**
     * Show the step One Form for editing a product.
     *
     * @return \Illuminate\Http\Response
     */
    public function editStepOne(Request $request,Order $order)
    {
        $pallets = Pallet::all();
        $machines = Machine::all();
        return view('orders.edit-step-one', compact('order','pallets','machines'));

    }

    /**
     * Post Request to update step1 info in session
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateEditStepOne(Request $request,Order $order)
    {
        $order->update($this->validateOrder($request));
        $request->session()->put('order', $order);
        $order->save();
        $this->statusChangeCheck();
        return redirect()->route('orders.edit.step.two', compact('order'));
    }


    /**
     * Display the specified resource.
     *
     * @param \App\Models\Order $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $productLocationsDetails = $this->getMaterialsLocation($order);
        $materialLocationsList=$productLocationsDetails['materialLocationsList'];
        $materialsLocations=$productLocationsDetails['materialsLocations'];
        //automatic status change
        $this->statusChangeCheck();
        $driving = $this->testForDriving($order);

        return view('orders.show', compact('order', 'materialLocationsList','materialsLocations', 'driving'));

    }

    /**
     * Function that tests if a driver is driving for an order on the same machine
     *
     * @param $order
     * @return bool
     */
    public function testForDriving($order): bool
    {
        $orders = $order->machine->orders;

        foreach($orders as $order) {
            if($order->truckDriver_status === "Driving") {
                return true;
            }
        }

        return false;
    }


    /**
     * Function that finds the locations for the materials
     *
     * @param $details
     * @return $materialsLocations
     */
    public function getMaterialsLocation(Order $order)
    {
        $materials = $order->orderMaterials;
        $materialsLocations =[];
        $materialLocationsList=[];
        foreach($materials as $material) {
            $materialId = $material->material_id;
            $productlocations = productLocation::where('product_id', $materialId)->get();
            $materialLocationsList[$materialId]=$productlocations;
            foreach ($productlocations as $productlocation) {
                //location name for each location for each material
                $materialsLocations[ $materialId.'_'.$productlocation->location_id.'_'.'name'] = $productlocation->location->name;
                //quantity in storage for each material in each location
                $materialsLocations[ $materialId.'_'.$productlocation->location_id.'_'.'quantity'] = $productlocation->Quantity;
            }
        }
        return ['materialsLocations' => $materialsLocations,'materialLocationsList'=>$materialLocationsList];
    }


    /**
     * Function that finds the locations for the pallets
     *
     * @param $details
     * @return array
     */
    public function getPalletLocation(Order $order)
    {
        $productId = $order->pallet->product_id;
        $productLocations = ProductLocation::where('product_id',$productId)->get();
        $locationsAvailability=[];
        foreach($productLocations as $productLocation){
            $locationsAvailability[$productLocation->location_id]=$productLocation->location->available_storage_space;
        }
        return ['locationsAvailability'=>$locationsAvailability,'productLocations'=>$productLocations];
    }

    /**
     * changes the status of the current order to in production
     */
    public static function startProduction(Order $order)
    {
        if($order->machine !== null && $order->start_date !== null && ($order->status==='Production Pending'||$order->status==='Paused')) {
            if ($order->status === 'Production Pending') {
                $order->update(['status' => 'In Production', 'start_time' => date('Y-m-d H:i:s')]);
                return redirect(route('orders.show', $order));
            } else {
                $order->update(['status' => 'In Production']);
                return redirect(route('orders.show', $order));
            }
        } else {
            return redirect(route('orders.show', $order))->with('error', 'Cannot start production for this order at the moment please contact administration');
        }
    }

    public static function startDriving(Order $order)
    {
        if($order->machine !== null && $order->start_date !== null && ($order->status==='Production Pending'||$order->status==='Paused'|| $order->status === 'In Production')) {
            $order->update(['truckDriver_status' => 'Driving']);
        }
            return redirect(route('orders.show', $order));
    }

    /**
     * changes the status of the current order to done
     */
    public static function stopProduction(Order $order ,Machine $machine)
    {
        $order->update(['status' => 'Done', 'end_time' => date('Y-m-d H:i:s')]);
        return redirect(route('machines.show',compact('machine')));
    }

    /**
     * changes the status of the current order to done
     */
    public static function pauseProduction(Order $order)
    {
        $order->update(['status' => 'Paused']);
        return redirect(route('notes.stoppage', $order));
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
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect(route('orders.index'));
    }

    /**
     * this function validates the attributes of Order
     * @param Request $request
     * @return array
     */
    public function validateOrder(Request $request): array
    {
        $validatedAtributes = $request->validate([
            'order_number'=>'required',
            'pallet_id'=>'required',
            'machine_id'=>'required',
            'quantity_production'=>'required|integer|min:1',
            'start_date'=>'nullable|date|after:yesterday',
            'site_location'=>'required',
            'production_instructions'=>'nullable',
            'type_order'=>'boolean',
            'client_name' =>'',
            'status'=>'string',
        ]);

        return $validatedAtributes;
    }




    /**
     * changes the status of the current order to Canceled
     */
    public static function cancelOrder(Order $order)
    {
        $order->update(['status' => 'Canceled']);
        return redirect(route('orders.show', $order));
    }

    /**
     * changes the "selected" status of the current order to selected
     */
    public static function selectOrder(Order $order)
    {
        $order->update(['selected' => 1]);
        return redirect(route('orders.show', $order));
    }

    /**
     * changes the "selected" status of the current order to unselected
     */
    public static function unselectOrder(Order $order)
    {
        $order->update(['selected' => 0]);
        return redirect(route('orders.index'));
    }

    /**
     * This function calls the event listener to check if the order should change status
     * @return void
     */
    public function statusChangeCheck(){
        $orders = Order::orderBy('machine_id', 'desc')->get();
        $user = Auth::user();
        event(new AutomaticStatusChange($user,$orders));
    }

    /**
     * Show the form for editing only quantity produced
     *
     * @param \App\Models\Order $order
     * @return \Illuminate\Http\Response
     */
    public function editquantity(Order $order)
    {
//        dd($order);

        return view('orders.editquantity', compact('order'));
    }

    /**
     * Update the quantity produced in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Order $order
     * @return \Illuminate\Http\Response
     */
    public function updatequantity(Request $request, Order $order)
    {
        $validated = $request->validate([
            'add_quantity' => 'required|integer',
        ]);
        try
        {
            $order->update($validated);
            $order->addProduced();
            return redirect(route('orders.editquantity', $order));
        }
        catch (\Exception $exception)
        {
            return redirect(route('orders.editquantity', $order))->with('error', 'The value is higher than the quantity to be produced');

        }

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listOrders()
    {
        //looking about adding another order by accoridng to status as well as scheduled production
//        $orders = Order::where('status', 'Production Pending', 'In Production')->orderBy('machine_id', 'desc')->get();
        $orders = 1;
        dd($orders);
        $previousMachine=null;
        return view('orders.index', compact('orders','previousMachine'));
    }

    public function pauseDriving(Order $order) {
//        dd($order);
//        dd($order->machine);
        $order->update(['truckDriver_status' => 'Paused']);
        return redirect(route('machines.show', ['machine' => $order->machine]));
    }

    /**
     * changes the status of the current order to done
     */
    public static function stopDriving(Order $order)
    {
        $machine = $order->machine;
        $order->update(['truckDriver_status' => 'Delivered']);
        return redirect(route('machines.show', compact('machine')));
    }
}
