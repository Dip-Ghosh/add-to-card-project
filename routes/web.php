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
Route::get('/login',$namespace.'\HomeController@register')->name('login');
Route::get('/',$namespace.'\HomeController@index')->name('home');
Route::get('/details/{id}',$namespace.'\HomeController@getProdcutDetails')->name('products.details');
Route::get('/cart',$namespace.'\HomeController@getCart')->name('products.cart');
Route::get('add-to-cart/{id}', $namespace.'\HomeController@addToCart')->name('add.to.cart');
Route::patch('update-cart', $namespace.'\HomeController@update')->name('update.cart');

Route::delete('remove-from-cart', $namespace.'\HomeController@removeFromCart')->name('remove.from.cart');

Route::resource('category',$namespace.'\CategoryController');
Route::resource('products',$namespace.'\ProductController');

