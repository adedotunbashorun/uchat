<?php

namespace Modules\Users\Sidebar;


use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Maatwebsite\Sidebar\SidebarExtender as PackageSideBarExtender;
use Modules\Core\Sidebar\BaseSidebarExtender;

class SidebarPublicExtender extends BaseSidebarExtender implements PackageSideBarExtender
{
    public function extendWith(Menu $menu)
    {
        $menu->group('Account', function (Group $group)
        {
            $group->weight(0);
            $group->hideHeading();
            $group->item('My Profile',function(Item $item){
                $item->weight(25);
                $item->icon('fa fa-edit');
                $item->route('profile.index');
            });

            $group->item('Change Password',function(Item $item){
                $item->weight(28);
                $item->icon('fa fa-lock');
                $item->route('profile.change-password');
            });


        });

        return $menu;
    }
}