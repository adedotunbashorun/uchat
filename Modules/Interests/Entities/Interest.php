<?php namespace Modules\Interests\Entities;

use Modules\Core\Entities\Base;
use Modules\Core\Presenters\PresentableTrait;
use Modules\Users\Entities\Sentinel\User;

class Interest extends Base {

    use PresentableTrait;

    protected $presenter = 'Modules\Interests\Presenters\ModulePresenter';

    protected $guarded = ['_token','exit'];

    public $attachments = ['image'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}