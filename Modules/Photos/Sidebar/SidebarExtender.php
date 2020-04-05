<?php

namespace Modules\Photos\Sidebar;


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
            $group->item('Photos',function(Item $item){
                $item->weight(config('photos.sidebar.weight'));
                $item->icon(config('photos.sidebar.icon'));
                $item->route('admin.photos.index');
                $item->authorize($this->auth->hasAccess('photos.index'));
            });
        });

        return $menu;
    }
}