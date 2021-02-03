<?php

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

Route::group(['middleware' => 'auth'], function() {
    Route::group(['middleware' => ['role:super-admin']], function () { // Super Admin
        // Role
        Route::prefix('admin')->name('admin.')->group( function() {
            Route::resource('/admin/role', 'RoleController')->except([
                'create', 'show', 'edit', 'update'
            ]);
        });
        // User
        Route::prefix('admin')->name('admin.')->group( function() {
            Route::resource('/users', 'UserController')->except([
                'show'
            ]);
            Route::get('/users/roles/{id}', 'UserController@roles')->name('users.roles');
            Route::put('/users/roles/{id}', 'UserController@setRole')->name('users.set_role');
        });
    });

    Route::get('/home', 'HomeController@index')->name('home');
});