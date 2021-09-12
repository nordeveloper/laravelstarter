<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\IndexController;
use App\Http\Controllers\Dashboard\AuthController;
use App\Http\Controllers\Dashboard\UsersController;
use App\Http\Controllers\Dashboard\RolesController;
use App\Http\Controllers\Dashboard\PagesController;

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

    Route::get('/auth', [AuthController::class, 'index'])->name('dashboard.auth');
    Route::post('/auth/login', [AuthController::class, 'login'])->name('dashboard.auth.login');
    Route::get('/auth/resetpassword', [AuthController::class, 'resetpassword'])->name('dashboard.auth.resetpassword');
    
    Route::resource('/users', UsersController::class);
    
    Route::resource('/roles', RolesController::class);

    Route::resource('/permission', PermissionController::class);

    Route::resource('/filemanager', FilemanagerController::class);
    
    Route::resource('/pages', PagesController::class);

    Route::any('/menus', [App\Http\Controllers\Dashboard\MenusController::class,'index']);
    Route::any('/menus/builder/{param}', [App\Http\Controllers\Dashboard\MenusController::class,'builder']);
    Route::any('/menus/builder/{param}/additem', [App\Http\Controllers\Dashboard\MenusController::class,'additem']);
    Route::any('/menus/builder/edit/{param}', [App\Http\Controllers\Dashboard\MenusController::class,'edit']);
    Route::any('/menus/builder/menuitemadd', [App\Http\Controllers\Dashboard\MenusController::class,'menuitemadd']);
    Route::any('/menus/builder/menuitemupdate/{param}', [App\Http\Controllers\Dashboard\MenusController::class, 'menuitemupdate']);
    Route::any('/menus/builder/menuitemremove/{param}', [App\Http\Controllers\Dashboard\MenusController::class, 'menuitemremove']); 

});


require __DIR__.'/auth.php';
