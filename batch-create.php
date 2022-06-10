<?php

require dirname(__DIR__, 2) . '/environment-example.php';
require dirname(__DIR__, 2) . '/src/helpers/Category.php';


$categories = new Category();

$items = [
            [
                'parent_id' => NULL,
                'name' => "Bottoms",
                'description' => "description",
                'image' => NULL,
                'created_at' => '2022-04-29 07:40:25',
                'updated_at' => '2022-04-29 07:40:25',
                'deleted_at' => NULL,
                
            ],
            [
                'parent_id' => NULL,
                'name' => "Jacket",
                'description' => "description",
                'image' => NULL,
                'created_at' => '2022-04-29 07:40:25',
                'updated_at' => '2022-04-29 07:40:25',
                'deleted_at' => NULL,
            ],
    ];

$item = $categories->batchCreate($items);

print_r($item);
