<?php

namespace PhpPatterns\FactoryMethodExample\Classes;

use PhpPatterns\FactoryMethodExample\Interfaces\ProjectileInterface;

class MissileManager extends AbstractProjectileManager {

	/**
	 * @return ProjectileInterface
	 */
	public function getGun(): ProjectileInterface
	{
		return new Missile('Ballistic missile');
	}
}