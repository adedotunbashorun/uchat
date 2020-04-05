<?php namespace Modules\Menus\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\Menus\Repositories\MenuLinkInterface as Repository;
use Modules\Menus\Repositories\MenuInterface;

class MenuLinksAjaxController extends Controller {

    protected $repository;

    public function __construct(Repository $repository)
    {
        $this->middleware('auth.admin');
        $this->repository = $repository;
    }

    public function index($menu_id,MenuInterface $menu)
    {
        $menu = $menu->byId($menu_id);

        $menu_links = $this->repository->allNestedBy('menu_id', $menu_id, ['menu'], true);

        return view('menus::admin.menu_links._menu')
            ->with(compact('menu','menu_links'));
    }

    public function sort($menu_id,MenuInterface $menu)
    {
        if (request()->get('sortable')) {
            $data['item'] = request()->get('sortable');
            $data['moved'] = 0;
            $this->repository->sort($data);
        }
        $menu = $menu->byId($menu_id);
        $menu_links = $this->repository->allNestedBy('menu_id', $menu_id, ['menu'], true);

        return view('menus::admin.menu_links._menu')
            ->with(compact('menu','menu_links'));
    }

    public function destroy($id)
    {
        $model = $this->repository->byId($id);
        $deleted = $this->repository->delete($model);

        flash()->success(trans('core::global.delete_success'));

    }

}
