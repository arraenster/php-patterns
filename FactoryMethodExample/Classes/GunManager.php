<?php

namespace PhpPatterns\FactoryMethodExample\Classes;

use PhpPatterns\FactoryMethodExample\Interfaces\ProjectileInterface;

class GunManager extends AbstractProjectileManager {

	/**
	 * @return ProjectileInterface
	 */
	public function getGun(): ProjectileInterface
	{
		return new Gun('152mm howitzer');
	}
}