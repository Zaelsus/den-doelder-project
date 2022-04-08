<?php

use App\Http\Controllers\CompletedController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OnholdController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TruckController;

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

Route::get('/', [WelcomeController::class, 'show']);

Route::resource('/home', HomeController::class);


//truck/TODO
Route::get('/truck/todo', [TruckController::class, 'index'])->name('todo.index');
Route::get('/truck/todo/{order}', [TruckController::class, 'show'])->name('todo.show');
Route::get('/truck/todo/{order}/edit', [TruckController::class, 'edit'])->name('todo.edit'); //name wildcat the same in controller RMB
Route::put('/truck/todo/{order}', [TruckController::class, 'update'])->name('todo.update');

//COMPLETED
Route::get('/truck/completed', [CompletedController::class, 'index'])->name('completed.index');
Route::get('/truck/completed/{order}', [CompletedController::class, 'show'])->name('completed.show');

////ON HOLD
Route::get('/truck/onhold', [OnholdController::class, 'index'])->name('onhold.index');
Route::get('/truck/onhold/{order}', [OnholdController::class, 'show'])->name('onhold.show');
