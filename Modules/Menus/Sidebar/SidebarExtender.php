<?php

namespace Modules\Menus\Sidebar;


use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Maatwebsite\Sidebar\SidebarExtender as PackageSideBarExtender;
use Modules\Core\Sidebar\BaseSidebarExtender;

class SidebarExtender extends BaseSidebarExtender implements PackageSideBarExtender
{
    public function extendWith(Menu $menu)
    {
        $menu->group(trans('core::global.menus.content'), function (Group $group)
        {
            //$group->hideHeading();
            $group->weight(50);
            $group->item('Menus',function(Item $item){
                $item->weight(50);
                $item->icon('fa fa-edit');
                $item->route('admin.menus.index');
               $item->authorize($this->auth->hasAccess('menus.index'));
            });
        });

        return $menu;
    }
}