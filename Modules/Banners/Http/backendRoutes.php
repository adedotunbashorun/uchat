<?php

use Illuminate\Support\Facades\Route;

Route::bind('banner', function ($id) {
    return app(Modules\Banners\Repositories\BannerInterface::class)->byId($id);
});

Route::group(['prefix' => 'banners'], function () {
    Route::get('/', [
        'as' => 'admin.banners.index',
        'uses' => 'BannersController@index'
    ]);
    Route::get('create', [
        'as' => 'admin.banners.create',
        'uses' => 'BannersController@create'
    ]);
    Route::get('{banner}/edit', [
        'as' => 'admin.banners.edit',
        'uses' => 'BannersController@edit'
    ]);
    Route::post('/', [
        'as' => 'admin.banners.store',
        'uses' => 'BannersController@store'
    ]);
    Route::put('{banner}', [
        'as' => 'admin.banners.update',
        'uses' => 'BannersController@update'
    ]);
    Route::get('datatable', [
        'as' => 'admin.banners.datatable',
        'uses' => 'BannersController@dataTable'
    ]);
    Route::delete('{banner}', [
        'as' => 'admin.banners.destroy',
        'uses' => 'BannersController@destroy'
    ]);
});
