<?php namespace Modules\Users\Services;

use Modules\Artisans\Repositories\ArtisanInterface;
use Modules\Users\Events\UserHasRegistered;
use Modules\Users\Repositories\AuthenticationInterface;
use Modules\Users\Repositories\RoleInterface;

class UserRegistration
{
    /**
     * @var Authentication
     */
    private $auth;
    /**
     * @var RoleRepository
     */
    private $role;
    /**
     * @var array
     */
    private $input;

    public function __construct(AuthenticationInterface $auth, RoleInterface $role)
    {
        $this->auth = $auth;
        $this->role = $role;
    }

    /**
     * @param array $input
     * @return mixed
     */
    public function register(array $input)
    {
        $this->input = $input;
        $user = $this->createUser();
        $group = isset($this->input['group']) ? $this->input['group'] : 'User';

        if ($group == 'Artisan') {
            $this->createArtisanForUser($user);
        }

        $this->assignUserToGroup($user, $group);

        //event(new UserHasRegistered($user));

        return $user;
    }

    private function createUser()
    {
        return $this->auth->register((array)$this->input);
    }

    private function assignUserToGroup($user, $group = 'User')
    {
        $role = $this->role->findByName($group);

        $this->auth->assignRole($user, $role);
    }

    /**
     * Check if the request input has a profile key
     * @return bool
     */
    private function hasArtisanData()
    {
        return isset($this->input['artisan']);
    }

    /**
     * Create a profile for the given user
     * @param $user
     */
    private function createArtisanForUser($user)
    {
        $array_to_merge = ['user_id' => $user->id,'slug'=>$user->username];
        $artisan_data = $this->hasArtisanData() ? array_merge($this->input['artisan'], $array_to_merge) : $array_to_merge;
        app(ArtisanInterface::class)->create($artisan_data);
    }
}
