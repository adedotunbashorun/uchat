<?php

namespace Modules\Interests\Sidebar;


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
            $group->item(trans('interests::global.name'),function(Item $item){
                $item->weight(config('interests.sidebar.weight'));
                $item->icon(config('interests.sidebar.icon'));
                $item->route('admin.interests.index');
                $item->authorize($this->auth->hasAccess('interests.index'));
            });
        });

        return $menu;
    }
}