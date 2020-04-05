<?php namespace Modules\Core\Providers;

use Modules\Core\Sidebar\Presentation\Illuminate\IlluminateSidebarRenderer;
use Modules\Core\Sidebar\Presentation\SidebarRenderer;
use Illuminate\Support\ServiceProvider;
use Maatwebsite\Sidebar\SidebarManager;
use Modules\Core\Sidebar\AdminSidebar;
use Illuminate\Http\Request;
use Modules\Core\Sidebar\PublicSidebar;

class SidebarServiceProvider extends ServiceProvider
{
    protected $defer = true;
    private $request;

    public function boot(SidebarManager $manager, Request $request)
    {
        $this->request = $request;
        if ($this->onBackend() === true ) {
            $manager->register(AdminSidebar::class);
        }
        if ($this->onFrontend() === true ) {
            $manager->register(PublicSidebar::class);
        }
    }

    /**
     * Register the service provider.
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            SidebarRenderer::class,
            IlluminateSidebarRenderer::class
        );
    }


    private function onBackend()
    {
        $url = $this->request->url();
        if (str_contains($url, config('myapp.admin_prefix'))) {
            return true;
        }

        return false;
    }

    private function onFrontend()
    {
        $url = $this->request->url();
        if (str_contains($url, config('myapp.public_prefix'))) {
            return true;
        }
        return false;
    }
}
