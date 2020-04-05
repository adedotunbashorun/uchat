<?php

return [
	'name' => 'Banners',
	'order' => [
		'id' => 'asc',
	],
	'sidebar' => [
		'weight' => 2,
		'icon' => 'fa fa-file-image',
	],
	'th' => ['caption','status'],
	'columns'=>[
            ['data'=>'caption','name'=>'caption'],
            ['data'=>'status','name'=>'status'],
            ['data'=>'action','name'=>'action'],
     ],
	'form'=>'Banners\Forms\BannersForm',
	'permissions'=>[
		'banners' => [
			'index',
			'create',
			'store',
			'edit',
			'update',
			'destroy',
		],
	]
];
