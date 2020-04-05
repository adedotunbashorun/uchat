<?php

namespace Modules\Settings\Sidebar;


use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Maatwebsite\Sidebar\SidebarExtender as PackageSideBarExtender;
use Modules\Core\Sidebar\BaseSidebarExtender;

class SidebarExtender extends BaseSidebarExtender implements PackageSideBarExtender
{
    public function extendWith(Menu $menu)
    {
        $menu->group(trans('core::global.menus.config'), function (Group $group)
        {
            //$group->hideHeading();
            $group->weight(100);
            $group->item('Settings',function(Item $item){
                $item->weight(100);
                $item->icon('fa fa-cog');
                $item->route('admin.settings.index');
               $item->authorize($this->auth->hasAccess('settings.index'));
            });
        });

        return $menu;
    }
}