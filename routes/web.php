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
Route::get('/search', 'SearchController@index');
Route::get('/search/action', 'SearchController@action')->name('search.action');

Route::resources([
	'admin/products'=>'ProductController',
	'admin/categories'=>'CategoriesController',
	'admin/shops'=>'ShopsController',
	//'shops'=>'ShopsController',
	//'categories'=>'CategoriesController',
	//'products'=>'ProductController'
]);
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
