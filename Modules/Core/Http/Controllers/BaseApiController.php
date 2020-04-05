<?php namespace Modules\Core\Http\Controllers;

use Illuminate\Routing\Controller;

abstract class BaseApiController extends Controller
{
    /**
     *  Array of endpoints that do not require authorization.
     */
    protected $publicEndpoints = [];

    protected $repository;

    public function __construct($repository = null)
    {
        // $this->middleware('auth:account' || 'auth:admin', ['except' => $this->publicEndpoints]);
        $this->repository = $repository;
    }

}
