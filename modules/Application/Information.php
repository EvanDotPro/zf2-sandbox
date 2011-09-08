<?php

namespace Application;

use Zend\Config\Config,
    Zend\Loader\AutoloaderFactory;

class Information
{
    public static function getConfig()
    {
        return new Config(include __DIR__ . '/configs/config.php');
    }

    public function init()
    {
        $this->initAutoloader();
    }

    protected function initAutoloader()
    {
        AutoloaderFactory::factory(array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/classmap.php',
            )
        ));
    }
}
