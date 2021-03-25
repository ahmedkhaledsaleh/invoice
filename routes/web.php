<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RoleController;
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

Route::get('/', function () {
    return view('dashboard.home.index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function() {
    Route::group(['prefix'=>'roles'],function () {
        Route::get('/',[App\Http\Controllers\Dashboard\RoleController::class, 'index'])->name('roles.index');
        Route::get('/create',[App\Http\Controllers\Dashboard\RoleController::class, 'create'])->name('roles.create');
        Route::post('/store',[App\Http\Controllers\Dashboard\RoleController::class, 'store'])->name('roles.store');
        Route::get('/edit/{id}',[App\Http\Controllers\Dashboard\RoleController::class, 'edit'])->name('roles.edit');
        Route::post('/update/{id}',[App\Http\Controllers\Dashboard\RoleController::class, 'update'])->name('roles.update');
        Route::get('/show/{id}',[App\Http\Controllers\Dashboard\RoleController::class, 'show'])->name('roles.show');
        Route::post('/destroy',[App\Http\Controllers\Dashboard\RoleController::class, 'destroy'])->name('roles.destroy');
    });

    Route::group(['prefix'=>'users'],function () {
        Route::get('/',[App\Http\Controllers\Dashboard\UserController::class, 'index'])->name('users.index');
        Route::get('/create',[App\Http\Controllers\Dashboard\UserController::class, 'create'])->name('users.create');
        Route::post('/store',[App\Http\Controllers\Dashboard\UserController::class, 'store'])->name('users.store');
        Route::get('/edit/{id}',[App\Http\Controllers\Dashboard\UserController::class, 'edit'])->name('users.edit');
        Route::post('/update/{id}',[App\Http\Controllers\Dashboard\UserController::class, 'update'])->name('users.update');
        Route::post('/destroy',[App\Http\Controllers\Dashboard\UserController::class, 'destroy'])->name('users.destroy');
        Route::post('/updatepassword',[App\Http\Controllers\Dashboard\UserController::class, 'updatepassword'])->name('users.updatepassword');
    });
//    Route::resource('roles', \App\Http\Controllers\Dashboard\RoleController::class);
//    Route::resource('users', \App\Http\Controllers\Dashboard\UserController::class);
});
