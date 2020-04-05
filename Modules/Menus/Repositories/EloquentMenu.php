<?php namespace Modules\Menus\Repositories;

use Exception;
use Illuminate\Database\Eloquent\Model;
use Modules\Core\Collections\NestableCollection;
use Modules\Core\Repositories\RepositoriesAbstract;
use Modules\Menus\Entities\Menu;
use Modules\Menus\Entities\MenuLink;

class EloquentMenu extends RepositoriesAbstract implements MenuInterface
{

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Render a menu.
     *
     * @param string $name menu name
     *
     * @return string html code of a menu
     */
    public function render($slug,$template='_menu')
    {
        return view('menus::public.'.$template, ['slug' => $slug]);
    }

    /**
     * Get a menu.
     *
     * @param string $name menu name
     *
     * @return \Modules\Menus\Entities\Menu|null
     */
    public function getMenu($slug)
    {
        $menu = $this->bySlug($slug,['menu_links']);

        if(is_null($menu)){
            return;
        }
        $menu->menu_links = $this->prepare($menu->menu_links);
        $menu->menu_links->nest();
        return $menu;
    }

    /**
     * Set href and classes for each items in collection.
     *
     * @param \Modules\Core\Collections\NestableCollection $items
     *
     * @return \Modules\Core\Collections\NestableCollection
     */
    public function prepare(NestableCollection $items = null)
    {
        $items->each(function ($item) {
            /*if ($item->has_categories) {
                $item->items = $this->prepare(Categories::allForMenu($item->page->uri));
            }*/
            $item->href = $this->setHref($item);
            $item->class = $this->setClass($item);
        });

        return $items;
    }

    /**
     * 1. If menulink has url field, take it.
     * 2. If menulink has a page, take the uri of the page in the current locale.
     *
     * @param \Modules\Menus\Entities\Menulink $menu_link
     *
     * @return string uri
     */
    public function setHref(Menulink $menu_link)
    {
        if ($menu_link->url) {
            return $menu_link->url;
        }
        if ($menu_link->page) {
            return $menu_link->page->uri;
        }

        return '/';
    }

    /**
     * Take the classes from field and add active if needed.
     *
     * @param \Modules\Menus\Entities\Menulink $menu_link
     *
     * @return string classes
     */
    public function setClass(Menulink $menu_link)
    {
        $classArray = preg_split('/ /', $menu_link->class, null, PREG_SPLIT_NO_EMPTY);
        // add active class if current uri is equal to item uri or contains
        // item uri and is bigger than 3 to avoid homepage link always active ('/', '/lg')
        $pattern = $menu_link->href;
        if (strlen($menu_link->href) > 3) {
            $pattern .= '*';
        }
        if (\Request::is($pattern)) {
            $classArray[] = 'active';
        }

        return implode(' ', $classArray);
    }

}