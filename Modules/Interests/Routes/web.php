<?php

Route::bind('interest', function ($id) {
    return app(Modules\Interests\Repositories\InterestInterface::class)->byId($id);
});
Route::group(['prefix' => 'admin'], function()
{
    Route::group(['prefix' => 'interests'], function () {
        Route::get('/', [
            'as' => 'admin.interests.index',
            'uses' => 'InterestsController@index'
        ]);
        Route::get('create', [
            'as' => 'admin.interests.create',
            'uses' => 'InterestsController@create'
        ]);
        Route::get('{interest}/edit', [
            'as' => 'admin.interests.edit',
            'uses' => 'InterestsController@edit'
        ]);
        Route::post('/', [
            'as' => 'admin.interests.store',
            'uses' => 'InterestsController@store'
        ]);
        Route::put('{interest}', [
            'as' => 'admin.interests.update',
            'uses' => 'InterestsController@update'
        ]);
        Route::get('data/table', [
            'as' => 'admin.interests.datatable',
            'uses' => 'InterestsController@dataTable'
        ]);
        Route::delete('{interest}', [
            'as' => 'admin.interests.destroy',
            'uses' => 'InterestsController@destroy'
        ]);
    });
});
