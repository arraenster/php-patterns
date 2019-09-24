<?php

use PhpPatterns\FlyweightExample\Classes\SharedHostRegistry;
use \PhpPatterns\FlyweightExample\Classes\WebHost;

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);

spl_autoload_register(function($className) {

    $className = str_replace('\\', DIRECTORY_SEPARATOR, $className);
    $className = str_replace('PhpPatterns', 'php-patterns', $className);
    include_once $_SERVER['DOCUMENT_ROOT'] . '/' . $className . '.php';

});

echo 'Flyweight example<br>';


$sharedFactory = new SharedHostRegistry();

$fly1 = new WebHost($sharedFactory, 'web10', '10.0.1.10', 4, 100);
print_r($fly1->getMountedFiles());
echo '<hr>';

$fly2 = new WebHost($sharedFactory, 'web21', '10.0.1.15', 4, 100);
print_r($fly2->getMountedFiles());
echo '<hr>';

$fly3 = new WebHost($sharedFactory, 'web25', '10.0.1.145', 5, 120);
print_r($fly3->getMountedFiles());
echo '<br>';
