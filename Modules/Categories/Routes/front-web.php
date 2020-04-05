<?php

use Illuminate\Support\Facades\Route;

if ($page = \MyApp::getPageLinkedToModule('categories')) {
    $options = [];
    if ($uri = $page->uri) {
        Route::get($uri, $options + ['as' => 'categories', 'uses' => 'CategoriesPublicController@index']);
        Route::get($uri.'/{slug}', $options +  ['as' => 'categories.slug', 'uses' => 'CategoriesPublicController@show']);
    }
}

/*Route::group(['prefix' => 'categories'], function()
{
    Route::get('/', 'CategoriesPublicController@index');
});*/
