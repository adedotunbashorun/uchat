<?php namespace Modules\Pages\Providers;

use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;
use Modules\Core\Observers\FileObserver;
use Modules\Core\Observers\SlugObserver;
use Modules\Pages\Entities\Page;
use Modules\Pages\Observers\AddToMenuObserver;
use Modules\Pages\Observers\HomePageObserver;
use Modules\Pages\Observers\SortObserver;
use Modules\Pages\Observers\UriObserver;
use Modules\Pages\Repositories\EloquentPage;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Database\Eloquent\Factory;

class PagesServiceProvider extends ServiceProvider {

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
			'Pages',
			'Modules\Pages\Facades\Facade'
		);

		//Page::observe(new FileObserver());
		Page::observe(new HomePageObserver());
		//Page::observe(new SortObserver());
		Page::observe(new AddToMenuObserver());
		Page::observe(new UriObserver());
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$app = $this->app;
		$app->bind('Modules\Pages\Repositories\PageInterface', function (Application $app) {
			$repository = new EloquentPage(new Page);
			if (! config('myapp.cache')) {
				return $repository;
			}
			//$laravelCache = new LaravelCache($app['cache'], ['pages', 'galleries'], 10);

			//return new CacheDecorator($repository, $laravelCache);
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
            __DIR__.'/../Config/config.php' => config_path('pages.php'),
        ], 'config');
        $this->mergeConfigFrom(
            __DIR__.'/../Config/config.php', 'pages'
        );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = resource_path('views/modules/pages');

        $sourcePath = __DIR__.'/../Resources/views';

        $this->publishes([
            $sourcePath => $viewPath
        ],'views');

        $this->loadViewsFrom(array_merge(array_map(function ($path) {
            return $path . '/modules/pages';
        }, \Config::get('view.paths')), [$sourcePath]), 'pages');
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = resource_path('lang/modules/pages');

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, 'pages');
        } else {
            $this->loadTranslationsFrom(__DIR__ .'/../Resources/lang', 'pages');
        }
    }

    /**
     * Register an additional directory of factories.
     *
     * @return void
     */
    public function registerFactories()
    {
        if (! app()->environment('production')) {
            app(Factory::class)->load(__DIR__ . '/../Database/factories');
        }
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }

}
