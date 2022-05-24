<?php

//check if initial check with order id has been created if yes button enabled else button disabled
namespace App\Http\Controllers;

use App\Models\Initial;
use Illuminate\Http\Request;

class InitialController extends Controller
{
//    /**
//     * Display a listing of the resource.
//     *
//     * @return \Illuminate\Http\Response
//     */
//    public function index()
//    {
//        //
//    }

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
    public function store(Request $request)
    {
        Initial::create($this->validateInitial($request));

        // redirecting to show a page
        return redirect(route('initialCheck.show'))->with('success','an item has been created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Initial  $initial
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $initial = Initial::latest()->first();
        return view('initialCheck.show', compact('initial'));
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
        dd($initial);
        return redirect(route('initialCheck.show'));
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
        return redirect(route('initialCheck.create'))->with('success','an item has been deleted');
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
            'soortTick'=>'required|boolean',
            'soortAang'=>'min:0',
            'soortHtKd'=>'min:0',

            'balkTick'=>'required|boolean',
            'balkAang'=>'min:0',
            'balkHtKd'=>'min:0',

            'afmeting1Tick'=>'required|boolean',
            'afmeting1Aang'=>'min:0',
            'afmeting1HtKd'=>'min:0',

            'afmeting2Tick'=>'required|boolean',
            'afmeting2Aang'=>'min:0',
            'afmeting2HtKd'=>'min:0',

//            Onderdek
            'brugTick'=>'required|boolean',
            'brugAang'=>'min:0',
            'brugHtKd'=>'min:0',

            'rond2xTick'=>'required|boolean',
            'rond2xAang'=>'min:0',
            'rond2xHtKd'=>'min:0',

            'rond3xTick'=>'required|boolean',
            'rond3xAang'=>'min:0',
            'rond3xHtKd'=>'min:0',

            'kruisTick'=>'required|boolean',
            'kruisAang'=>'min:0',
            'kruisHtKd'=>'min:0',

            'elementenTick'=>'required|boolean',
            'elementenAang'=>'min:0',
            'elementenHtKd'=>'min:0',

            'dubbelTick'=>'required|boolean',
            'dubbelAang'=>'min:0',
            'dubbelHtKd'=>'min:0',

//            Overig
            'hoekenTick'=>'required|boolean',
            'hoekenAang'=>'min:0',
            'hoekenHtKd'=>'min:0',

            'stempelsTick'=>'required|boolean',
            'stempelsAang'=>'min:0',
            'stempelsHtKd'=>'min:0',

            'stapelTick'=>'required|boolean',
            'stapelAang'=>'min:0',
            'stapelHtKd'=>'min:0',

            'strappenTick'=>'required|boolean',
            'strappenAang'=>'min:0',
            'strappenHtKd'=>'min:0',

            'kamerTick'=>'required|boolean',
            'kamerAang'=>'min:0',
            'kamerHtKd'=>'min:0',

            'specialeTick'=>'required|boolean',
            'specialeAang'=>'min:0',
            'specialeHtKd'=>'min:0',

            'additionalNotes'=> 'min:0'
        ]);
        return $validatedAtributes;
    }
}
