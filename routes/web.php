<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Good;
use App\Http\Controllers\UserController;

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
//para crear ruta bienes

Route::get('goods', function () {
    return view('goods.index');
})->name('goods.index');

//para formulario crear productos

Route::get('goods/create', function () {
    return view('goods.create');
})->name('goods.create');

//para almacenar registros

Route::post('goods', function (Request $request) {
})->name('goods.store');


//para el login
/*
Route::get('/', function () {
    return view('welcome');
});
*/

//para el login
/*
Route::post('/register', 'App\Http\Controllers\RegisterController@show');

Route::post('/register', 'App\Http\Controllers\RegisterController@register');
*/

Route::get('/', function () {
    return view('home');
})->name('home');

/*
Rutas users
*/

Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users/{id}', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users', [UserController::class, 'update'])->name('users.update');

/*
Rutas users
*/

