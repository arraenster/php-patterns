<?php
namespace PhpPatterns\FactoryMethodExample;

use PhpPatterns\FactoryMethodExample\Classes\GunManager;
use PhpPatterns\FactoryMethodExample\Classes\MissileManager;

/**
 *  PHP design pattern Factory Method. Simple example of using pattern.
 *  Actual method is `fireProjectile()` which is not depend on actual projectile realisation
 */

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);

spl_autoload_register(function($className) {

	$className = str_replace('\\', DIRECTORY_SEPARATOR, $className);
	$className = str_replace('PhpPatterns', 'php-patterns', $className);
	include_once $_SERVER['DOCUMENT_ROOT'] . '/' . $className . '.php';

});

/*require 'classes/AbstractProjectileManager.php';
require 'classes/GunManager.php';
require 'classes/MissileManager.php';
require 'classes/Missile.php';
require 'classes/Gun.php';*/

echo 'Hello...' . '<br>';

$projectileManager = new GunManager();
$gun = $projectileManager->getGun();
$projectileManager->fireProjectile($gun);

echo '<br>';

$projectileManager = new MissileManager();
$gun = $projectileManager->getGun();
$projectileManager->fireProjectile($gun);