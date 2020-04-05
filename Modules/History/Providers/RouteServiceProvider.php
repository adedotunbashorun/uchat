<?php namespace Modules\History\Providers;

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
    protected $namespace = 'Modules\History\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //$router->model('history', 'Modules\History\Entities\History');
    }

    /**
     * Define the routes for the application.
     *
     * @param \Illuminate\Routing\
     *
     * @return void
     */
    public function map()
    {
        Route::group(['namespace' => $this->namespace], function () {

            Route::get('admin/history', ['as' => 'admin.history.index', 'uses' => 'HistoryController@index']);
            /*
             * Ajax routes
             */
            Route::get('ajax/history', ['as' => 'ajax.history.index', 'uses' => 'HistoryAjaxController@index']);
            Route::delete('ajax/history/{history}', ['as' => 'ajax.history.destroy', 'uses' => 'HistoryAjaxController@destroy']);

        });
    }
}
