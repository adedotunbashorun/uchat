<?php namespace Modules\Blocks\Entities;

use Modules\Core\Entities\Base;
use Modules\Core\Presenters\PresentableTrait;

class Block extends Base {

    use PresentableTrait;

    protected $presenter = 'Modules\Blocks\Presenters\ModulePresenter';

    protected $guarded = ['_token','exit'];

    public $attachments = ['image'];

}