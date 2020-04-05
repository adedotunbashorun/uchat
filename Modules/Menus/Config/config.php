<?php

return [
    'name' => 'Menus',
    'order' => [
        'id' => 'asc',
    ],
    'sidebar' => [
        'weight' => 2,
        'icon' => 'fa fa-file',
    ],
    'th' => ['name', 'slug', 'status'],
    'columns'=>[
        ['data'=>'name','name'=>'name'],
        ['data'=>'slug','name'=>'slug'],
        ['data'=>'status','name'=>'status'],
        ['data'=>'action','name'=>'action'],
    ],
    'form' => 'Menus\Forms\MenusForm',
    'link_form' => 'Menus\Forms\MenuLinksForm',

    'permissions' => [
        'menus' => [
            'index',
            'create',
            'store',
            'edit',
            'update',
            'destroy',
        ],
        'menus.menu_links' => [
            'index',
            'create',
            'store',
            'edit',
            'update',
            'destroy',
        ],
    ]
];
