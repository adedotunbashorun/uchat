<?php namespace Modules\Core\Http\Controllers;

use Illuminate\Routing\Controller;
use Kris\LaravelFormBuilder\FormBuilderTrait;
use Modules\Core\Traits\RedirectingTrait;

abstract class BaseAccountController extends Controller {
	
    use RedirectingTrait;
    use FormBuilderTrait;

    protected $repository;

    public function __construct($repository = null)
    {
        $this->middleware(config('myapp.middleware.account'));
        $this->repository = $repository;
    }

	
}