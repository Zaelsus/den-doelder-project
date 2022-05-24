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
//    public function index()
//    {
//        route to the admin view
//        $productions = Production::all();
//        return view('prodCheck.index', compact('productions'));
//    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $orders = Order::all();
        return view('prodCheck.create', $orders);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Production::create($this->validateProduction($request));

        // redirecting to show a page
        return redirect(route('prodCheck.show'))->with('success','an item has been created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Production $production
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $production = Production::latest()->first();
        return view('prodCheck.show', compact('production'));
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
        return redirect(route('prodCheck.show'));
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
        return redirect(route('prodCheck.index'))->with('success','an item has been deleted');
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
            'soortTick'=>'required|boolean',
            'soortAang'=>'min:0',
            'soortCorrect'=>'min:0',

            'balkTick'=>'required|boolean',
            'balkAang'=>'min:0',
            'balkCorrect'=>'min:0',

            'afmeting1Tick'=>'required|boolean',
            'afmeting1Aang'=>'min:0',
            'afmeting1Correct'=>'min:0',

            'afmeting2Tick'=>'required|boolean',
            'afmeting2Aang'=>'min:0',
            'afmeting2Correct'=>'min:0',

//            Onderdek
            'brugTick'=>'required|boolean',
            'brugAang'=>'min:0',
            'brugCorrect'=>'min:0',

            'rondTick'=>'required|boolean',
            'rondAang'=>'min:0',
            'rondCorrect'=>'min:0',

            'kruisTick'=>'required|boolean',
            'kruisAang'=>'min:0',
            'kruisCorrect'=>'min:0',

            'afmetingTickO'=>'required|boolean',
            'afmetingAangO'=>'min:0',
            'afmetingCorrectO'=>'min:0',

            'overstekTickO'=>'required|boolean',
            'overstekAangO'=>'min:0',
            'overstekCorrectO'=>'min:0',
//            Overig
            'hoekenTick'=>'required|boolean',
            'hoekenAang'=>'min:0',
            'hoekenCorrect'=>'min:0',

            'stempelsTick'=>'required|boolean',
            'stempelsAang'=>'min:0',
            'stempelsCorrect'=>'min:0',

            'stapelTick'=>'required|boolean',
            'stapelAang'=>'min:0',
            'stapelCorrect'=>'min:0',

            'strappenTick'=>'required|boolean',
            'strappenAang'=>'min:0',
            'strappenCorrect'=>'min:0',

            'spijkerTick'=>'required|boolean',
            'spijkerAang'=>'min:0',
            'spijkerCorrect'=>'min:0',

            'additionalNotes'=> 'min:0'
        ]);
        return $validatedAtributes;
    }

}
