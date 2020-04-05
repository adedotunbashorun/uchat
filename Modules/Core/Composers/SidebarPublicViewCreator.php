<?php namespace Modules\Core\Composers;

use Modules\Core\Sidebar\Presentation\SidebarRenderer;
use Modules\Core\Sidebar\AdminSidebar;
use Modules\Core\Sidebar\PublicSidebar;

class SidebarPublicViewCreator
{
    /**
     * @var AdminSidebar
     */
    protected $sidebar;

    /**
     * @var SidebarRenderer
     */
    protected $renderer;

    /**
     * @param PublicSidebar    $sidebar
     * @param SidebarRenderer $renderer
     */
    public function __construct(PublicSidebar $sidebar, SidebarRenderer $renderer)
    {
        $this->sidebar = $sidebar;
        $this->renderer = $renderer;
    }

    public function create($view)
    {
        //$view->prefix = config('core.admin_prefix');
        $view->sidebar = $this->renderer->render($this->sidebar);
    }
}
