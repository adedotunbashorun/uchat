<?php namespace Modules\Menus\Http\Controllers;

use Modules\Core\Http\Controllers\BaseAjaxController;
use Modules\Menus\Repositories\MenuInterface as Repository;
use Yajra\DataTables\DataTables;

class MenusAjaxController extends BaseAjaxController {

    public function __construct(Repository $repository)
    {
        parent::__construct($repository);
    }

    public function index()
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


}
