<?php namespace Modules\Checkout\Repositories;

use Illuminate\Database\Eloquent\Model;
use Modules\Core\Repositories\RepositoriesAbstract;

class EloquentCheckout extends RepositoriesAbstract implements CheckoutInterface
{

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

}