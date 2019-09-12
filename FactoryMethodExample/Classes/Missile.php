<?php

namespace PhpPatterns\FactoryMethodExample\Classes;

use PhpPatterns\FactoryMethodExample\Interfaces\ProjectileInterface;

class Missile implements ProjectileInterface {

	/**
	 * @var string
	 */
	protected $_name = '';

	/**
	 * Gun constructor.
	 *
	 * @param string $name
	 */
	function __construct(string $name) {

		$this->_name = $name;
	}

	public function findTarget() {

		$this->fillMissileWithFuel();

		echo sprintf('Missile [%s] is looking for target...', $this->_name) . '<br>';
	}

	public function load() {
		echo sprintf('Missile [%s] is loading...', $this->_name) . '<br>';
	}

	public function fire() {
		echo sprintf('Missile [%s] is firing!!!', $this->_name) . '<br>';
	}

	private function fillMissileWithFuel()
	{
		echo sprintf('Missile [%s] is filling with fuel', $this->_name) . '<br>';
	}
}