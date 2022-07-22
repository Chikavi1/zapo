<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\RewardsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MovementsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DispatcherController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can update web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[HomeController::class, 'welcome']);

Route::get('/suppliers',[SupplierController::class, 'index']);
Route::get('/suppliers/create',[SupplierController::class, 'create']);
Route::post('/suppliers/store',[SupplierController::class, 'store']);
Route::patch('/suppliers/update',[SupplierController::class, 'update'])->name('suppliers.update');
Route::get('/suppliers/edit/{id}',[SupplierController::class, 'edit'])->name('suppliers.edit');
Route::get('/suppliers/show/{id}',[SupplierController::class, 'show'])->name('suppliers.show');
Route::delete('/suppliers/destroy',[SupplierController::class, 'destroy'])->name('suppliers.destroy');
Route::post('suppliers/register',[SupplierController::class,'register'])->name('suppliers.register');
Route::post('suppliers/available',[SupplierController::class,'available'])->name('suppliers.available');

Auth::routes();


Route::get('/rewards',[RewardsController::class, 'index']);
Route::get('/rewards/create',[RewardsController::class, 'create']);
Route::post('/rewards/store',[RewardsController::class, 'store']);
Route::patch('/rewards/update',[RewardsController::class, 'update'])->name('rewards.update');
Route::get('/rewards/edit/{id}',[RewardsController::class, 'edit'])->name('rewards.edit');
Route::get('/rewards/show/{id}',[RewardsController::class, 'show'])->name('rewards.show');
Route::post('/rewards/destroy',[RewardsController::class, 'destroy'])->name('rewards.destroy');

Route::get('/profile',[HomeController::class,'profile'])->name('profile');
Route::get('/edit-profile',[HomeController::class,'editProfile'])->name('edit-profile');
Route::patch('/update-profile',[HomeController::class,'updateProfile'])->name('update-profile');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/movements', [App\Http\Controllers\MovementsController::class, 'index'])->name('movements.index');
Route::get('/movements/create', [App\Http\Controllers\MovementsController::class, 'create'])->name('movements.create');

Route::post('logout', [HomeController::class, 'logout'])->name('logout');

Route::get('/give_rewards',[HomeController::class,'give_rewards'])->name('give_rewards');

Route::get('search_cellphone',[UserController::class,'searchCellphone'])->name('search');

Route::get('/sendMessage',[HomeController::class,'sendMessage'])->name('sendMessage');
Route::get('/reset',[HomeController::class,'reset'])->name('reset');

Route::get('/stats',[HomeController::class,'stats'])->name('stats');
Route::get('/edit-landing',[HomeController::class,'editLanding'])->name('editLanding');
Route::patch('/edit-landing/store',[HomeController::class, 'storeLanding'])->name('storeLanding');


Route::get('/dispatcher',[DispatcherController::class,'index'])->name('dispatcher');
Route::get('/dispatcher/create',[DispatcherController::class,'create'])->name('dispatcher.create');
Route::post('/dispatcher/store',[DispatcherController::class,'store'])->name('dispatcher.store');
Route::get('/dispatcher/edit/{id}',[DispatcherController::class,'edit'])->name('dispatcher.edit');
Route::patch('/dispatcher/update',[DispatcherController::class,'update'])->name('dispatcher.update');
Route::post('/dispatcher/destroy',[DispatcherController::class, 'destroy'])->name('dispatcher.destroy');



Route::get('/users',[UserController::class,'index'])->name('users');
Route::post('/users/destroy',[UserController::class,'destroy'])->name('users.destroy');


Route::post('/createTransaction',[HomeController::class,'transaction'])->name('transaction');
Route::post('/createReclaim',[HomeController::class,'reclaim'])->name('reclaim');

Route::get('/redeem',[HomeController::class,'redeem'])->name('redeem');

Route::get('/convert',[HomeController::class,'convert'])->name('convert');

Route::get('/nosotros',[HomeController::class,'nosotros'])->name('nosotros');

Route::get('/howworks',[HomeController::class,'howworks'])->name('howworks');

