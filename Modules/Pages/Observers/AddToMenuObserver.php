<?php

namespace Modules\Pages\Observers;

use Illuminate\Support\Facades\Request;
use Modules\Menus\Entities\MenuLink;
use Modules\Pages\Entities\Page;

class AddToMenuObserver {

    /**
     * If a new homepage is defined, cancel previous homepage.
     *
     * @param Model $model eloquent
     *
     * @return void
     */
    public function created(Page $model)
    {
        $menus = Request::input('menus');
        if (is_array($menus) && count($menus))
        {
            foreach ($menus as $menu_id)
            {
                $position = $this->getPositionFormMenu($menu_id);
                $data = [
                    'menu_id'  => $menu_id,
                    'page_id'  => $model->id,
                    'position' => $position,
                ];
                $data['title'] = $model->title;
                app('Modules\Menus\Repositories\MenuLinkInterface')->create($data);
            }
        }
    }

    private function getPositionFormMenu($id)
    {
        $position = MenuLink::where('menu_id', $id)->max('position');

        return $position + 1;
    }
}
