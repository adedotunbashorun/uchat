<?php

namespace Modules\Dashboard\Sidebar;


use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Maatwebsite\Sidebar\SidebarExtender as PackageSideBarExtender;
use Modules\Core\Sidebar\BaseSidebarExtender;

class SidebarExtender extends BaseSidebarExtender implements PackageSideBarExtender
{
    public function extendWith(Menu $menu)
    {
        $menu->group('Dashboard', function (Group $group)
        {
            $group->weight(0);
            $group->hideHeading();
            $group->item('Dashboard',function(Item $item){
                $item->icon('flaticon2-shelter');
                $item->route('admin.dashboard');
               $item->authorize($this->auth->hasAccess('dashboard.index'));
            });
        });

        return $menu;
    }
}