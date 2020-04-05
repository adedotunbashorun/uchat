<?php namespace Modules\Menus\Entities;

use Modules\Core\Collections\NestableTrait;
use Modules\Core\Entities\Base;
use Modules\Core\Presenters\PresentableTrait;
use Modules\History\Traits\Historable;

class Menu extends Base {

    use PresentableTrait;
    use Historable;

    protected $presenter = 'Modules\Menus\Presenters\ModulePresenter';

    protected $guarded = ['_token','exit'];


    public function menu_links()
    {
        return $this->hasMany('Modules\Menus\Entities\MenuLink')->orderBy('position', 'asc');
    }
}