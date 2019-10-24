<?php

use PhpPatterns\ProxyExample\Classes\Missile;
use PhpPatterns\ProxyExample\Classes\MissileProxy;
use PhpPatterns\ProxyExample\Interfaces\MissileInterface;

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);

spl_autoload_register(function($className) {

    $className = str_replace('\\', DIRECTORY_SEPARATOR, $className);
    $className = str_replace('PhpPatterns', 'php-patterns', $className);
    include_once $_SERVER['DOCUMENT_ROOT'] . '/' . $className . '.php';

});

echo 'Proxy example<br>';

function killSomeone(MissileInterface $missile)
{
    $missile->launch();
}

$missile = new Missile('test');
killSomeone($missile);

$missileProxy = new MissileProxy();
killSomeone($missileProxy);