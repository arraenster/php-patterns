<?php

namespace PhpPatterns\FlyweightExample\Classes;

use PhpPatterns\FlyweightExample\Classes\WebHostShared;
use PhpPatterns\FlyweightExample\Interfaces\SharedHostRegistryInterface;

class WebHost {

    /**
     * @var string
     */
    protected $_alias;

    /**
     * @var string
     */
    protected $_ip;

    /**
     * @var int
     */
    protected $_cpuCount;

    /**
     * @var int
     */
    protected $_storageSize;

    /**
     * @var WebHostShared
     */
    protected $_sharedWebHost;

    function __construct(
        SharedHostRegistryInterface $_sharedRegistry,
        $_alias = '',
        $_ip = '127.0.0.1',
        $_cpuCount = 0,
        $_storageSize = 0
    ) {

        echo 'Create new host with alias ' . $_alias . '<br>';

        $this->_alias = $_alias;
        $this->_ip = $_ip;
        $this->_cpuCount = $_cpuCount;
        $this->_storageSize = $_storageSize;

        $this->_sharedWebHost = $_sharedRegistry->getNewSharedHost($this->_alias);
    }

    /**
     * @return array
     */
    public function getMountedFiles() : array
    {
        return $this->_sharedWebHost->getFiles();
    }
}