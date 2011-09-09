<?php

namespace Application;

use Zend\Config\Config,
    Zend\Loader\AutoloaderFactory,
    Zend\EventManager\StaticEventManager;

class Module
{
    public static function getConfig()
    {
        return new Config(include __DIR__ . '/configs/config.php');
    }

    public function init()
    {
        $this->initAutoloader();
        $events = StaticEventManager::getInstance();
        $events->attach('Zf2Module\ModuleCollection', 'init.post', function($e) {
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
