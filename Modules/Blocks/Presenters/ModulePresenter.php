<?php namespace Modules\Blocks\Presenters;

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

    public function url()
    {
        return route('blocks.slug',[$this->entity->slug]);
    }

    public function content()
    {
        return strip_tags($this->entity->content);
    }

    public function styledTitle()
    {
        $new_array = [];
        $array = explode(' ',$this->entity->title);

        if(count($array) < 2) return $this->entity->title;

        $count = count($array);
        for($i = 0; $i < $count; $i++){
            $index = $count-1;
            $new_array[] = ($i == $index) ? '<span>'.$array[$index].'</span>' : $array[$i];
        }

        return implode(' ',$new_array);
    }
}