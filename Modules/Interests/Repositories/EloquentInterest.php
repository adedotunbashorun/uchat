<?php namespace Modules\Interests\Repositories;

use Illuminate\Database\Eloquent\Model;
use Modules\Core\Repositories\RepositoriesAbstract;

class EloquentInterest extends RepositoriesAbstract implements InterestInterface
{

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

}