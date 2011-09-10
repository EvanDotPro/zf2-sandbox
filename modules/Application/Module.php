<?php

namespace Application;

use Zend\Config\Config,
    Zend\Loader\AutoloaderFactory;

class Module
{
    public static function getConfig()
    {
        return new Config(include __DIR__ . '/configs/config.php');
    }

    public function init($eventCollection)
    {
        $this->initAutoloader();
        $eventCollection->attach('init.post', function($e) {
            // This is ran after all modules' init() have ran
        });
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
