<?php namespace Modules\Blocks\Repositories;

use Illuminate\Database\Eloquent\Model;
use Modules\Core\Repositories\RepositoriesAbstract;

class EloquentBlock extends RepositoriesAbstract implements BlockInterface
{

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function allIn($array)
    {
        $query = $this->model->whereIn('slug',$array);
        return $query->get();
    }


}