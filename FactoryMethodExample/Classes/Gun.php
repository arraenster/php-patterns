<?php

namespace PhpPatterns\FactoryMethodExample\Classes;

use PhpPatterns\FactoryMethodExample\Interfaces\ProjectileInterface;

class Gun implements ProjectileInterface {

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
		echo sprintf('Gun [%s] is looking for target...', $this->_name) . '<br>';
	}

	public function load() {
		echo sprintf('Gun [%s] is loading...', $this->_name) . '<br>';
	}

	public function fire() {
		echo sprintf('Gun [%s] is firing!!!', $this->_name) . '<br>';
	}

}