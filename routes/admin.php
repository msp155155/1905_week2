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

Route::prefix('/Admin')->group(function () {
    Route::get('index', 'Admin\Admin@index');
    Route::get('addUser', 'Admin\Admin@addUser');
    Route::any('addUserDo', 'Admin\Admin@addUserDo');
    Route::get('userList', 'Admin\Admin@userList');
    Route::get('login', 'Index\Login@login');
    Route::any('loginDo', 'Index\Login@loginDo');
    Route::any('updateInfo', 'Index\Login@updateInfo');
    Route::any('edit', 'Index\Login@edit');
    Route::any('editUser', 'Admin\Admin@editUser');
    Route::get('update', function () {
        return view('index.update');
    });
});

