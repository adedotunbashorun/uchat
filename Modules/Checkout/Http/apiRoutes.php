<?php
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'checkout'], function()
{
    Route::get('/', 'CheckoutApiController@index');
});
