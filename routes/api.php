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

