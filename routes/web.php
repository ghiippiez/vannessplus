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

Route::get('upload', 'UploadController@showUploadFile');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//added 5-7-2018 for calendar
Route::get('/calendar', 'HomeController@calendar')->name('calendar');
//added 6-7-2018 for upload
Route::get('/upload' , 'HomeController@upload')->name('upload');
//added 6-7-2018 for create
Route::get('/create' , 'HomeController@create')->name('create');

Route::get('/folder' , 'HomeController@folder')->name('folder');

Route::get('/add', 'UploadController@showUploadFile');

Route::resource('vanness/form','FormController');

Route::resource('/cars', 'CarsController');

Route::get('admin', function () {
    return view('master');

});
Route::post('create_candidate' , 'FormController@create_candidate')->name('create.candidate');



