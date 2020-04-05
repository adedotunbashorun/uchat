<?php namespace Modules\Menus\Http\Controllers;

use Illuminate\Routing\Controller;
use Kris\LaravelFormBuilder\FormBuilderTrait;
use Modules\Core\Http\Controllers\BaseAdminController;
use Modules\Core\Traits\RedirectingTrait;
use Modules\Menus\Entities\Menu;
use Modules\Menus\Forms\MenuLinksForm;
use Modules\Menus\Http\Requests\FormRequest;
use Modules\Menus\Http\Requests\MenuLinkFormRequest;
use Modules\Menus\Repositories\MenuInterface;
use Modules\Menus\Repositories\MenuLinkInterface as Repository;

class MenuLinksController extends Controller {

    use FormBuilderTrait,RedirectingTrait;

    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
        $this->middleware('auth.admin');
        $this->middleware('permissions');
    }

    public function index($menu_id,MenuInterface $menu)
    {
        $module = $this->repository->getTable();
        $menu = $menu->byId($menu_id);

        $form = $this->form(config('menus.link_form'), [
            'method' => 'POST',
            'url' => route('admin.menus.menu_links.store',[$menu_id]),
            'data'=>[
                'links'=>$this->repository->allForSelect($menu_id),
            ]
        ]);

        $menu_links = $this->repository->allNestedBy('menu_id', $menu_id, ['menu'], true);

        $title = trans($module . '::global.group_name');
        return view('menus::admin.menu_links.index')
            ->with(compact('title', 'module','menu','form','menu_links'));
    }

    public function edit($menu_id,$id)
    {
        $model = $this->repository->byId($id);
        $module = $model->getTable();
        $form = $this->form(config('menus.link_form'), [
            'method' => 'PUT',
            'url' => route('admin.menus.menu_links.update',[$menu_id,$id]),
            'model' => $model,
            'data'=>[
                'links'=>$this->repository->allForSelect($menu_id),
            ]

        ]);
        return view('menus::admin.menu_links.edit')
            ->with(compact('model', 'module', 'form', 'id'));
    }

    public function store($menu_id, MenuLinkFormRequest $request)
    {
      //  dd($menu_id, $request);
        $data = $request->all();

        $data['parent_id'] = $data['parent_id'] ?: NULL;
        $data['menu_id'] = $menu_id;
        $data['page_id'] = $data['page_id'] ?: null;
        $data['position'] = isset($data['position']) ?: 0;
        $data['slug'] = str_slug($data['title']);


        $model = $this->repository->create($data);

        flash()->success(trans('core::global.new_record'));

        return $this->redirect($request, $model);
    }

    public function update($menu_id,$model,MenuLinkFormRequest $request)
    {
        $data = $request->all();

        $data['parent_id'] = $data['parent_id'] ?: null;
        $data['page_id'] = $data['page_id'] ?: null;

        $data['id'] = $model;

        $model = $this->repository->update($data);

        flash()->success(trans('core::global.update_record'));

        return $this->redirect($request, $model);
    }

    protected function redirect($request, $model)
    {
        $redirectUrl = $request->get('exit') ? $model->indexUrl() : $model->editUrl() ;
        return redirect($redirectUrl);
    }

}
