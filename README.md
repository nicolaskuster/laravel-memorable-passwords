# Generate memorable passwords in a Laravel app
Generates noticeable passwords from a list of available words separated by a delimiter.

In the config file you will find some options:

* number_of_parts: Number of words the password should have
* number_of_uppercase_letters: Number of capital letters that should have the password
* number_of_numbers: Number of numbers the password should have
* words: List of all available words
* delimiters: List of all available word separators

## Installation
You can install the package via composer:
```bash
composer require nicolaskuster/laravel-memorable-passwords
```

You can publish the config-file with:
```bash
php artisan vendor:publish --provider="Nicolaskuster\MemorablePasswords\Providers\MemorablePasswordServiceProvider"
```     

## Usage examples
Code:
```php
for ($i = 0; $i < 10; $i++) {
    \Nicolaskuster\MemorablePasswords\MemorablePassword::generate();
}
```
config:
```php
return [
    'number_of_parts'=> 2,
    'number_of_uppercase_letters'=> 2,
    'number_of_numbers'=>2,
    'words' => [
        //...
    ],
    'delimiters' => [
        '-',
        '.',
        '_',
    ]
]
```
output:
```
Milch9-salZ1
raHm9_fencheL4
honiG2-wAsser3
Pfeffer1.huNd5
milCh3-fEnchel7
hUnd5_gLas1
Pfeffer7_rahM6
pfEffer3-aUto4
Wein4_huNd2
pfEffer4-glAs5
```

## Testing
You can run all the tests with:
```bash
composer test
```