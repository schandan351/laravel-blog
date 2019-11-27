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


Route::redirect('/','/posts');

Auth::routes();

Route::get('dashboard', 'DashBoardController@index')->name('dashboard');

Route::resource('posts','PostController');

Route::resource('category','CategoriesController');
Route::get('/search','PostController@search');
Route::get('/draft','PostController@draft');
// Route::get('/showcats','CategoriesController@show');

// Route::get('/showcats','CategoriesController@show');



