<?php
return [
    'model' => \App\Models\Post::class,
    'fields' => [
        [
            'name' => 'id',
            'title' => 'id',
            'visible' => false
        ],
        [
            'name' => 'title',
            'title' => 'عنوان',
            'sortfield' => 'title'
        ],
        [
            'name' => 'created_at',
            'title' => 'تاريخ',
            'callback' => 'date',
            'sortfield' => 'created_at'
        ]
    ]
];
