<?php namespace Modules\Users\Composers;

use Modules\Users\Services\PermissionManager;

class PermissionsViewComposer
{
    /**
     * @var PermissionManager
     */
    private $permissions;

    public function __construct(PermissionManager $permissions)
    {
        $this->permissions = $permissions;
    }

    public function compose($view)
    {
        // Get all permissions
        $view->permissions = $this->permissions->all();
    }
}
