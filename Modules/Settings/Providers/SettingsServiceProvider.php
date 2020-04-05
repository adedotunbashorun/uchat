<?php namespace Modules\Settings\Providers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;
use Modules\Core\Observers\FileObserver;
use Modules\Core\Observers\SlugObserver;
use Modules\Core\Providers\MailServiceProvider;
use Modules\Settings\Entities\Setting;
use Modules\Settings\Repositories\EloquentSetting;

class SettingsServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Boot the application events.
	 * 
	 * @return void
	 */
	public function boot()
	{
		$this->registerConfig();
		$this->registerTranslations();
		$this->registerViews();
		/*
         * Get configuration from DB and store it in the container
         */
		$MyAppConfig = $this->app->make('Modules\Settings\Repositories\SettingInterface')
			->allToArray();

		// merge config
		$config = $this->app['config']->get('myapp', []);
		$this->app['config']->set('myapp', array_merge($MyAppConfig, $config));
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{		
		$app = $this->app;
		$app->bind('Modules\Settings\Repositories\SettingInterface', function (Application $app) {
			$repository = new EloquentSetting(new Setting);
			return $repository;
		});

		$app->register('Modules\Settings\Providers\RouteServiceProvider');
	}

	/**
	 * Register config.
	 * 
	 * @return void
	 */
	protected function registerConfig()
	{
		$this->publishes([
		    __DIR__.'/../Config/config.php' => config_path('settings.php'),
		],'config');
		$this->mergeConfigFrom(
		    __DIR__.'/../Config/config.php', 'settings'
		);
	}

	/**
	 * Register views.
	 * 
	 * @return void
	 */
	public function registerViews()
	{
		$viewPath = base_path('views/modules/settings');

		$sourcePath = __DIR__.'/../Resources/views';

		$this->publishes([
			$sourcePath => $viewPath
		],'views');

		$this->loadViewsFrom([$viewPath, $sourcePath], 'settings');
	}

	/**
	 * Register translations.
	 * 
	 * @return void
	 */
	public function registerTranslations()
	{
		$langPath = base_path('resources/lang/modules/settings');

		if (is_dir($langPath)) {
			$this->loadTranslationsFrom($langPath, 'settings');
		} else {
			$this->loadTranslationsFrom(__DIR__ .'/../Resources/lang', 'settings');
		}
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}
