<?php
 
    $name = "Dark Matter";

    $books = [
        [
            'name' => 'Book One',
            'releaseYear' => 2004,
            'author' => 'Philip K. Dick',
            'purchaseUrl' => 'http://example.com/1'
        ],
        [
            'name' => 'Book Two',
            'releaseYear' => 2018,
            'author' => 'Philip K. Dick',
            'purchaseUrl' => 'http://example.com/2'
        ],
        [
            'name' => 'Book Three',
            'releaseYear' => 2022,
            'author' => 'Philip K. Dick',
            'purchaseUrl' => 'http://example.com/3'
        ]
    ];

    function filter($items, $fn) {

        $filteredItems = [];

        foreach ($items as $item) {

            if($fn($item)) {

                $filteredItems[] = $item;
            }
        }

        return $filteredItems;
    };

    $filteredBooks = array_filter($books, function($book) {
        return ($book['releaseYear'] >= 2018 && $book['releaseYear'] <= 2023);
    });

    require 'views/index.view.php';
