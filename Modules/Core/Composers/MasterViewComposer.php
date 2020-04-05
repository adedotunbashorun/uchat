<?php namespace Modules\Core\Composers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\App;

class MasterViewComposer
{
    public function compose(View $view)
    {
        $view->with('websiteTitle', ' | '.config('myapp.website_title'));
        $view->with('metaTitle', ' | '.config('myapp.meta_title'));
    }
}
