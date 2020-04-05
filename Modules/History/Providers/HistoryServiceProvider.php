<?php namespace Modules\History\Providers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;
use Modules\Core\Observers\FileObserver;
use Modules\Core\Observers\SlugObserver;
use Modules\History\Entities\History;
use Modules\History\Repositories\EloquentHistory;

class HistoryServiceProvider extends ServiceProvider {

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

		AliasLoader::getInstance()->alias(
			'History',
			'Modules\History\Facades\Facade'
		);
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{		
		$app = $this->app;
		$app->bind('Modules\History\Repositories\HistoryInterface', function (Application $app) {
			$repository = new EloquentHistory(new History);
			return $repository;
		});

		$app->register('Modules\History\Providers\RouteServiceProvider');
	}

	/**
	 * Register config.
	 * 
	 * @return void
	 */
	protected function registerConfig()
	{
		$this->publishes([
		    __DIR__.'/../Config/config.php' => config_path('history.php'),
		],'config');
		$this->mergeConfigFrom(
		    __DIR__.'/../Config/config.php', 'history'
		);
	}

	/**
	 * Register views.
	 * 
	 * @return void
	 */
	public function registerViews()
	{
		$viewPath = base_path('views/modules/history');

		$sourcePath = __DIR__.'/../Resources/views';

		$this->publishes([
			$sourcePath => $viewPath
		],'views');

		$this->loadViewsFrom([$viewPath, $sourcePath], 'history');
	}

	/**
	 * Register translations.
	 * 
	 * @return void
	 */
	public function registerTranslations()
	{
		$langPath = base_path('resources/lang/modules/history');

		if (is_dir($langPath)) {
			$this->loadTranslationsFrom($langPath, 'history');
		} else {
			$this->loadTranslationsFrom(__DIR__ .'/../Resources/lang', 'history');
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
