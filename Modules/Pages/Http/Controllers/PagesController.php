<?php namespace Modules\Pages\Http\Controllers;

use Modules\Core\Http\Controllers\BaseAdminController;
use Modules\Pages\Http\Requests\FormRequest;
use Modules\Pages\Repositories\PageInterface as Repository;
use Yajra\Datatables\Datatables;

class PagesController extends BaseAdminController
{

    public function __construct(Repository $repository)
    {
        parent::__construct($repository);
    }

    public function index()
    {
        $module = $this->repository->getTable();
        $title = trans($module . '::global.group_name');
        return view('core::admin.index')
            ->with(compact('title', 'module'));
    }

    public function create($parent = null)
    {
        $model = $this->repository->getModel();
        $module = $model->getTable();
        $form = $this->form(config('pages.form'), [
            'method' => 'POST',
            'url' => route('admin.pages.store'),
            'data' => [
                'pages' => get_pages(),
                'template' => \MyApp::templates(),
                'modules' => \MyApp::getModulesForSelect(),
                'menus' => \Menus::all()->pluck('name', 'id')->all(),
            ]
        ]);
        //$form->modify('parent_id', 'select', ['choices' => [get_parents()]]);
        return view('core::admin.create')
            ->with(compact('model', 'form', 'module'));
    }

    public function edit($model, $child = null)
    {
        $model = $this->repository->byId($model);
        $module = str_replace('_', '', $model->getTable());
        $form = $this->form(config($module . '.form'), [
            'method' => 'PUT',
            'url' => route('admin.' . $module . '.update', $model),
            'model' => $model,
            'data' => [
                'pages' => get_pages(),
                'template' => \MyApp::templates(),
                'modules' => \MyApp::getModulesForSelect(),
                'menus' => \Menus::all()->pluck('name', 'id')->all(),

            ]
        ])->modify('parent_id', 'select', [
            'selected' => $model->parent_id
        ])->modify('template', 'select', [
            'selected' => $model->template
        ])
        ->modify('is_home', 'choice', [
            'selected' => $model->is_home
        ]);
        return view('core::admin.edit')
            ->with(compact('model', 'form', 'module'));
    }


    public function store(FormRequest $request)
    {
      //  dd($request->all());
        $data = $request->all();

        $data['parent_id'] = $data['parent_id'] ?: null;

        $data['slug'] = str_slug($data['title']);

        if (isset($data['image'])) {
            $image = file_upload($data['image'], 'pages/');
            $data['image'] = $image['filename'];
        }

        $model = $this->repository->create($data);

        return $this->redirect($request, $model, trans('core::global.new_record'));
    }

    public function update($model, FormRequest $request)
    {
        $data = $request->all();
        $data['id'] = $model;

        $data['parent_id'] = $data['parent_id'] ?: null;

        if (isset($data['image'])) {
            $image = file_upload($data['image'], 'pages/');
            $data['image'] = $image['filename'];
        }

        $model = $this->repository->update($data);

        return $this->redirect($request, $model, trans('core::global.update_record'));
    }

    public function dataTable()
    {
        $model = $this->repository->getForDatatable();

        $model_table = 'pages';

        return Datatables::of($model)
            ->editColumn('parent_title', function($row) {
                if(!$row->parent_title) {
                    return 'n/a';
                } else{
                    return $row->parent_title;
                }

            })
            ->editColumn('status', function($row) {
                $html = '';
                $html .= status_label($row->status);

                return $html;
            })
            ->addColumn('action',$model_table.'::admin._table-action')
            ->escapeColumns(['action'])
            ->removeColumn('page_id')
            ->make(true);
    }


}