<?php

use App\Http\Controllers\{InitialController,
    OrderController,
    HourlyReportController,
    NoteController,
    OrderMaterialController,
    ProductionController,
    PalletController,
    MachineController};
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//home page
Auth::routes();
Route::get('/', function () {
    return view('auth.login');
});

// this is temporary until we add the login to the right role and the right production line
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Machines
Route::resource('/machines', MachineController::class);
//select machine
Route::post('/machines/{machine}/{user}', [MachineController::class, 'selectMachine'])->name('machines.selectMachine');

// Order
Route::resource('/orders', OrderController::class);

// Pallets
Route::resource('/pallets', PalletController::class);

//Production View
//start production route
Route::post('/orders/start/{order}', [OrderController::class, 'startProduction'])->name('orders.startProduction');
//stop production route
Route::post('/orders/stop/{order}/{machine}', [OrderController::class, 'stopProduction'])->name('orders.stopProduction');
//stop production route
Route::post('/orders/pause/{order}', [OrderController::class, 'pauseProduction'])->name('orders.pauseProduction');

//Admin View
//select
Route::post('/orders/select/{order}', [OrderController::class, 'selectOrder'])->name('orders.selectOrder');
//unselect
Route::post('/orders/unselect/{order}', [OrderController::class, 'unselectOrder'])->name('orders.unselectOrder');
//stop production route
Route::post('/orders/cancel/{order}', [OrderController::class, 'cancelOrder'])->name('orders.cancelOrder');

// OrderMaterials
Route::resource('/orderMaterials', OrderMaterialController::class);

////pallet editing route
// Route::get('/orders/{order}/editquantity', [OrderController::class, 'editquantity'])->name('orders.editquantity');
//Route::put('/orders/{order}', [OrderController::class, 'addquantity'])->name('orders.addquantity');

//Initial Check
Route::resource('/initial', InitialController::class);

//Production Check
Route::resource('/production', ProductionController::class);

// Hourly Check-up
Route::resource('/hourlyReports', HourlyReportController::class);

// Notes
Route::resource('/notes', NoteController::class);
Route::get('/notes/stoppage/{order}', [NoteController::class, 'stoppage'])->name('notes.stoppage');
Route::get('notes/fixStoppage/{note}', [NoteController::class, 'fixStoppage'])->name('notes.fixStoppage');


