<?php namespace Modules\Menus\Http\Controllers;

use Modules\Core\Http\Controllers\BaseAdminController;
use Modules\Menus\Entities\Menu;
use Modules\Menus\Http\Requests\FormRequest;
use Modules\Menus\Repositories\MenuInterface as Repository;
use Yajra\DataTables\Facades\DataTables;

class MenusController extends BaseAdminController {

    public function __construct(Repository $repository)
    {
        parent::__construct($repository);
    }

    public function create()
    {
        $module = $this->repository->getTable();
        $form = $this->form(config($module.'.form'), [
            'method' => 'POST',
            'url' => route('admin.'.$module.'.store')
        ]);
        return view('core::admin.create')
            ->with(compact('module','form'));
    }

    public function edit($id)
    {
        //dd($model);
        $model = $this->repository->byId($id);
        $module = $model->getTable();
        $form = $this->form(config($module.'.form'), [
            'method' => 'PUT',
            'url' => route('admin.'.$module.'.update',$model),
            'model'=>$model
        ]);
        return view('core::admin.edit')
            ->with(compact('model','module','form','id'));
    }

    public function store(FormRequest $request)
    {
        $data = $request->all();

        $data['slug'] = str_slug($data['name']);

        $model = $this->repository->create($data);

        flash()->success(trans('core::global.new_record'));

        return $this->redirect($request, $model);
    }

    public function update($model,FormRequest $request)
    {
        $data = $request->all();

        $data['id'] = $model;

        $data['slug'] = str_slug($data['name']);

        $model = $this->repository->update($data);

        flash()->success(trans('core::global.new_record'));

        return $this->redirect($request, $model);
    }

    public function dataTable()
    {
        $model = $this->repository->getForDatatable();

        $model_table = $this->repository->getTable();

        return Datatables::of($model)
            ->editColumn('status', function($row) {
                $html = '';
                $html .= status_label($row->status);

                return $html;
            })
            ->addColumn('action',$model_table.'::admin._table-action')
            ->escapeColumns(['action'])
            ->removeColumn('id')
            ->make(true);
    }

    public function destroy($id)
    {
        $model = $this->repository->byId($id);
        $this->repository->delete($model);
    }

}
