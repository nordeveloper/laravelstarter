<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BlogController;
use App\Http\Controllers\IndexController;

use App\Http\Controllers\Dashboard\AuthController;
use App\Http\Controllers\Dashboard\PagesController;
use App\Http\Controllers\Dashboard\RolesController;
use App\Http\Controllers\Dashboard\UsersController;
use App\Http\Controllers\Dashboard\ForntendController;

use App\Http\Controllers\Dashboard\PermissionController;
use App\Http\Controllers\Dashboard\BlogcategoryController;
use App\Http\Controllers\Dashboard\BlogController as DashboardBlog;
use App\Http\Controllers\Dashboard\IndexController as DashboardIndex;


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

Route::get('/', [IndexController::class, 'index']);
Route::get('/blog', [BlogController::class, 'index']);
Route::get('/blog/catagory/{slug}', [BlogController::class, 'index']);
Route::get('/blog/{id}', [BlogController::class, 'detail']);

Route::prefix('dashboard')->group(function(){
    
    Route::get('/', [DashboardIndex::class, 'index']);

    Route::get('/auth', [AuthController::class, 'index'])->name('dashboard.auth');
    Route::post('/auth/login', [AuthController::class, 'login'])->name('dashboard.auth.login');
    Route::get('/auth/resetpassword', [AuthController::class, 'resetpassword'])->name('dashboard.auth.resetpassword');
    
    Route::resource('/users', UsersController::class);    
    Route::resource('/roles', RolesController::class);
    Route::resource('/permission', PermissionController::class);
    
    Route::resource('/blog', DashboardBlog::class);
    Route::resource('/blogcategory', BlogcategoryController::class);
    Route::resource('/pages', PagesController::class);

    Route::resource('/menus', App\Http\Controllers\Dashboard\MenusController::class);
    Route::any('/menus/builder/{param}', [App\Http\Controllers\Dashboard\MenusController::class,'builder']);
    Route::any('/menus/builder/{param}/additem', [App\Http\Controllers\Dashboard\MenusController::class,'additem'])->name('menus.item_add');
    Route::post('/menus/menuitemadd', [App\Http\Controllers\Dashboard\MenusController::class,'menuitemadd'])->name('menus.item_store');

    Route::any('/menus/menuitemedit/{param}', [App\Http\Controllers\Dashboard\MenusController::class,'menuitemedit'])->name('menus.item_edit');
    Route::post('/menus/menuitemupdate/{param}', [App\Http\Controllers\Dashboard\MenusController::class, 'menuitemupdate'])->name('menus.item_update');
    Route::any('/menus/menuitemremove/{param}', [App\Http\Controllers\Dashboard\MenusController::class, 'menuitemremove'])->name('menus.item_remove'); 

    Route::get('/frontend', [ForntendController::class, 'index']);
});


require __DIR__.'/auth.php';
