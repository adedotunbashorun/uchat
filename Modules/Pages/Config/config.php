<?php

return [
	'name' => 'Pages',
	'order' => [
		'id' => 'asc',
	],
	'sidebar' => [
		'weight' => 2,
	],
	'th' => ['title','parent','uri','status'],
	'form'=>'Pages\Forms\PageForm',
    'columns'=>[
        ['data'=>'title','name'=>'pages.title'],
        ['data'=>'parent_title','name'=>'parent_page.title'],
        ['data'=>'uri','name'=>'pages.uri'],
        ['data'=>'status','name'=>'pages.status'],
        ['data'=>'action','name'=>'action', 'orderable' => false, 'searchable' => false],
    ],
	'permissions'=>[
		'pages' => [
			'index',
			'create',
			'store',
			'edit',
			'update',
			'destroy',
		],
	]
];