<?php

use App\Http\Controllers\CampusController;
use App\Http\Controllers\DetailOrderController;
use App\Http\Controllers\DetailReceivedController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GoodController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RecivedController;
use App\Models\DetailOrder;
use App\Models\DetailReceived;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/*
    Rutas para logearse al sistema
*/

Route::get('/login', function () {
    return view('auth.log-in');
})->name('login');

Route::post('/login', function (Request $request) {
    $credentias = request()->only('email', 'password');

    if (Auth::attempt($credentias)) {
        $request->session()->regenerate();
        return redirect()->route('home');
    }

    return back()->with('error', 'Usuario y/o contraseña incorrectas.');
})->name('login');

Route::post('/logout', function (Request $request) {
    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect()->route('login');
})->name('logout');

/*
    Rutas atenticadas
*/

Route::middleware(['auth'])->group(function () {

    // Ruta principal
    Route::get('/', [HomeController::class, 'index'])->name('home');

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
    
    Route::get('/user/{id}', [UserController::class, 'show'])->name('users.show');

    /*
        Rutas campus
    */
    Route::get('/campus', [CampusController::class, 'index'])->name('campus.index');
    Route::get('/campus/create', [CampusController::class, 'create'])->name('campus.create');
    Route::post('/campus', [CampusController::class, 'store'])->name('campus.store');
    Route::delete('/campus/{id}', [CampusController::class, 'destroy'])->name('campus.destroy');
    Route::get('/campus/{id}', [CampusController::class, 'edit'])->name('campus.edit');
    Route::put('/campus', [CampusController::class, 'update'])->name('campus.update');
    Route::get('/campus/export/excel', [CampusController::class, 'exporExcel'])->name('campus.exporExcel');

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
    Route::get('/order/{id}', [OrderController::class, 'show'])->name('orders.show');
    Route::get('/orders/{id}', [OrderController::class, 'edit'])->name('orders.edit');
    Route::put('/orders', [OrderController::class, 'update'])->name('orders.update');

    Route::get('/orders/export/excel', [OrderController::class, 'exporExcel'])->name('orders.exporExcel');

    /*
        Rutas detail orders
    */

    Route::get('/detail-orders/{id}/create', [DetailOrderController::class, 'create'])->name('detailOrders.create');
    Route::post('/detail-orders', [DetailOrderController::class, 'store'])->name('detailOrders.store');
    Route::delete('/detail-orders/{id}', [DetailOrderController::class, 'destroy'])->name('detailOrders.destroy');


    /*
        Rutas receives
    */

    Route::get('/receives', [RecivedController::class, 'index'])->name('receives.index');
    Route::get('/receives/create', [RecivedController::class, 'create'])->name('receives.create');
    Route::post('/receives', [RecivedController::class, 'store'])->name('receives.store');
    Route::delete('/receives/{id}', [RecivedController::class, 'destroy'])->name('receives.destroy');
    Route::get('/received/{id}', [RecivedController::class, 'show'])->name('receives.show');
    Route::get('/receives/{id}', [RecivedController::class, 'edit'])->name('receives.edit');
    Route::put('/receives', [RecivedController::class, 'update'])->name('receives.update');

    Route::get('/receives/export/excel', [OrderController::class, 'exporExcel'])->name('receives.exporExcel');

    /*
        Rutas detail receives
    */

    Route::get('/detail-receives/{id}/create', [DetailReceivedController::class, 'create'])->name('detailReceives.create');
    Route::post('/detail-receives', [DetailReceivedController::class, 'store'])->name('detailReceives.store');
    Route::delete('/detail-receives/{id}', [DetailReceivedController::class, 'destroy'])->name('detailReceives.destroy');
});
