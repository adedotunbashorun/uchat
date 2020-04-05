<?php namespace Modules\Menus\Presenters;

use Modules\Core\Presenters\Presenter;

class MenuLinkPresenter  extends Presenter
{

    /**
     * Get title
     *
     * @return string
     */
    public function title()
    {
        return ucwords(strtolower($this->entity->title));
    }
}