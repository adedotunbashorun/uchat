<?php namespace Modules\Photos\Entities;

use Modules\Core\Entities\Base;
use Modules\Core\Presenters\PresentableTrait;

class Photo extends Base {

    use PresentableTrait;

    protected $presenter = 'Modules\Photos\Presenters\ModulePresenter';

    protected $guarded = ['_token','exit'];


}