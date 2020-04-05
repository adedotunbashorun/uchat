<?php

namespace Modules\Users\Entities\Sentry;


use Cartalyst\Sentry\Users\Eloquent\User as SentryUserModel;
use Cartalyst\Sentry\Facades\Laravel\Sentry;
use Illuminate\Support\Facades\Config;
use InvalidArgumentException;
use Log;
use Modules\Core\Presenters\PresentableTrait;
use Modules\History\Traits\Historable;
use Modules\Users\Entities\UserInterface;


class User extends SentryUserModel implements UserInterface
{

    use PresentableTrait;

    use Historable;

    protected $presenter = 'Modules\Users\Presenters\ModulePresenter';

    protected $guarded = ['_method','_token', 'id', 'exit', 'roles','confirm_password'];

    /**
     * Get back office’s edit url of model
     *
     * @return string|void
     */
    public function editUrl()
    {
        try {
            return route('admin.' . $this->getTable() . '.edit', $this->id);
        } catch (InvalidArgumentException $e) {
            Log::error($e->getMessage());
        }
    }

    /**
     * Get back office’s index of models url
     *
     * @return string|void
     */
    public function indexUrl()
    {
        try {
            return route('admin.' . $this->getTable() . '.index');
        } catch (InvalidArgumentException $e) {
            Log::error($e->getMessage());
        }
    }

    public function groups()
    {
        return $this->belongsToMany(static::$groupModel, static::$userGroupsPivot, 'user_id');
    }

    /**
     * Checks if a user belongs to the given Role ID
     * @param  int  $roleId
     * @return bool
     */
    public function hasRoleId($roleId)
    {
        $role = Sentry::findGroupById($roleId);

        return $this->inGroup($role);
    }

    /**
     * Checks if a user belongs to the given Role Name
     * @param  string $name
     * @return bool
     */
    public function hasRoleName($name)
    {
        $role = Sentry::findGroupByName($name);

        return $this->inGroup($role);
    }

    /**
     * Check if the current user is activated
     * @return bool
     */
    public function isActivated()
    {
        return (bool) $this->activated;
    }

    public function __call($method, $parameters)
    {
        $class_name = class_basename($this);

        #i: Convert array to dot notation
        $config = implode('.', ['relations', $class_name, $method]);
        #i: Relation method resolver
        if (Config::has($config)) {
            $function = Config::get($config);

            return $function($this);
        }

        #i: No relation found, return the call to parent (Eloquent) to handle it.
        return parent::__call($method, $parameters);
    }
}
