<?php

namespace PhpPatterns\FlyweightExample\Classes;

use PhpPatterns\FlyweightExample\Classes\WebHostShared;
use PhpPatterns\FlyweightExample\Interfaces\SharedHostRegistryInterface;

class SharedHostRegistry implements SharedHostRegistryInterface{

    const HOSTS =
    [
        'web10' => 'fileserver',
        'web21' => 'imagestorage',
        'web25' => 'fileserver'
    ];

    /**
     * @var array
     */
    protected $_hosts = [];

    /**
     * @param string $_name
     *
     * @return WebHostShared
     */
    public function getNewSharedHost($_name) : WebHostShared
    {
        if (empty($this->_hosts[self::HOSTS[$_name]]))
        {
            $this->_hosts[self::HOSTS[$_name]] = new WebHostShared(self::HOSTS[$_name]);
        }

        echo 'Get shared host with alias [' . $this->_hosts[self::HOSTS[$_name]]->getAlias() . ']<br>';

        return $this->_hosts[self::HOSTS[$_name]];
    }

}