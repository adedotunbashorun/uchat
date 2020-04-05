<?php namespace Modules\Users\Http\Controllers;

use Modules\Core\Http\Controllers\BaseApiController;
use Modules\Users\Http\Requests\RegisterFormRequest;
use Modules\Users\Services\UserRegistration;
use Yajra\Datatables\Datatables;
use Modules\Users\Repositories\UserInterface as Repository;

class UsersApiController extends BaseApiController {

    public function __construct(Repository $repository)
    {
        parent::__construct($repository);
    }

    public function register(RegisterFormRequest $request)
    {
        $data = $request->all();
        app(UserRegistration::class)->register($data);
        return response()->json('success', 200);
    }

}
