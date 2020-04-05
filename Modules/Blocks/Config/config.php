<?php

return [
	'name' => 'Blocks',
	'order' => [
		'id' => 'asc',
	],
	'sidebar' => [
		'weight' => 2,
		'icon' => 'fa fa-file',
	],
	'th' => ['title','slug','status'],
	'columns'=>[
            ['data'=>'title','name'=>'title'],
            ['data'=>'slug','name'=>'slug'],
            ['data'=>'status','name'=>'status'],
            ['data'=>'action','name'=>'action'],
     ],
	'form'=>'Blocks\Forms\BlocksForm',
	'permissions'=>[
		'blocks' => [
			'index',
			'create',
			'store',
			'edit',
			'update',
			'destroy',
		],
	]
];
