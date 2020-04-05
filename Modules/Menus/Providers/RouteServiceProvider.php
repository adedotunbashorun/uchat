<?php

namespace Modules\Menus\Providers;

use Config;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to the controller routes in your routes file.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'Modules\Menus\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        Route::group(['namespace' => $this->namespace], function () {

            Route::get('admin/menus', ['as' => 'admin.menus.index', 'uses' => 'MenusController@index']);
            Route::get('admin/menus/create', ['as' => 'admin.menus.create', 'uses' => 'MenusController@create']);
            Route::get('admin/menus/{page}/edit', ['as' => 'admin.menus.edit', 'uses' => 'MenusController@edit']);
            Route::post('admin/menus', ['as' => 'admin.menus.store', 'uses' => 'MenusController@store']);
            Route::put('admin/menus/{page}', ['as' => 'admin.menus.update', 'uses' => 'MenusController@update']);
            Route::get('admin/menus/datatable', ['as' => 'admin.menus.datatable', 'uses' => 'MenusController@dataTable']);
            Route::delete('admin/menus/{menu}', ['as' => 'admin.menus.destroy', 'uses' => 'MenusController@destroy']);

            Route::get('admin/menus/{menu}/menu-links', ['as' => 'admin.menus.menu_links.index', 'uses' => 'MenuLinksController@index']);
            Route::get('admin/menus/{menu}/menu-links/create', ['as' => 'admin.menus.menu_links.create', 'uses' => 'MenuLinksController@create']);
            Route::get('admin/menus/{menu}/menu-links/{menu_link}/edit', ['as' => 'admin.menus.menu_links.edit', 'uses' => 'MenuLinksController@edit']);
            Route::post('admin/menus/{menu}/menu-links', ['as' => 'admin.menus.menu_links.store', 'uses' => 'MenuLinksController@store']);
            Route::put('admin/menus/{menu}/menu-links/{menu_link}', ['as' => 'admin.menus.menu_links.update', 'uses' => 'MenuLinksController@update']);

            Route::get('ajax/menus/{menu}/menu-links', ['as' => 'ajax.menus.menu_links.index', 'uses' => 'MenuLinksAjaxController@index']);
            Route::post('ajax/menus/{menu}/menu-links', ['as' => 'ajax.menus.menu_links.sort', 'uses' => 'MenuLinksAjaxController@sort']);
            Route::delete('ajax/menu-links/{menu_link}', ['as' => 'ajax.menu_links.destroy', 'uses' => 'MenuLinksAjaxController@destroy']);
        });
    }
}
