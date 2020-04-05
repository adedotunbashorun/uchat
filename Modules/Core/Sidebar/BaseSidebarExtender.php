<?php

namespace Modules\Core\Sidebar;

use Modules\Users\Repositories\AuthenticationInterface as Authentication;

abstract class BaseSidebarExtender
{
    /**
     * @var Authentication
     */
    protected $auth;

    /**
     * @param Authentication $auth
     */
    public function __construct(Authentication $auth)
    {
        $this->auth = $auth;
    }
}
