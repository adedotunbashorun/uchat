<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'photos'], function()
{
    Route::get('/', 'PhotosPublicController@index');
});
