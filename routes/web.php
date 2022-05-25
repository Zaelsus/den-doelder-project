<?php

use App\Http\Controllers\{OrderController, OrderMaterialController, HourlyReportController, ProductionController};
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

//start production route
Route::post('/orders/start/{order}', [OrderController::class, 'startProduction'])->name('orders.startProduction');

//stop production route
Route::post('/orders/stop/{order}', [OrderController::class, 'stopProduction'])->name('orders.stopProduction');

//stop production route
Route::post('/orders/pause/{order}', [OrderController::class, 'pauseProduction'])->name('orders.pauseProduction');

// OrderMaterials
Route::resource('/orderMaterials', OrderMaterialController::class);

// Drawings
Route::get('/drawings', function () {
    return view('drawings.show');
});

//Production Check
Route::get('/prodCheck', [ProductionController::class, 'show'])->name('prodCheck.show');
Route::post('/prodCheck', [ProductionController::class, 'store'])->name('prodCheck.store');
Route::get('/prodCheck/create', [ProductionController::class, 'create'])->name('prodCheck.create');;
Route::get('/prodCheck/{prodCheck}/edit', [ProductionController::class, 'edit'])->name('prodCheck.edit'); //name wildcat the same in controller RMB
Route::put('/prodCheck/{prodCheck}', [ProductionController::class, 'update'])->name('prodCheck.update');
Route::get('/prodCheck/{prodCheck}/delete', [ProductionController::class, 'destroy'])->name('prodCheck.delete');

// Hourly Check-up
Route::resource('/hourlyReports', HourlyReportController::class);

