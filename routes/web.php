<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthJWTController;
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

Route::get('/aaa', function () {
    return view('welcome');
});
Route::get('/tes', function(){
    return view('welcome');
});

Route::post('/auth/register', [AuthController::class, 'register'])->name('auth.register');
Route::post('/auth/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/auth/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::post('/jwt/login', [AuthJWTController::class, 'login'])->name('jwt.login');

Route::group(['middleware' => 'jwt-auth'], function () {
    Route::get('/users', function(){
        return 'yeeee';
    });
});