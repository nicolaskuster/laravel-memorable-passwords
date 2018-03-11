<?php

return [

    /**
     * Number of words the password should have
     */
    'number_of_parts'=> 2,

    /**
     * Number of capital letters that should have the password
     */
    'number_of_uppercase_letters'=> 2,

    /**
     * Number of numbers the password should have
     */
    'number_of_numbers'=>2,

    /**
     * List of all available words
     */
    'words' => [
        'salz',
        'pfeffer',
        'hund',
        'katze',
        'milch',
        'rahm',
        'honig',
        'fenchel',
        'auto',
        'motorrad',
        'basilikum',
        'glas',
        'wasser',
        'bier',
        'wein',
    ],

    /**
     * List of all available word separators
     */
    'delimiters' => [
        '-',
        '.',
        '_',
    ]
];
