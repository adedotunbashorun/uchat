<?php namespace Modules\Banners\Entities;

use Modules\Core\Entities\Base;
use Modules\Core\Presenters\PresentableTrait;

class Banner extends Base {

    use PresentableTrait;

    protected $presenter = 'Modules\Banners\Presenters\ModulePresenter';

    protected $guarded = ['_token','exit'];

    public $attachments = [
        'image',
    ];

    protected $appends = ['slide'];

    public function getSlideAttribute()
    {
        return $this->present()->thumbSrc(1920,900,[],'image');
    }

}