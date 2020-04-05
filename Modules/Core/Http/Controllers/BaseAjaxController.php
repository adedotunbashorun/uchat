<?php

namespace Modules\Core\Http\Controllers;

use Illuminate\Routing\Controller;
use Response;
use Yajra\Datatables\Datatables;

abstract class BaseAjaxController extends Controller
{
    protected $repository;

    public function __construct($repository = null)
    {
        $this->middleware('auth.admin');
        $this->repository = $repository;
    }

    /**
     * Get models
     *
     * @return Response
     */
    public function index()
    {
        $model = $this->repository->getForDatatable();

        $model_table = $this->repository->getTable();

        return Datatables::of($model)
            ->addColumn('action', $model_table . '::admin._table-action')
            ->escapeColumns(['action'])
            ->removeColumn('id')
            ->make();
    }

    public function destroy($id)
    {
        $model = $this->repository->byId($id);
        $deleted = $this->repository->delete($model);
        /*\Notification::success(trans('core::global.delete_success'));*/
    }
}
