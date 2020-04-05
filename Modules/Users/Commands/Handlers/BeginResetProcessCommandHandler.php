<?php namespace Modules\Users\Commands\Handlers;

use Illuminate\Support\Facades\Event;
use Modules\Users\Repositories\AuthenticationInterface as Authentication;
use Modules\Users\Events\UserHasBegunResetProcess;
use Modules\Users\Exceptions\UserNotFoundException;
use Modules\Users\Repositories\Sentinel\SentinelUser;
use Modules\Users\Repositories\UserInterface;

class BeginResetProcessCommandHandler
{
    /**
     * @var SentinelUser
     */
    private $user;
    /**
     * @var Authentication
     */
    private $auth;

    public function __construct(UserInterface $user, Authentication $auth)
    {
        $this->user = $user;
        $this->auth = $auth;
    }

    /**
     * Handle the command
     *
     * @param $command
     * @throws UserNotFoundException
     * @return mixed
     */
    public function handle($command)
    {
        $user = $this->findUser((array) $command);

        $code = $this->auth->createReminderCode($user);

        event(new UserHasBegunResetProcess($user, $code));
    }

    private function findUser($credentials)
    {
        $user = $this->user->findByCredentials((array) $credentials);
        if ($user) {
            return $user;
        }

        throw new UserNotFoundException();
    }
}
