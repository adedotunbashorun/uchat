<?php

use Illuminate\Support\Facades\Route;

if ($page = \MyApp::getPageLinkedToModule('blocks')) {
    $options = [];
    if ($uri = $page->uri) {
        Route::get($uri, $options + ['as' => 'blocks', 'uses' => 'BlocksPublicController@index']);
        Route::get($uri.'/{slug}', $options +  ['as' => 'blocks.slug', 'uses' => 'BlocksPublicController@show']);
    }
}

/*Route::group(['prefix' => 'blocks'], function()
{
    Route::get('/', 'BlocksPublicController@index');
});*/
