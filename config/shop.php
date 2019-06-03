<?php

return [
    
    'index' => [
        'products' => 9
    ],

    'image' => [
        'storage' => 'storage/',
        'default' => 'img/no-image.png',
        'categories' => 'img/categories/',
        'products' => 'img/products/'
    ],

    'categories' => [
        'perPage' => 3
    ],
    
    'products' => [
        'perPage' => 9
    ],
    
    'cart' => [
        'maxOfItem' => 10,
        'maxOfItems' => 10
    ],
    
    'user' => [
        'minUsernameLength' => 4,
        'maxUsernameLength' => 25,
        'minPasswordLength' => 4,
        'maxPasswordLength' => 100
    ]


];
