<?php namespace Modules\Pages\Entities;

use Modules\Core\Collections\NestableTrait;
use Modules\Core\Entities\Base;
use Modules\Core\Presenters\PresentableTrait;
use Modules\History\Traits\Historable;

class Page extends Base {

    use PresentableTrait;
    use NestableTrait;
    use Historable;

    protected $presenter = 'Modules\Pages\Presenters\ModulePresenter';

    protected $fillable = array(
        'meta_robots_no_index',
        'meta_robots_no_follow',
        'position',
        'parent_id',
        'is_home',
        'redirect',
        'css',
        'js',
        'module',
        'template',
        'image',
        'title',
        'slug',
        'uri',
        'status',
        'body',
        'meta_title',
        'meta_keywords',
        'meta_description',
        'tagline',
        'icon'
    );


    //protected $appends = ['status', 'title', 'thumb', 'uri'];

    /**
     * Columns that are file.
     *
     * @var array
     */
    public $attachments = [
        'image',
    ];

    /**
     * A page can have menulinks
     */
    public function menu_links()
    {
        return $this->hasMany('Modules\MenuLinks\Entities\MenuLink');
    }

    /**
     * A page can have children
     */
    public function children()
    {
        return $this->hasMany('Modules\Pages\Entities\Page', 'parent_id')->order();
    }

    /**
     * A page can have a parent
     */
    public function parent()
    {
        return $this->belongsTo('Modules\Pages\Entities\Page', 'parent_id');
    }

}