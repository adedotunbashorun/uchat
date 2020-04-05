<?php

namespace Modules\Pages\Providers;

use Config;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use Pages;

class RouteServiceProvider extends ServiceProvider {

    /**
     * This namespace is applied to the controller routes in your routes file.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'Modules\Pages\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        Route::bind('uri', function ($uri)
        {
            return Pages::getFirstByUri($uri);
        });
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        Route::group(['namespace' => $this->namespace], function ()
        {

            Route::get('admin/pages', ['as' => 'admin.pages.index', 'uses' => 'PagesController@index']);
            Route::get('admin/pages/data/table', ['as' => 'admin.pages.datatable', 'uses' => 'PagesController@dataTable']);
            Route::get('admin/pages/create', ['as' => 'admin.pages.create', 'uses' => 'PagesController@create']);
            Route::get('admin/pages/{page}/edit', ['as' => 'admin.pages.edit', 'uses' => 'PagesController@edit']);
            Route::post('admin/pages', ['as' => 'admin.pages.store', 'uses' => 'PagesController@store']);
            Route::put('admin/pages/{page}', ['as' => 'admin.pages.update', 'uses' => 'PagesController@update']);
            Route::post('admin/pages/sort', ['as' => 'admin.pages.sort', 'uses' => 'PagesController@sort']);
            Route::post('contact-us', ['as' => 'contact.post', 'uses' => 'PagesPublicController@contactForm']);
            Route::post('contact-us/appointment-form', ['as' => 'appointment.post', 'uses' => 'PagesPublicController@appointmentForm']);


            /*
             * Ajax routes
             */
            Route::get('ajax/pages', ['as' => 'ajax.pages.index', 'uses' => 'PagesAjaxController@index']);
            Route::put('ajax/pages/{page}', ['as' => 'ajax.pages.update', 'uses' => 'PagesAjaxController@update']);
            Route::delete('ajax/pages/{page}', ['as' => 'ajax.pages.destroy', 'uses' => 'PagesAjaxController@destroy']);

            /*
             * Public routes
             */

            Route::get('/','PagesPublicController@homepage');
            Route::get('{uri}', 'PagesPublicController@uri')->where('uri', '(.*)')->middleware('bindings');
        });
    }
}