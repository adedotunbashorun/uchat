<?php
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'cart'], function()
{
    Route::get('/', 'CartApiController@index');
});
