<?php namespace Modules\Settings\Providers;

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
    protected $namespace = 'Modules\Settings\Http\Controllers';

    /**
     * Define the routes for the application.
     *
     * @param \Illuminate\Routing\
     *
     * @return void
     */

    public function boot()
    {
        parent::boot();

       Route::model('passenger', 'Modules\Passengers\Entities\Setting');
    }

    public function map()
    {
        Route::group(['namespace' => $this->namespace], function () {

            Route::get('admin/settings', ['as' => 'admin.settings.index', 'uses' => 'SettingsController@index']);
            Route::post('admin/settings', ['as' => 'admin.settings.store', 'uses' => 'SettingsController@store']);

            Route::post('ajax/send-test-mail', ['as' => 'ajax.settings.send_test_mail', 'uses' => 'SettingsAjaxController@sendTestMail']);
            //Route::put('api/settings', 'SettingsController@deleteImage');
        });
    }
}
