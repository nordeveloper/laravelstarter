<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\IndexController;
use App\Http\Controllers\Dashboard\AuthController;
use App\Http\Controllers\Dashboard\UsersController;
use App\Http\Controllers\Dashboard\RolesController;
use App\Http\Controllers\Dashboard\PermissionController;
use App\Http\Controllers\Dashboard\FilemanagerController;

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
    return view('layouts.welcome');
});


Route::prefix('dashboard')->group(function(){
    
    Route::get('/', [IndexController::class, 'index']);

    Route::get('/auth', [AuthController::class, 'index']);
    Route::post('/auth/login', [AuthController::class, 'login']);
    // Route::get('/auth/resetpassword', [AuthController::class, 'resetpassword']);
    
    Route::resource('/users', UsersController::class);
    
    Route::resource('/roles', RolesController::class);

    Route::resource('/permission', PermissionController::class);

    Route::resource('/filemanager', FilemanagerController::class);
    
    
});


require __DIR__.'/auth.php';
