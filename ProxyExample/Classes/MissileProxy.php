<?php

namespace PhpPatterns\ProxyExample\Classes;

use PhpPatterns\ProxyExample\Classes\Missile;
use PhpPatterns\ProxyExample\Interfaces\MissileInterface;

class MissileProxy implements MissileInterface {

    /**
     * @var Missile[]
     */
    protected $_missiles = [];

    public function launch() {

        $missileId = count($this->_missiles);
        $this->_missiles[] = new Missile($missileId);

        $this->_loadWithFuel($missileId);

        $this->_missiles[$missileId]->launch();
    }

    private function _loadWithFuel(int $missileId)
    {
        if (!empty($this->_missiles[$missileId]))
        {
            $this->_missiles[$missileId]->isLoadedWithFuel = true;
            echo sprintf('Missile %s has been loaded with fuel.<br>', $missileId);
        }
    }
}