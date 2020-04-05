<?php namespace Modules\Categories\Entities;

use Modules\Core\Entities\Base;
use Modules\Core\Presenters\PresentableTrait;
use Modules\Users\Entities\Sentinel\User;

class Category extends Base {

    use PresentableTrait;

    protected $presenter = 'Modules\Categories\Presenters\ModulePresenter';

    protected $guarded = ['_token','exit','files'];

    public $attachments = ['image'];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}