<?php namespace Modules\Pages\Http\Controllers;


use Modules\Core\Http\Controllers\BaseAjaxController;
use Modules\Pages\Repositories\PageInterface as Repository;
use Yajra\Datatables\Datatables;

class PagesAjaxController extends BaseAjaxController {

	public function __construct(Repository $repository)
	{
		parent::__construct($repository);
	}

	public function index()
	{
		$model = $this->repository->getForDatatable();

		$model_table = 'pages';

		return Datatables::of($model)
			->editColumn('parent_title', function($row) {
				if(!$row->parent_title) {
					return 'n/a';
				} else{
					return $row->parent_title;
				}

			})
			->editColumn('status', function($row) {
				$html = '';
				$html .= status_label($row->status);

				return $html;
			})
            ->addColumn('action',$model_table.'::admin._table-action')
            ->escapeColumns(['action'])
			->removeColumn('page_id')
			->make(true);
	}

}