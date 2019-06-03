<?php

return [
    'title' => 'Administravimas',
    
    'button' => [
        'back' => 'Atgal',
        'edit' => 'Redaguoti',
        'delete' => 'Ištrinti',
        'update' => 'Update',
        'create' => 'Sukurti'
    ],
    
    'categories' => [
        'title' => 'Kategorijos',
        '404' => 'Kategorija nerasta',
        
        'category' => [
            'name' => 'Pavadinimas',
            'created' => 'Sukurta',
            'updated' => 'Atnaujinta',
            'products' => 'Pruduktai',
        ],
        
        'input' => [
            'name' => 'Kategorijos pavadinimas',
            'image' => 'Kategorijos paveikslelis',
        ],
        
        'create' => [
            'title' => 'Nauja kategorija',
            'duplicate' => 'Kategorija su tokiu pavadinimu jau egzistuoja',
            'success' => 'Kategorija sukurta',
        ],
        
        'edit' => [
            'title' => 'Redaguoti kategorija',
            'success' => 'Kategorija atnaujinta',
        ],
        
        'destroy' => [
            'not_empty' => 'Kategorija turi asocijuotu produktu',
            'success' => 'Kategorija ištrinta',
        ],
    ],
    
    
    'products' => [
        'title' => 'Produktai',
        '404' => 'Produktas nerastas',
        
        'create' => [
            'title' => 'Pridėti produktą',
        ],
    ],
    
    
    'users' => [
        'title' => 'Vartotojai',
        '404' => 'Vartotojas nerastas',
        
        'user' => [
            'name' => 'Vardas',
            'email' => 'Elektroninis paštas',
            'registered' => 'Užsiregistravo'
        ],
        
        'input' => [
            'name' => 'Vardas',
            'email' => 'Elektronis paštas',
            'password' => 'Slaptažodis',
            'password_confirm' => 'Pakartotinas slaptažodis',
        ],
        
        'create' => [
            'title' => 'Sukurti nauja vartotoją',
            'duplicate' => 'Varotojas su tokiu elektroniniu paštu jau egzistuoja',
            'success' => 'Vartotojas sukurtas',
        ],
        
        'edit' => [
            'title' => 'Redaguoti varotoja',
            'success' => 'Vartotojas atnaujintas',
        ],
        
        'destroy' => [
            'success' => 'Vartotojas ištrintas',
        ],
    ],
];