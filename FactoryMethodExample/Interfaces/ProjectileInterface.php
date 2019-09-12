<?php

namespace PhpPatterns\FactoryMethodExample\Interfaces;

interface ProjectileInterface {

	public function findTarget();

	public function load();

	public function fire();
}