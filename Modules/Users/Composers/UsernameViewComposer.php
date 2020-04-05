<?php namespace Modules\Users\Composers;

use Illuminate\Contracts\View\View;
use Modules\Users\Repositories\AuthenticationInterface;

class UsernameViewComposer
{
    /**
     * @var Authentication
     */
    private $auth;

    public function __construct(AuthenticationInterface $auth)
    {
        $this->auth = $auth;
    }

    public function compose(View $view)
    {
        $view->with('user', $this->auth->check());
    }
}
