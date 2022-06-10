<?php

require dirname(__DIR__, 2) . '/environment-example.php';
require dirname(__DIR__, 2) . '/src/helpers/Category.php';


$categories = new Category();

$items = [
            [
                'id' => 2,
                'parent_id' => NULL,
                'name' => "roundneck",
                'description' => "description",
                'created_at' => '2022-04-29 07:40:25',
                'updated_at' => '2022-05-13 01:26:03',
                
            ],
            [
                 'id' => 3,
                 'parent_id' => NULL,
                 'name' => "vneck",
                 'description' => "This description is for the dress category",
                 'created_at' => '2022-04-29 07:40:25',
                 'updated_at' => '2022-04-29 07:40:25',
                
            ],
             [
                'id' => 4,
                'parent_id' => NULL,
                'name' => "shorts",
                'description' => "This description is for the skirt category",
                'created_at' => '2022-04-29 07:40:25',
                'updated_at' => '2022-04-29 07:40:25',
                
            ],
             [
                'id' => 5,
                'parent_id' => NULL,
                'name' => "pants",
                'description' => "This description is for the tops category",
                'created_at' => '2022-04-29 07:40:25',
                'updated_at' => '2022-04-29 07:40:25',
                
            ],
    ];

$categories = new Category();
$item = $categories->batchUpdate($items);

print_r($item);