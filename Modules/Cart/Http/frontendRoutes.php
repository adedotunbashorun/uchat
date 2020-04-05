<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'cart'], function () {
    Route::post('add', array('as' => 'cart.add', 'uses' => 'CartController@add'));
    /*Route::get('/', array('as' => 'cart', 'uses' => 'CartController@index'));
    Route::get('empty', array('as' => 'cart.empty', 'uses' => 'CartController@emptyCart'));
    Route::get('remove/{item_id}', array('as' => 'cart.remove', 'uses' => 'CartController@remove'));
    Route::post('update', array('as' => 'cart.update', 'uses' => 'CartController@update'));
    Route::get('checkout', array('as' => 'cart.checkout', 'uses' => 'CartController@checkOut'));*/
});
