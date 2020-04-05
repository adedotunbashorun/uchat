<?php

namespace Modules\Pages\Sidebar;


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
        $menu->group(trans('core::global.menus.content'), function (Group $group)
        {
            $group->weight(50);
            $group->item('Pages',function(Item $item){
                $item->weight(2);
                $item->icon('fa fa-folder');
                $item->route('admin.pages.index');
                $item->badge(function (Badge $badge, PageInterface $page) {
                    $badge->setClass('red');
                    $badge->setValue($page->countAll());
                });
               $item->authorize($this->auth->hasAccess('pages.index'));
            });
        });

        return $menu;
    }
}