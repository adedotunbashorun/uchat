<?php namespace Modules\Photos\Repositories;

use Illuminate\Database\Eloquent\Model;
use Modules\Core\Repositories\RepositoriesAbstract;

class EloquentPhoto extends RepositoriesAbstract implements PhotoInterface
{

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

}