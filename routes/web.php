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
Route::get('/home', function () {
    return view('home');
});

// laravel 5 prefixes
Route::prefix('categories')->group(function () {
    Route::get('/create', [
        //mãng confit
        'as'=> 'categories.create',
        'uses'=> 'CategoryController@create'
        // phân quyền 
        // midderque
        // trước khi link tạo CategoryController 
    ]);
});
