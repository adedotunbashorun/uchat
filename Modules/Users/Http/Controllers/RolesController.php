<?php namespace Modules\Users\Http\Controllers;

use Modules\Core\Http\Controllers\BaseAdminController;
use Modules\Users\Http\Requests\FormRequest;
use Modules\Users\Http\Requests\RoleRequest;
use Modules\Users\Repositories\RoleInterface as Repository;
use Modules\Users\Services\PermissionManager;

class RolesController extends BaseUsersController {

    public function __construct(Repository $repository,PermissionManager $permissions)
    {
        parent::__construct($repository);
        $this->permissions = $permissions;
    }

    public function index()
    {
        $module = 'users';
        $title = trans($module . '::global.group_name');
        $roles = $this->repository->all();
        return view('users::admin.roles.index')
            ->with(compact('title', 'module','roles'));
    }

    public function create($parent = null)
    {
        $module = 'users';
        $form = $this->form(config('users.roles.form'), [
            'method' => 'POST',
            'url' => route('admin.users.roles.store')
        ]);
        return view('users::admin.roles.create')
            ->with(compact('model','module','form'));
    }

    public function edit($id, $child = null)
    {
        $model = $this->repository->find($id);
        $form = $this->form(config('users.roles.form'), [
            'method' => 'PUT',
            'url' => route('admin.users.roles.update',$model),
            'model'=>$model
        ]);
        $module = 'users';
        return view('users::admin.roles.edit')
            ->with(compact('model','module','form','id'));
    }

    public function store(RoleRequest $request)
    {
        $data = $this->mergeRequestWithPermissions($request);

        $model = $this->repository->create(array_only($data,['name','permissions','slug']));

        $redirectUrl = $request->get('exit') ? route('admin.users.roles.index') : route('admin.users.roles.edit',$model->id) ;
        return redirect($redirectUrl)->withSuccess(trans('core::global.new_record'));
    }

    public function update($id,RoleRequest $request)
    {
        $data = $this->mergeRequestWithPermissions($request);

        $model = $this->repository->update($id,array_only($data,['name','permissions','slug']));

        $redirectUrl = $request->get('exit') ? route('admin.users.roles.index') : route('admin.users.roles.edit',$id) ;
        return redirect($redirectUrl)->withSuccess(trans('core::global.update_record'));
    }

}
