<?php

namespace Modules\Banners\Sidebar;


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
            $group->item('Banners',function(Item $item){
                $item->weight(config('banners.sidebar.weight'));
                $item->icon(config('banners.sidebar.icon'));
                $item->route('admin.banners.index');
                $item->authorize($this->auth->hasAccess('banners.index'));
            });
        });

        return $menu;
    }
}