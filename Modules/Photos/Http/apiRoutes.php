<?php
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'photos'], function()
{
    Route::get('/', 'PhotosApiController@index');
    Route::post('upload', 'PhotosApiController@upload')->name('api.photos.upload');
});
