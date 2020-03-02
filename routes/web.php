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

Route::get('/home', 'HomeController@index');
Route::get('/', 'HomeController@index');

Auth::routes();
Auth::routes(['register' => false]);



Route::get('/unauthorized', function () {
    return view('unauthorized');
});

Route::middleware(['checkadmin'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', 'AdminController@index');
        Route::get('/index', 'AdminController@index');
        Route::get('create', "Admin@createPage");
        Route::get('edit/{id}', "Admin@editPage");
        Route::get('delete/{id}', "Admin@delete");

        Route::post("edit/{id}", 'Admin@edit');
        Route::post("create/{id}", 'Admin@create');
    });
});

Route::middleware(['checkdeadline'])->group(function () {
    Route::prefix('deadline')->group(function () {
        Route::get('/', 'DeadlineController@index');
        Route::get('/index', 'DeadlineController@index');
    });
});

