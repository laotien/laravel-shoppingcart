<?php

    return [
        'posts' => [
            'index'   => [
                ['name' => 'Posts', 'class' => 'active']
            ],
            'created' => [
                ['name' => 'Posts', 'url' => 'posts'],
                ['name' => 'Create', 'class' => 'active'],
            ],
            'edit'    => [
                ['name' => 'Posts', 'url' => 'posts'],
                ['name' => 'Edit', 'class' => 'active'],
            ],
        ],

        'category' => [
            'index'   => [
                ['name' => 'Categories', 'class' => 'active']
            ],
            'created' => [
                ['name' => 'Categories', 'url' => 'category'],
                ['name' => 'Create', 'class' => 'active'],
            ],
            'edit'    => [
                ['name' => 'Categories', 'url' => 'category'],
                ['name' => 'Edit', 'class' => 'active'],
            ]
        ],

        'tags' => [
            'index'   => [
                ['name' => 'Tags', 'class' => 'active']
            ],
            'created' => [
                ['name' => 'Tags', 'url' => 'posts'],
                ['name' => 'Create', 'class' => 'active'],
            ],
            'edit'    => [
                ['name' => 'Tags', 'url' => 'posts.edit'],
                ['name' => 'Edit', 'class' => 'active'],
            ],
        ],

    ];
