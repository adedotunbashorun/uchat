<?php
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'banners'], function()
{
    Route::get('/', 'BannersApiController@index');
});
