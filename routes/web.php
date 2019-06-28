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

//Route::get('/', function () {
////    return view('welcome');
//    return view('store.view');
//});

Route::group(['middleware' => ['web']], function () {
    Route::get('/','StoreController@index');
    Route::get('/store/view/{id}','StoreController@getView'); 
    Route::get('/store/category/{id}','StoreController@getCategory');
    Route::get('/store/search/','StoreController@getSearch');
    Route::resource('category', 'CategoryController');
    Route::resource('post', 'PostController');
    
    Route::resource('user', 'UserController');//->name('user');
    Route::get('/home', 'HomeController@index')->name('home');
    Auth::routes();
});

//Route::get('/home', 'HomeController@index')->name('home');
