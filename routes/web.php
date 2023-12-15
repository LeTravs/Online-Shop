<?php
use App\Http\Controllers\SiteController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DeliveryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [SiteController::class, 'welcome']);


//customers
Route::get('/customers', [CustomerController::class, 'index'])->name('customers');
Route::get('/customers/create', [CustomerController::class,'create']);
Route::post('/customers/create',[CustomerController::class,'store']);
Route::get('/customers/{customer}',[CustomerController::class,'edit']);
Route::post('/customers/{customer}',[CustomerController::class,'update']);
Route::delete('/customers/delete/{customer}',[CustomerController::class,'delete']);

//orders
Route::get('/orders', [OrderController::class, 'index'])->name('orders');
Route::get('/orders/create', [OrderController::class, 'create'])->name('orders.create');
Route::post('/orders/create', [OrderController::class, 'store']);
Route::get('/orders/{order}',[OrderController::class,'edit']);
Route::post('/orders/{order}',[OrderController::class,'update']);
Route::delete('/orders/delete/{order}',[OrderController::class,'delete']);

//delivery
Route::get('/deliveries', [DeliveryController::class, 'index'])->name('deliveries');
Route::get('/deliveries/create', [DeliveryController::class, 'create']);
Route::post('/deliveries/create', [DeliveryController::class, 'store'])->name('deliveries.store');
Route::get('/deliveries/{delivery}', [DeliveryController::class, 'edit']);
Route::post('/deliveries/{delivery}', [DeliveryController::class, 'update'])->name('deliveries.update');
Route::delete('/deliveries/{delivery}', [DeliveryController::class, 'destroy'])->name('deliveries.delete');

