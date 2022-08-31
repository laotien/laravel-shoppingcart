<?php
   return [
       'url' => [
           'prefix_admin'    => 'admin123',
           'prefix_frontend' => '',
       ],

       // Template
       'template' => [
           'status'       => [
               'all'      => ['name' => 'All', 'class' => 'btn-success'],
               'active'   => ['name' => 'Active', 'class' => 'btn-success'],
               'inactive' => ['name' => 'Inactive', 'class' => 'btn-info'],
               'published' => ['name' => 'Published', 'class' => 'btn-success'],
               'draft'     => ['name' => 'Draft', 'class' => 'btn-success'],
               'block'     => ['name' => 'Block', 'class' => 'btn-danger'],
               'default'   => ['name' => 'Default', 'class' => 'btn-success'],
           ],
       ],
   ];
