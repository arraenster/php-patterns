<?php

namespace PhpPatterns\FlyweightExample\Interfaces;

use PhpPatterns\FlyweightExample\Classes\WebHostShared;

interface SharedHostRegistryInterface {

    /**
     * @param string $_name
     *
     * @return WebHostShared
     */
    public function getNewSharedHost($_name) : WebHostShared;
}