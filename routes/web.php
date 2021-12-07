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

//Route::get('/', function () {
//    return view('welcome');
//});
//------------------login--------------
Route::get('/admin', 'AdminController@loginAdmin');
Route::post('/admin', 'AdminController@postLoginAdmin');
//----------------end Login -------------

Route::get('/home', function () {
    return view('home');
});

Route::prefix('admin')->group(function () {
// laravel 5 prefixes
    Route::prefix('categories')->group(function () {
        // goi đến index
        Route::get('/', [
            //mãng confit
            'as' => 'categories.index',
            'uses' => 'CategoryController@index'
            // phân quyền
            // midderque
            // trước khi link tạo CategoryController
        ]);
        Route::get('/create', [
            //mãng confit
            'as' => 'categories.create',
            'uses' => 'CategoryController@create'
            // phân quyền
            // midderque
            // trước khi link tạo CategoryController
        ]);

        //route submit form
        Route::post('/store', [
            //mãng confit
            'as' => 'categories.store',
            'uses' => 'CategoryController@store']);
        //edit
        Route::get('/edit/{id}', [
            //mãng confit
            'as' => 'categories.edit',
            'uses' => 'CategoryController@edit'
        ]);
        //update
        //edit
        Route::post('/update/{id}', [
            //mãng confit
            'as' => 'categories.update',
            'uses' => 'CategoryController@update'
        ]);
        //delete
        Route::get('/delete/{id}', [
            //mãng confit
            'as' => 'categories.delete',
            'uses' => 'CategoryController@delete'
        ]);

    });
//////////menu
    Route::prefix('menus')->group(function () {
        // goi đến index menu
        Route::get('/', [
            //mãng confit
            'as' => 'menus.index',
            'uses' => 'MenuController@index'

        ]);
        Route::get('/create', [
            //mãng confit
            'as' => 'menus.create',
            'uses' => 'MenuController@create'
        ]);

        //route submit form
        Route::post('/store', [
            //mãng confit
            'as' => 'menus.store',
            'uses' => 'MenuController@store']);
        //edit
        Route::get('/edit/{id}', [
            //mãng confit
            'as' => 'menus.edit',
            'uses' => 'MenuController@edit'
        ]);
        //update
        Route::post('/update/{id}', [
            //mãng confit
            'as' => 'menus.update',
            'uses' => 'MenuController@update'
        ]);
        //delete
        Route::get('/delete/{id}', [
            //mãng confit
            'as' => 'menus.delete',
            'uses' => 'MenuController@delete'
        ]);

    });

    //product
    Route::prefix('product')->group(function () {
        // goi đến index menu
        Route::get('/', [
            //mãng confit
            'as' => 'product.index',
            'uses' => 'AdminProductController@index'

        ]);
        Route::get('/create', [
            //mãng confit
            'as' => 'product.create',
            'uses' => 'AdminProductController@create'

        ]);

    });
});


