<?php

namespace PhpPatterns\ProxyExample\Classes;

use PhpPatterns\ProxyExample\Interfaces\MissileInterface;

class Missile implements MissileInterface {

    /**
     * @var bool
     */
    public $isLoadedWithFuel = false;

    /**
     * @var string
     */
    protected $_name;

    public function __construct($_name) {
        $this->_name = 'missile_' . $_name;
    }

    public function launch() {
        echo sprintf('Missile %s has been launched!<br>', $this->_name);
    }

}