<?php namespace Modules\Users\Http\Controllers;

use Modules\Core\Http\Controllers\BaseAjaxController;
use Yajra\Datatables\Datatables;
use Modules\Users\Repositories\UserInterface as Repository;

class UsersAjaxController extends BaseAjaxController {

    public function __construct(Repository $repository)
    {
        parent::__construct($repository);
    }

    public function index()
    {
        $model = $this->repository->getForDatatable();

        //$model_table = str_replace('_','',$this->repository->getTable());
        $model_table = 'users';

        return Datatables::of($model)
            ->addColumn('action',$model_table.'::admin._table-action')
            ->removeColumn('id')
            ->make();
    }

    public function destroy($id)
    {
        $this->repository->delete($id);

        session('success',trans('core::global.delete_success'));

    }


}
