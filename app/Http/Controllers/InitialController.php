<?php

//check if initial check with order id has been created if yes button enabled else button disabled
namespace App\Http\Controllers;

use App\Models\Initial;
use App\Models\Production;
use Illuminate\Http\Request;
use App\Models\Order;

class InitialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect(route('home'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('initialCheck.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreInitialRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Initial $initial)
    {
        $order = Order::isSelected();

//        dd($initial);
        $initial = Initial::create($this->validateInitial($request));
        $initial->assignorderid($order->id);
//        dd($initial);
        // redirecting to show a page
        return redirect(route('initial.show',$initial))->with('success','an item has been created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Initial  $initial
     * @return \Illuminate\Http\Response
     */
    public function show(initial $initial)
    {
        $order = $initial->order;
        return view('initialCheck.show', compact('order','initial'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Initial  $initial
     * @return \Illuminate\Http\Response
     */
    public function edit(Initial $initial)
    {
        return view('initialCheck.edit', compact('initial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateInitialRequest  $request
     * @param  \App\Models\Initial  $initial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Initial $initial)
    {
        $initial->update($this->validateInitial($request));
        return redirect(route('initial.show', $initial));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Initial  $initial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Initial $initial)
    {
        $initial->delete();
        return redirect(route('initial.index'))->with('success','an item has been deleted');
    }

    /**
     * this function validates the attributes or Production
     * @param Request $request
     * @return array
     */
    public function validateInitial(Request $request): array
    {
        $validatedAtributes = $request->validate([
            'afmetingTickB'=>'required|boolean',
            'afmetingAangB'=>'min:0',
            'afmetingHtKdB'=>'min:0',

            'aantalTick'=>'required|boolean',
            'aantalAang'=>'min:0',
            'aantalHtKd'=>'min:0',


            'klampenTick'=>'required|boolean',
            'klampenAang'=>'min:0',
            'klampenHtKd'=>'min:0',

            'schimmelTick'=>'required|boolean',
            'schimmelAang'=>'min:0',
            'schimmelHtKd'=>'min:0',

            'waanTick'=>'required|boolean',
            'waanAang'=>'min:0',
            'waanHtKd'=>'min:0',

//            Klossen
            'soortTick'=>'min:0',
            'soortAang'=>'min:0',
            'soortHtKd'=>'min:0',

            'balkTick'=>'min:0',
            'balkAang'=>'min:0',
            'balkHtKd'=>'min:0',

//            Onderdek
            'onderdek'=>'required',
            'onderdekAang'=>'min:0',
            'onderdekHtKd'=>'min:0',


//            Overig
            'hoekenTick'=>'required|boolean',
            'hoekenAang'=>'min:0',

            'stempelsTick'=>'required|boolean',
            'stempelsAang'=>'min:0',

            'stapelTick'=>'required|boolean',
            'stapelAang'=>'min:0',

            'strappenTick'=>'required',
            'strappenAang'=>'min:0',

            'kamerTick'=>'required',
            'kamerAang'=>'min:0',


            'additionalNotes'=> 'min:0'
        ]);
        return $validatedAtributes;
    }
}
