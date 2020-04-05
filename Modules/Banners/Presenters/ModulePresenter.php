<?php namespace Modules\Banners\Presenters;

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
        return '';
    }

    public function caption()
    {
        return strip_tags($this->entity->caption,'<br><span></span>');
    }

    public function body()
    {
        return strip_tags($this->entity->body,'<br>');
    }
}