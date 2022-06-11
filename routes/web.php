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

Route::get('/',$namespace.'\HomeController@index');


Route::get('/products/details',function () {
    return view('products.product-details');
});

Route::resource('category',$namespace.'\CategoryController');
Route::resource('products',$namespace.'\ProductController');

