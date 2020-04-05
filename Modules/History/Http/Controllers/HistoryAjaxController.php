<?php namespace Modules\History\Http\Controllers;

use Modules\Core\Http\Controllers\BaseAjaxController;
use Modules\History\Http\Requests\FormRequest;
use Modules\History\Repositories\HistoryInterface as Repository;

class HistoryAjaxController extends BaseAjaxController {

    public function __construct(Repository $repository)
    {
        parent::__construct($repository);
    }

}
