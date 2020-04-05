<?php

namespace Modules\Pages\Presenters;

use Modules\Core\Presenters\Presenter;

class ModulePresenter extends Presenter {

    public function parentUri()
    {
        $parentUri = '/';
        $parentUri = $this->entity->uri;
        $parentUri = explode('/', $parentUri);
        array_pop($parentUri);
        $parentUri = implode('/', $parentUri) . '/';

        return $parentUri;
    }

    public function parentTitle()
    {
        $title = ($this->entity->parent) ? $this->entity->parent->title : $this->entity->title;

        return $title;
    }


    public function title()
    {
        return ucwords(strtolower($this->entity->title));
    }

    public function parent_title()
    {
        if ($this->entity->parent_id > 0)
        {
            return ucwords(strtolower($this->entity->parent->title));
        }

        return ucwords(strtolower($this->entity->title));
    }

    public function styled_title()
    {
        if ($this->entity->parent_id > 0)
        {
            $html = '';
            $html .= '<h3>';
            $words = explode(' ', $this->entity->title);
            $words[0] = '<strong>' . $words[0] . '</strong>';
            $html .= implode(' ', $words);
            $html .= '</h3>';

            return $html;
        }
    }

    public function url()
    {
        return url($this->entity->uri);
    }


    public function pageTitle()
    {
        $title = ucwords(strtolower($this->entity->title));
        $baseTitle = ' | Monkeypage';
        $maxLength = 100;

        if (strlen($title . $baseTitle) > $maxLength)
        {
            while (strlen($title . $baseTitle) > $maxLength)
            {
                $title = $this->removeLastWord($title);
            }
        }

        return e($title . $baseTitle);
    }


    /*
        * Get featured image for this product
        *
        * @return string
        */
    public function image()
    {
        if ($this->entity->image)
        {
            $photo = '<img src="' . url('uploads/photos/' . $this->entity->photo) . '" alt="" class="page-photo thumbnail"/>';

            return $photo;
        }

        return '';
    }

}