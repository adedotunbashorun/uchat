<?php
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'blocks'], function()
{
    Route::get('/', 'BlocksApiController@index');
});
