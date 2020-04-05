<?php

use Illuminate\Support\Facades\Route;

if ($page = \MyApp::getPageLinkedToModule('interests')) {
    $options = [];
    if ($uri = $page->uri) {
        Route::get($uri, $options + ['as' => 'interests', 'uses' => 'InterestsPublicController@index']);
        Route::get($uri.'/{slug}', $options +  ['as' => 'interests.slug', 'uses' => 'InterestsPublicController@show']);
    }
}

