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


Route::middleware('jwt.auth')->name('page.')->group(function () {
    // Unauthenticated
    Route::get('login', 'IndexController@login')->name('login');
    Route::get('register', 'IndexController@register')->name('register');

    // Authenticated
    Route::get('dashboard', 'UserController@dashboard')->name('user.dashboard');

    Route::resource('histories', 'HistoryController')->only(['index', 'create', 'edit']);
    Route::get('report', 'UserController@report')->name('user.report');

    Route::middleware('user.auth')->group(function () {
        Route::resource('histories', 'HistoryController')->only(['show', 'edit']);
    });

    Route::middleware('admin.auth')->group(function () {
//        Route::get('dashboard', 'AdminController@dashboard')->name('admin.dashboard');

        Route::resource('categories', 'CategoryController')->only(['index', 'create', 'edit']);
        Route::resource('types', 'TypeController')->only(['index', 'create', 'edit']);
    });
});

Route::prefix('system')->name('system.')->group(function () {
    Route::prefix('auth')->group(function () {
        Route::post('login', 'AuthController@login')->name('login');
        Route::post('register', 'AuthController@register')->name('register');

        Route::middleware('jwt.auth')->group(function () {
            Route::get('logout', 'AuthController@logout')->name('logout');
        });
    });

    Route::middleware('jwt.auth')->group(function () {
        // User
        Route::resource('histories', 'HistoryController')->only('store');

        Route::patch('updateIncome', 'UserController@updateIncome')->name('updateIncome');

        Route::middleware('user.auth')->group(function () {
            Route::resource('histories', 'HistoryController')->only(['update', 'destroy']);
        });

        // Admin
        Route::resource('categories', 'CategoryController')->only('store');
        Route::resource('types', 'TypeController')->only('store');

        Route::middleware('admin.auth')->group(function () {
            Route::resource('categories', 'CategoryController')->only(['update', 'destroy']);
            Route::resource('types', 'TypeController')->only(['update', 'destroy']);
        });
    });
});
