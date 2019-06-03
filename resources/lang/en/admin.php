<?php

return [
    'title' => 'Admin',

    'button' => [
        'back' => 'Go back',
        'edit' => 'Edit',
        'delete' => 'Delete',
        'update' => 'Update',
        'create' => 'Create'
    ],
    
    'categories' => [
        'title' => 'Categories',
        '404' => 'Category not found',
        
        'category' => [
            'name' => 'Name',
            'created' => 'Created',
            'updated' => 'Updated',
            'products' => 'Products',
        ],
        
        'input' => [
            'name' => 'Category name',
            'image' => 'Category image',
        ],
        
        'create' => [
            'title' => 'New category',
            'duplicate' => 'Category with this name already exist',
            'success' => 'Category has been created',
        ],
        
        'edit' => [
            'title' => 'Edit category',
            'success' => 'Category has been updated',
        ],
        
        'destroy' => [
            'not_empty' => 'Category has associated products',
            'success' => 'Category has been deleted',
        ],
    ],
    
    
    'products' => [
        'title' => 'Products',
        '404' => 'Product not found',
        
        'create' => [
            'title' => 'Add product',
        ],
    ],
    
    
    'users' => [
        'title' => 'Users',
        '404' => 'User not found',
        
        'user' => [
            'name' => 'Name',
            'email' => 'Email',
            'registered' => 'Registered at'
        ],
        
        'input' => [
            'name' => 'Name',
            'email' => 'Email',
            'password' => 'Password',
            'password_confirm' => 'Confirm password',
        ],
        
        'create' => [
            'title' => 'Create new user',
            'duplicate' => 'User with this email already exist',
            'success' => 'User has been created',
        ],
        
        'edit' => [
            'title' => 'Edit user',
            'success' => 'User has been updated',
        ],
        
        'destroy' => [
            'success' => 'User has been deleted',
        ],
    ],
];