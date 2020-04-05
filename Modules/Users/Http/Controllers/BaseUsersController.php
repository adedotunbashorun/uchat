<?php

namespace Modules\Users\Http\Controllers;


use Modules\Core\Http\Controllers\BaseAdminController;

abstract class BaseUsersController extends BaseAdminController
{
    /**
     * @var PermissionManager
     */
    protected $permissions;

    /**
     * @param $request
     * @return array
     */
    protected function mergeRequestWithPermissions($request)
    {
        $permissions = [];

        if (! $this->permissions->permissionsAreAllFalse($request->permissions)) {
            $permissions = $this->permissions->clean($request->permissions);
        }

        return array_merge($request->all(), [ 'permissions' => $permissions ]);
    }
}