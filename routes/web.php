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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'PostController@index');

// Route::get('/', function() {
//     return view('home/index');
// });

// 「/posts/create」にGETメソッドが来たらControllerのcreateメソッドを実行
Route::get('/posts/create', 'PostController@create');

// 「/posts」にPOSTメソッドが来たらContorollerのstoreメソッドを実行
Route::post('/posts', 'PostController@store');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
