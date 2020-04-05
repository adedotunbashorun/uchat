<?php

use Illuminate\Support\Facades\Route;

Route::bind('photo', function ($id) {
    return app(Modules\Photos\Repositories\PhotoInterface::class)->byId($id);
});

Route::group(['prefix' => 'photos'], function () {
    Route::get('/', [
        'as' => 'admin.photos.index',
        'uses' => 'PhotosController@index'
    ]);
    Route::get('create', [
        'as' => 'admin.photos.create',
        'uses' => 'PhotosController@create'
    ]);
    Route::get('{photo}/edit', [
        'as' => 'admin.photos.edit',
        'uses' => 'PhotosController@edit'
    ]);
    Route::post('/', [
        'as' => 'admin.photos.store',
        'uses' => 'PhotosController@store'
    ]);
    Route::put('{photo}', [
        'as' => 'admin.photos.update',
        'uses' => 'PhotosController@update'
    ]);
    Route::get('datatable', [
        'as' => 'admin.photos.datatable',
        'uses' => 'PhotosController@dataTable'
    ]);
    Route::delete('{photo}', [
        'as' => 'admin.photos.destroy',
        'uses' => 'PhotosController@destroy'
    ]);
});
