<?php namespace Modules\Interests\Http\Controllers;

use Modules\Core\Http\Controllers\BaseApiController;
use Modules\Interests\Repositories\InterestInterface as Repository;

class InterestAjaxController extends BaseApiController {

    public function __construct(Repository $repository)
    {
        parent::__construct($repository);
    }

    public function getInterest()
    {
        //dd(request('query'));
        $query = request('query');
        $array = $this->repository->getAllBySearchQuery($query, 'name',false);
        // if(empty($array)){
        //     $array = [
        //         [
        //             'data' => $query,
        //             'value' => $query,
        //         ]
        //     ];
        // }
        return response()->json($array, 200);
    }

}
