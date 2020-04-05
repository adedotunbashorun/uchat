<?php

namespace Modules\Core\Sidebar\Presentation\Illuminate;

use Illuminate\Contracts\View\Factory;
use Modules\Core\Sidebar\Presentation\SidebarRenderer;
use Maatwebsite\Sidebar\Sidebar;
use Maatwebsite\Sidebar\Presentation\Illuminate\IlluminateSidebarRenderer as PackageSidebarRenderer;

class IlluminateSidebarRenderer extends PackageSidebarRenderer implements SidebarRenderer
{
    /**
     * @var Factory
     */
    protected $factory;

    /**
     * @var string
     */
    protected $view = 'core::sidebar.menu';

    /**
     * @param Sidebar $sidebar
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function render(Sidebar $sidebar)
    {
        $menu = $sidebar->getMenu();

        if ($menu->isAuthorized()) {
            $groups = [];
            foreach ($menu->getGroups() as $group) {
                $groups[] = (new IlluminateGroupRenderer($this->factory))->render($group);
            }

            return $this->factory->make($this->view, [
                'groups' => $groups
            ]);
        }
    }
}
