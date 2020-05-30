<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::apiResource('clients', 'ClientController');

Route::get('/clients', 'ClientController@index');
Route::get('/clients/{id}', 'ClientController@show');
Route::post('/clients', 'ClientController@store');
Route::delete('/clients/{id}', 'ClientController@delete');
Route::put('/clients/{id}', 'ClientController@update');


Route::apiResource('jobbers', 'JobberController');

Route::get('/jobbers', 'JobberController@index');
Route::get('/jobbers/{id}', 'JobberController@show');
Route::post('/jobbers', 'JobberController@store');
Route::delete('/jobbers/{id}', 'JobberController@delete');
Route::put('/jobbers/{id}', 'JobberController@update');

Route::get('/ads', 'AdController@index');
Route::get('/ads/{id}', 'AdController@show');
Route::post('/ads', 'AdController@store');
Route::delete('/ads/{id}', 'AdController@delete');
Route::put('/ads/{id}', 'AdController@update');

Route::apiResource('offers', 'OfferController');

Route::get('/offers', 'OfferController@index');
Route::get('/offers/{id}', 'OfferController@show');
Route::post('/offers', 'OfferController@store');
Route::delete('/offers/{id}', 'OfferController@delete');
Route::put('/offers/{id}', 'OfferController@update');

Route::apiResource('admins', 'AdminController');

Route::get('/admins', 'AdminController@index');
Route::get('/admins/{id}', 'AdminController@show');
Route::post('/admins', 'AdminController@store');
Route::delete('/admins/{id}', 'AdminController@delete');
Route::put('/admins/{id}', 'AdminController@update');

Route::apiResource('categoris', 'CategoryController');

Route::get('/categories', 'CategoryController@index');
Route::get('/categories/{id}', 'CategoryController@show');
Route::post('/categories', 'CategoryController@store');
Route::delete('/categories/{id}', 'CategoryController@delete');
Route::put('/categories/{id}', 'CategoryController@update');

Route::apiResource('subcategoris', 'SubcategoryController');

Route::get('/subcategories', 'SubcategoryController@index');
Route::get('/subcategories/{id}', 'SubcategoryController@show');
Route::post('/subcategories', 'SubcategoryController@store');
Route::delete('/subcategories/{id}', 'SubcategoryController@delete');
Route::put('/subcategories/{id}', 'SubcategoryController@update');


Route::apiResource('subscriptions', 'SubscriptionController');

Route::get('/subscriptions', 'SubscriptionController@index');
Route::get('/subscriptions/{id}', 'SubscriptionController@show');
Route::post('/subscriptions', 'SubscriptionController@store');
Route::delete('/subscriptions/{id}', 'SubscriptionController@destroy');
Route::put('/subscriptions/{id}', 'SubscriptionController@update');
