<?php

namespace PhpPatterns\FactoryMethodExample\Classes;

use PhpPatterns\FactoryMethodExample\Interfaces\ProjectileInterface;

abstract class AbstractProjectileManager {

	abstract public function getGun(): ProjectileInterface;

	/**
	 * @param ProjectileInterface $projectile
	 */
	public function fireProjectile(ProjectileInterface $projectile)
	{
		$projectile->findTarget();
		$projectile->load();
		$projectile->fire();
	}
}