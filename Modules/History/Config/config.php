<?php

return [
	'name' => 'History',
	'order' => [
		'created_at' => 'desc',
	],
	'sidebar' => [
		'weight' => 2,
		'icon' => 'fa fa-file',
	],
	'th' => ['name'],
	'form'=>'History\Forms\HistoryForm',
    'permissions'=>[
        'history' => [
            'index'
        ],
    ]

];
