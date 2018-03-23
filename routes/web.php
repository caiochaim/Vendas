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

Route::get('/', function(){ return view('welcome'); });

/********************** SERVICE ROUTES ******************************/

Route::get('/products', 'ProductController@getProducts');
Route::get('/products/{id}', 'ProductController@getProduct');
Route::post('/products', 'ProductController@createProduct');
Route::put('/products/{id}', 'ProductController@updateProduct');
Route::delete('/products/{id}', 'ProductController@destroyProduct');


Route::get('/people', 'PersonController@getPeople');
Route::get('/people/{id}', 'PersonController@getPerson');
Route::post('/people', 'PersonController@createPerson');
Route::put('/people/{id}', 'PersonController@updatePerson');
Route::delete('/people/{id}', 'PersonController@destroyPerson');


Route::get('/orders', 'OrderController@getOrders');
Route::get('/orders/{id}', 'OrderController@getOrder');
Route::post('/orders', 'OrderController@createOrder');
Route::put('/orders/{id}', 'OrderController@updateOrder');
Route::delete('/orders/{id}', 'OrderController@destroyOrder');
