<?php namespace Modules\Users\Http\Controllers;

use Modules\Core\Http\Controllers\BaseAjaxController;
use Modules\Users\Http\Requests\FormRequest;
use Modules\Users\Repositories\RoleInterface as Repository;

class RolesAjaxController extends BaseAjaxController {

    public function __construct(Repository $repository)
    {
        parent::__construct($repository);
    }

    public function index()
    {
        $model = $this->repository->getForDatatable();

        //$model_table =$this->repository->getTable();
        $model_table ='users.roles';

        return \Datatables::of($model)
            ->add_column('options', function ($row) use($model_table)
            {
                $html = '';
                $html .= edit_btn(route('admin.'.$model_table.'.edit',$row->id));
                if(has_access($model_table.'.destroy'))
                $html .= delete_btn(route('ajax.'.$model_table.'.destroy',$row->id));

                return $html;
            })
            ->remove_column('id')
            ->make();
    }

    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        \Notification::success(trans('core::global.delete_success'));

    }


}
