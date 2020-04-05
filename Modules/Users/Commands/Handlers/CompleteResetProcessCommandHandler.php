<?php namespace Modules\Users\Commands\Handlers;

use Modules\Users\Repositories\AuthenticationInterface as Authentication;
use Modules\Users\Exceptions\InvalidOrExpiredResetCode;
use Modules\Users\Exceptions\UserNotFoundException;
use Modules\Users\Repositories\UserInterface as UserRepository;

class CompleteResetProcessCommandHandler
{
    protected $input;
    /**
     * @var UserRepository
     */
    private $user;
    /**
     * @var Authentication
     */
    private $auth;

    public function __construct(UserRepository $user, Authentication $auth)
    {
        $this->user = $user;
        $this->auth = $auth;
    }

    /**
     * Handle the command
     *
     * @param $command
     * @throws InvalidOrExpiredResetCode
     * @throws UserNotFoundException
     * @return mixed
     */
    public function handle($command)
    {
        $this->input = $command;

        $user = $this->findUser();

        if (!$this->auth->completeResetPassword($user, $this->input->code, $this->input->password)) {
            throw new InvalidOrExpiredResetCode();
        }

        return $user;
    }

    public function findUser()
    {
        $user = $this->user->find($this->input->userId);
        if ($user) {
            return $user;
        }

        throw new UserNotFoundException();
    }
}
