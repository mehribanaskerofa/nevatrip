<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;


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


Route::resource('orders', OrderController::class)->except('show','update','edit','destroy');
Route::resource('order', OrderController::class)->except('show','update','edit','destroy');

//Route::post('/orders', [OrderController::class, 'createOrder']);

Route::get('/', function () {
    return view('welcome');
});
