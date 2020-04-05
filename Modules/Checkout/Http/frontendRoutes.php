<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'checkout'], function()
{
    Route::get('/', 'CheckoutController@index')->name('checkout');
    Route::post('/process', 'CheckoutController@process')->name('checkout.post');
});
