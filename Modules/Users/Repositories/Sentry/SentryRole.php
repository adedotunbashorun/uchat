<?php

namespace Modules\Users\Repositories\Sentry;

use Modules\Users\Repositories\RoleInterface;
use Cartalyst\Sentry\Facades\Laravel\Sentry;

class SentryRole implements RoleInterface
{
    public function getModel()
    {
        $model = config('auth.model');
        return $model::getModel();
    }

    /**
     * Get table name
     *
     * @return string
     */
    public function getTable()
    {
        return config('auth.role_table');
    }

    /**
     * Return all the roles
     * @return mixed
     */
    public function all()
    {
        return Sentry::findAllGroups();
    }

    /**
     * Create a role resource
     * @return mixed
     */
    public function create($data)
    {
        unset($data['slug']);
        Sentry::createGroup($data);
    }

    /**
     * Find a role by its id
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return Sentry::findGroupById($id);
    }

    /**
     * Update a role
     * @param $id
     * @param $data
     * @return mixed
     */
    public function update($id, $data)
    {
        unset($data['slug']);
        $role = Sentry::findGroupById($id);

        $role->update($data);
    }

    /**
     * Delete a role
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        $role = Sentry::findGroupById($id);

        return $role->delete();
    }

    /**
     * Find a role by its name
     * @param  string $name
     * @return mixed
     */
    public function findByName($name)
    {
        return Sentry::findGroupByName($name);
    }
}
