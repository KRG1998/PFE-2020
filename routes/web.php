<?php

Auth::routes();

Route::get('/logout-manual', function () {
    request()->session()->invalidate();
});


Route::get('facebook/redirect', 'SocialAuthController@redirectf');
Route::get('facebook/callback','SocialAuthController@callbackf');
Route::get('google/redirect','SocialAuthController@redirectg');
Route::get('google/callback','SocialAuthController@callbackg');
Route::get('linkedin/redirect','SocialAuthController@redirectl');
Route::get('linkedin/callback','SocialAuthController@callbackl');
Route::get('/','AppController@index');
Route::get('/{any}', 'AppController@index')->where('any', '.*');

