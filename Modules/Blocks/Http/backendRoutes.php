<?php

use Illuminate\Support\Facades\Route;

Route::bind('block', function ($id) {
    return app(Modules\Blocks\Repositories\BlockInterface::class)->byId($id);
});

Route::group(['prefix' => 'blocks'], function () {
    Route::get('/', [
        'as' => 'admin.blocks.index',
        'uses' => 'BlocksController@index'
    ]);
    Route::get('create', [
        'as' => 'admin.blocks.create',
        'uses' => 'BlocksController@create'
    ]);
    Route::get('{block}/edit', [
        'as' => 'admin.blocks.edit',
        'uses' => 'BlocksController@edit'
    ]);
    Route::post('/', [
        'as' => 'admin.blocks.store',
        'uses' => 'BlocksController@store'
    ]);
    Route::put('{block}', [
        'as' => 'admin.blocks.update',
        'uses' => 'BlocksController@update'
    ]);
    Route::get('datatable', [
        'as' => 'admin.blocks.datatable',
        'uses' => 'BlocksController@dataTable'
    ]);
    Route::delete('{block}', [
        'as' => 'admin.blocks.destroy',
        'uses' => 'BlocksController@destroy'
    ]);
});
