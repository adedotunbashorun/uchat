<?php namespace Modules\History\Presenters;

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

    public function iconBgColor()
    {
        switch ($this->entity->action)
        {
            case 'created':
                return 'success';
                break;
            case 'updated':
                return 'primary';
                break;
            case 'deleted':
                return 'danger';
                break;
            default:
                return 'success';
                break;
        }
    }

}