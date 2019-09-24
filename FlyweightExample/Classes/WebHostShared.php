<?php

namespace PhpPatterns\FlyweightExample\Classes;

class WebHostShared {

    /**
     * @var string
     */
    protected $_alias;

    /**
     * @var array
     */
    protected $_mountedFiles = [];

    function __construct(
        $_alias = ''
    ) {

        echo 'Create new WebHostShared host with alias ' . $_alias . '<br>';

        $this->_alias = $_alias;

        switch($_alias)
        {
            case 'fileserver':
                $this->_mountedFiles = $this->_loadFiles();
            break;
            case 'imagestorage':
                $this->_mountedFiles = $this->_loadImages();
            break;
            default:
                echo 'Wrong type for WebHostShared.' . PHP_EOL;
            break;


        }
    }

    /**
     * @return string
     */
    public function getAlias()
    {
        return $this->_alias;
    }

    /**
     * @return array
     */
    public function getFiles() : array
    {
        return $this->_mountedFiles;
    }

    /**
     * @return array
     */
    private function _loadFiles() : array
    {
        return
            [
                '../1.php',
                '../2.php',
                '../3.php',
                '../4.php',
                '../classes/5.php',
            ];
    }

    /**
     * @return array
     */
    private function _loadImages() : array
    {
        return
            [
                'skjfhksdfjhkjH$KHJ$Kjhskadjfhksdjhfksjdhf',
                'sadsfspdfklgj346tp09u0sdgfjlsdkfjsdfssSWD',
                'asdasd86SFFsd9(ASDASDAdads$$$asdfasdfsdsf'
            ];
    }
}