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


            Route::prefix('teacher')->group(function() {
                Route::get('/', 'TeacherController@index')->name('teacher.index');
                Route::get('create', 'TeacherController@createPage')->name('teacher.createpage');
                Route::post('create', 'TeacherController@create')->name('teacher.create');
                Route::get('edit/{id}', 'TeacherController@editPage')->name('teacher.edit');
                Route::post('edit/{id}', 'TeacherController@edit')->name('teacher.edit.post');
                Route::get('delete/{id}', 'TeacherController@delete')->name('teacher.delete');
            });
    });


});



Route::middleware(['checkdeadline'])->group(function () {
    Route::prefix('deadline')->group(function () {
        Route::get('/', 'DeadlineController@index')->name("deadline.index");
        Route::get('/index', 'DeadlineController@index');
        Route::post('/index', 'DeadlineController@sort')->name("deadline.sort");
        Route::get('edit/{id}', 'DeadlineController@editPage')->name("deadline.editPage");
        Route::post('edit/{id}', 'DeadlineController@edit')->name("deadline.edit");
        Route::get('details/{id}', 'DeadlineController@details')->name("deadline.details");
    });
});


