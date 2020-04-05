<?php

namespace Modules\Blocks\Sidebar;


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
            $group->item('Blocks',function(Item $item){
                $item->weight(config('blocks.sidebar.weight'));
                $item->icon(config('blocks.sidebar.icon'));
                $item->route('admin.blocks.index');
                $item->authorize($this->auth->hasAccess('blocks.index'));
            });
        });

        return $menu;
    }
}