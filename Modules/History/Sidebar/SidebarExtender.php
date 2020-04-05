<?php

namespace Modules\History\Sidebar;


use Maatwebsite\Sidebar\Badge;
use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Maatwebsite\Sidebar\SidebarExtender as PackageSideBarExtender;
use Modules\Core\Sidebar\BaseSidebarExtender;
use Modules\Pages\Repositories\PageInterface;

class SidebarExtender extends BaseSidebarExtender implements PackageSideBarExtender
{
    public function extendWith(Menu $menu)
    {
        $menu->group(trans('core::global.menus.user'), function (Group $group)
        {
            $group->weight(100);
            $group->item('Activities',function(Item $item){
                $item->weight(50);
                $item->icon('fa fa-list');
                $item->route('admin.history.index');
               $item->authorize($this->auth->hasAccess('pages.index'));
            });
        });

        return $menu;
    }
}