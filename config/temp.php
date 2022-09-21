<?php
    return [
        'url'      => [
            'prefix_admin'    => 'admin123',
            'prefix_frontend' => '',
        ],
        // Format date
        'format'   => [
            'long_time'  => 'H:m:s d/m/Y',
            'short_time' => 'd/m/Y',
        ],

        // Config Template
        'config'   => [
            'button' => [
                'category' => ['edit'],
            ],
        ],

        // Template
        'template' => [
            'status' => [
                'all'      => ['name' => 'All', 'class' => 'btn-success'],
                'active'   => ['name' => 'Active', 'class' => 'btn-success'],
                'inactive' => ['name' => 'Inactive', 'class' => 'btn-info'],
                'published'  => ['name' => 'Published', 'class' => 'badge badge-soft-success text-uppercase'],
                'draft'    => ['name' => 'Draft', 'class' => 'badge badge-soft-warning text-uppercase'],
                'block'    => ['name' => 'Block', 'class' => 'btn-danger'],
                'default'  => ['name' => 'Default', 'class' => 'btn-success'],
            ],

            'button' => [
                'edit'   => ['class' => 'text-primary d-inline-block edit-item-btn', 'title' => 'Edit', 'icon' => 'ri-pencil-fill fs-16', 'route-name' => '.form'],
                'delete' => ['class' => 'text-danger d-inline-block remove-item-btn', 'title' => 'Delete', 'icon' => 'ri-delete-bin-5-fill fs-16', 'route-name' => '.delete'],
            ]
        ],
    ];
