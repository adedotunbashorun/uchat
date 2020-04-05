<?php namespace Modules\Menus\Presenters;

use Modules\Core\Presenters\Presenter;

class ModulePresenter  extends Presenter
{

    /**
     * Get title
     *
     * @return string
     */
    public function title()
    {
        return ucwords(strtolower($this->entity->name));
    }
}