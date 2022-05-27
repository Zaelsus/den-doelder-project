<?php

use App\Http\Controllers\{InitialController,
    OrderController,
    HourlyReportController,
    OrderMaterialController,
    ProductionController,
    PalletController};
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


// Order
Route::resource('/orders', OrderController::class);

// Pallets
Route::resource('/pallets', PalletController::class);

//start production route
Route::post('/orders/start/{order}', [OrderController::class, 'startProduction'])->name('orders.startProduction');

//stop production route
Route::post('/orders/stop/{order}', [OrderController::class, 'stopProduction'])->name('orders.stopProduction');

//stop production route
Route::post('/orders/pause/{order}', [OrderController::class, 'pauseProduction'])->name('orders.pauseProduction');

// OrderMaterials
Route::resource('/orderMaterials', OrderMaterialController::class);

//Initial Check
Route::resource('/initial', InitialController::class);

//Production Check
Route::resource('/production', ProductionController::class);

// Hourly Check-up
Route::resource('/hourlyReports', HourlyReportController::class);

//500 error temp
Route::get('servererror', function () {
    abort(500);
})->name('servererror');

