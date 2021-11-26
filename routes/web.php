<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('user/verify/{token}', [App\Http\Controllers\UserController::class, 'verify']);

Route::middleware(['auth:sanctum', 'verified'])->prefix('admin')->group(function () {
    Route::get('cities', [App\Http\Controllers\CityController::class, 'index'])->name('admin.cities');
    Route::get('clients', [App\Http\Controllers\ClientController::class, 'index'])->name('admin.clients');
    Route::get('users', [App\Http\Controllers\UserController::class, 'index'])->name('admin.users');
});
