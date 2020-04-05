<?php namespace Modules\Menus\Entities;

use InvalidArgumentException;
use Modules\Core\Collections\NestableTrait;
use Log;
use Modules\Core\Entities\Base;
use Modules\Core\Presenters\PresentableTrait;
use Modules\History\Traits\Historable;

class MenuLink extends Base {

    use PresentableTrait;
    use NestableTrait;
    use Historable;

    protected $presenter = 'Modules\Menus\Presenters\MenuLinkPresenter';

    protected $guarded = ['_token','exit'];

    /**
     * A menulink belongs to a menu.
     */
    public function menu()
    {
        return $this->belongsTo('Modules\Menus\Entities\Menu');
    }

    /**
     * A menulink can belongs to a page.
     */
    public function page()
    {
        return $this->belongsTo('Modules\Pages\Entities\Page');
    }

    /**
     * A menulink can have children.
     */
    public function children()
    {
        return $this->hasMany('Modules\Menus\Entities\MenuLink', 'parent_id');
    }

    /**
     * A menulink can have a parent.
     */
    public function parent()
    {
        return $this->belongsTo('Modules\Menus\Entities\MenuLink', 'parent_id');
    }

    /**
     * Get edit url of model.
     *
     * @return string|void
     */
    public function editUrl()
    {
        try {
            return route('admin.menus.menu_links.edit', [$this->menu_id, $this->id]);
        } catch (InvalidArgumentException $e) {
            Log::error($e->getMessage());
        }
    }

    /**
     * Get back office�s index of models url.
     *
     * @return string|void
     */
    public function indexUrl()
    {
        try {
            return route('admin.menus.menu_links.index', $this->menu_id);
        } catch (InvalidArgumentException $e) {
            Log::error($e->getMessage());
        }
    }
}