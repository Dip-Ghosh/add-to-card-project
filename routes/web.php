<?php


use Illuminate\Support\Facades\Route;
$namespace ='App\Http\Controllers';
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
Route::get('login',$namespace.'\HomeController@register')->name('login');
Route::get('/',$namespace.'\HomeController@index')->name('home');


Route::group(['prefix'=>'products','as'=>'products.'], function() use ($namespace) {

    Route::get('/{id}',$namespace.'\HomeController@getProduct')->name('details');

    Route::group(['prefix'=>'carts','as'=>'carts.'], function() use ($namespace) {

        Route::get('/show',$namespace.'\HomeController@getCart')->name('show');
        Route::get('/{id}', $namespace.'\HomeController@add')->name('add');
        Route::patch('/{id}', $namespace.'\HomeController@update')->name('update');
        Route::delete('/{id}', $namespace.'\HomeController@remove')->name('destroy');

    });

});


Route::resource('category',$namespace.'\CategoryController');
Route::resource('products',$namespace.'\ProductController');

