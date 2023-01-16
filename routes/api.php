<?php

use App\Http\Controllers\api\LoginController;
use App\Http\Controllers\api\RegisterController;
use App\Http\Controllers\General;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::resource('general', General::class);

Route::post('register', [RegisterController::class, 'register'])->name('register');

Route::post('login', [LoginController::class, 'login'])->name('login');

// Route::get('user', [LoginController::class, 'user'])->name('user');

Route::get('user/{id}', [LoginController::class, 'unitUser'])->middleware('auth:api')->name('unitUser');