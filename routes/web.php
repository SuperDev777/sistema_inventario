<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GoodController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Auth;

/*
    Rutas para logearse al sistema
*/

Route::get('/login', function () {
    return view('auth.log-in');
})->name('login');

Route::post('/login', function () {
    $credentias = request()->only('email', 'password');

    if (Auth::attempt($credentias)) {
        return redirect()->route('home');
    }

    return back()->with('error', 'Usuario y/o contraseña incorrectas.');
})->name('login');

/*
    Rutas atenticadas
*/

Route::middleware(['auth'])->group(function () {

    // Ruta principal
    Route::get('/', function () {
        return view('home');
    })->name('home');

    /*
        Rutas users
    */
    Route::middleware(['admin'])->group(function () {
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/users', [UserController::class, 'store'])->name('users.store');
        Route::get('/users/{id}', [UserController::class, 'edit'])->name('users.edit');
        Route::put('/users', [UserController::class, 'update'])->name('users.update');
    });

    /*
        Rutas goods
    */

    Route::get('/goods', [GoodController::class, 'index'])->name('goods.index');
    Route::get('/goods/create', [GoodController::class, 'create'])->name('goods.create');
    Route::post('/goods', [GoodController::class, 'store'])->name('goods.store');
    Route::get('/goods/{id}', [GoodController::class, 'edit'])->name('goods.edit');
    Route::put('/goods', [GoodController::class, 'update'])->name('goods.update');

    Route::get('/goods/export/excel', [GoodController::class, 'exporExcel'])->name('goods.exporExcel');


    /*
        Rutas equipments
    */

    Route::get('/equipments', [EquipmentController::class, 'index'])->name('equipments.index');
    Route::get('/equipments/create', [EquipmentController::class, 'create'])->name('equipments.create');
    Route::post('/equipments', [EquipmentController::class, 'store'])->name('equipments.store');
    Route::delete('/equipments/{id}', [EquipmentController::class, 'destroy'])->name('equipments.destroy');
    Route::get('/equipments/{id}', [EquipmentController::class, 'edit'])->name('equipments.edit');
    Route::put('/equipments', [EquipmentController::class, 'update'])->name('equipments.update');

    Route::get('/equipments/export/excel', [EquipmentController::class, 'exporExcel'])->name('equipments.exporExcel');


    /*
        Rutas orders
    */

    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/create', [OrderController::class, 'create'])->name('orders.create');
    Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
    Route::delete('/orders/{id}', [OrderController::class, 'destroy'])->name('orders.destroy');
    Route::get('/orders/{id}', [OrderController::class, 'edit'])->name('orders.edit');
    Route::put('/orders', [OrderController::class, 'update'])->name('orders.update');

    Route::get('/orders/export/excel', [OrderController::class, 'exporExcel'])->name('orders.exporExcel');
});
