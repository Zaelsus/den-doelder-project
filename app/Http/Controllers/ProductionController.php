<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Production;
use App\Models\Order;

class ProductionController extends Controller
{
//    /**
//     * Display a listing of the resource.
//     *
//     * @return \Illuminate\Http\Response
//     */
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
//        dd($order->id);
        return view('prodCheck.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Production $production)
    {
        $order = Order::isSelected();

        $production = Production::create($this->validateProduction($request));

        $production->assignorderid($order->id);

        // redirecting to show a page
        return redirect(route('production.show',$production))->with('success','an item has been created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Production $production
     * @return \Illuminate\Http\Response
     */
    public function show(Production $production)
    {
        $order = $production->order;
        return view('prodCheck.show', compact('production', 'order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Production $production
     * @return \Illuminate\Http\Response
     */
    public function edit(Production $production)
    {
//        dd($production);
        return view('prodCheck.edit', compact('production'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Production $production
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Production $production)
    {
        $production->update($this->validateProduction($request));
//        dd($production);
        return redirect(route('production.show', $production));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Production $production
     * @return \Illuminate\Http\Response
     */
    public function destroy(Production $production)
    {
        $production->delete();
        return redirect(route('production.index'))->with('success','an item has been deleted');
    }

    /**
     * this function validates the attributes or Production
     * @param Request $request
     * @return array
     */
    public function validateProduction(Request $request): array
    {
        $validatedAtributes = $request->validate([
            'afmetingTickB'=>'required|boolean',
            'afmetingAangB'=>'min:0',
            'afmetingCorrectB'=>'min:0',

            'aantalTick'=>'required|boolean',
            'aantalAang'=>'min:0',
            'aantalCorrect'=>'min:0',

            'spatiesTick'=>'required|boolean',
            'spatiesAang'=>'min:0',
            'spatiesCorrect'=>'min:0',

            'klampenTick'=>'required|boolean',
            'klampenAang'=>'min:0',
            'klampenCorrect'=>'min:0',

            'overstekTickB'=>'required|boolean',
            'overstekAangB'=>'min:0',
            'overstekCorrectB'=>'min:0',

//            Klossen
            'soort'=>'required_if:balk,null',
            'soortAang'=>'min:0',
            'soortHtKd'=>'min:0',

            'balk'=>'required_if:soort,null',
            'balkAang'=>'min:0',
            'balkHtKd'=>'min:0',

//            Onderdek
            'onderdek'=>'required',
            'onderdekAang'=>'min:0',
            'onderdekHtKd'=>'min:0',

//            Overig
            'hoekenTick'=>'required|boolean',
            'hoekenAang'=>'min:0',
            'hoekenCorrect'=>'min:0',

            'stempelsTick'=>'required|boolean',
            'stempelsAang'=>'min:0',
            'stempelsCorrect'=>'min:0',

            'stapelTick'=>'required',
            'stapelAang'=>'min:0',
            'stapelCorrect'=>'min:0',

            'strappenTick'=>'required',
            'strappenAang'=>'min:0',
            'strappenCorrect'=>'min:0',

            'spijkerTick'=>'required',
            'spijkerAang'=>'min:0',
            'spijkerCorrect'=>'min:0',

            'additionalNotes'=> 'min:0'
        ]);
        return $validatedAtributes;
    }

}
