<?php namespace Modules\History\Http\Controllers;

use Modules\Core\Http\Controllers\BaseAdminController;
use Modules\History\Http\Requests\FormRequest;
use Modules\History\Repositories\HistoryInterface as Repository;

class HistoryController extends BaseAdminController {

    public function __construct(Repository $repository)
    {
        parent::__construct($repository);
    }

    public function index()
    {
        $module = $this->repository->getTable();
        //$module = str_replace('_','',$module);
        $title = trans($module . '::global.group_name');
        $models = $this->repository->latest(100, ['historable', 'user'], true);
        return view('history::admin.index')
            ->with(compact('title', 'module','models'));
    }

}
