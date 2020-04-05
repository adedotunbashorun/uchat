<?php

namespace Modules\Users\Http\Controllers;

use Modules\Core\Events\PasswordWasChangedEvent;
use Modules\Users\Http\Requests\ChangePasswordFormRequest;
use Modules\Users\Http\Requests\FormEditRequest;
use Modules\Users\Http\Requests\FormRequest;
use Modules\Users\Repositories\AuthenticationInterface;
use Modules\Users\Repositories\RoleInterface;
use Modules\Users\Repositories\UserInterface as Repository;
use Modules\Users\Services\PermissionManager;
use Yajra\Datatables\Datatables;

class UsersController extends BaseUsersController
{
    public function __construct(Repository $repository, PermissionManager $permissions, AuthenticationInterface $auth, RoleInterface $role)
    {
        parent::__construct($repository);
        $this->permissions = $permissions;
        $this->auth = $auth;
        $this->role = $role;
    }

    public function create($parent = null)
    {
        $model = $this->repository->getModel();
        $module = $model->getTable();
        $form = $this->form(config($module . '.form'), [
            'method' => 'POST',
            'url' => route('admin.' . $module . '.store'),
        ]);
        $roles = $this->role->all();

        return view('core::admin.create')
            ->with(compact('model', 'module', 'form', 'roles'));
    }

    public function edit($id)
    {
        $model = $this->repository->find($id);
        $module = 'users';
        $form = $this->form(config($module . '.form'), [
            'method' => 'PUT',
            'url' => route('admin.' . $module . '.update', $model),
            'model' => $model
        ]);
        $roles = $this->role->all();
        $currentUser = $this->auth->check();
        return view('core::admin.edit')
            ->with(compact('model', 'module', 'form', 'id', 'roles', 'currentUser'));
    }

    public function store(FormRequest $request)
    {
        $data = $this->mergeRequestWithPermissions($request);

        $model = $this->repository->createWithRoles($data, $request->roles, true);

        return $this->redirect($request, $model, trans('core::global.new_record'));
    }

    public function update($id, FormEditRequest $request)
    {
        $data = $this->mergeRequestWithPermissions($request);

        $model = $this->repository->updateAndSyncRoles($id, $data, $request->roles);

        return $this->redirect($request, $model, trans('core::global.update_record'));
    }

    public function changePassword()
    {
        $model = $this->repository->getModel();
        $module = str_replace('_', '', $model->getTable());
        $form = $this->form('Users\Forms\ChangePasswordForm', [
            'method' => 'POST',
        ]);
        return view('users::admin.change_password')->with(compact('form', 'module'));
    }

    public function postChangePassword(ChangePasswordFormRequest $request)
    {
        $data = $request->all();
        $model = $this->repository->changeUserPassword(current_user(), $data);

        \Notification::success(trans('users::global.change_password_success'));

        $email_data['password'] = $data['password'];
        $email_data['email'] = $model->email;
        $email_data['user_name'] = $model->first_name . ' ' . $model->last_name;

        event(new PasswordWasChangedEvent($email_data));

        return redirect(route('admin.users.change-password'));
    }

    public function dataTable()
    {
        $model = $this->repository->getForDatatable();

        //$model_table = str_replace('_','',$this->repository->getTable());
        $model_table = 'users';

        return Datatables::of($model)
            ->addColumn('action', $model_table . '::admin._table-action')
            ->removeColumn('id')
            ->make();
    }
}
