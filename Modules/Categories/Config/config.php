<?php

return [
	'name' => 'Categories',
	'order' => [
		'id' => 'asc',
	],
	'sidebar' => [
		'weight' => 2,
		'icon' => 'fa fa-file',
	],
	'th' => ['title','amount','status'],
	'columns'=>[
			['data'=>'title','name'=>'title'],
			['data'=>'amount','name'=>'amount'],
            ['data'=>'status','name'=>'status'],
            ['data'=>'action','name'=>'action'],
     ],
	'form'=>'Categories\Forms\CategoriesForm',
	'permissions'=>[
		'categories' => [
			'index',
			'create',
			'store',
			'edit',
			'update',
			'destroy',
		],
	]
];
