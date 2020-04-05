<?php namespace Modules\Menus\Providers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;
use Modules\Menus\Entities\Menu;
use Modules\Menus\Entities\MenuLink;
use Modules\Menus\Repositories\EloquentMenu;
use Modules\Menus\Repositories\EloquentMenuLink;

class MenusServiceProvider extends ServiceProvider {

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
			'Menus',
			'Modules\Menus\Facades\Facade'
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
		$app->bind('Modules\Menus\Repositories\MenuInterface', function (Application $app) {
			$repository = new EloquentMenu(new Menu);
			return $repository;
		});
		$app->bind('Modules\Menus\Repositories\MenuLinkInterface', function (Application $app) {
			$repository = new EloquentMenuLink(new MenuLink());
			return $repository;
		});
	}

	/**
	 * Register config.
	 * 
	 * @return void
	 */
	protected function registerConfig()
	{
		$this->publishes([
		    __DIR__.'/../Config/config.php' => config_path('menus.php'),
		]);
		$this->mergeConfigFrom(
		    __DIR__.'/../Config/config.php', 'menus'
		);
	}

	/**
	 * Register views.
	 * 
	 * @return void
	 */
	public function registerViews()
	{
		$viewPath = resource_path('views/modules/menus');

		$sourcePath = __DIR__.'/../Resources/views';

		$this->publishes([
			$sourcePath => $viewPath
		]);

		$this->loadViewsFrom([$viewPath, $sourcePath], 'menus');
	}

	/**
	 * Register translations.
	 * 
	 * @return void
	 */
	public function registerTranslations()
	{
		$langPath = base_path('resources/lang/modules/menus');

		if (is_dir($langPath)) {
			$this->loadTranslationsFrom($langPath, 'menus');
		} else {
			$this->loadTranslationsFrom(__DIR__ .'/../Resources/lang', 'menus');
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
