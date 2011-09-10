<?php

namespace Sample;

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
    }

    protected function initAutoloader()
    {
        AutoloaderFactory::factory(array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    'Sample' => __DIR__ . '/src/Sample',
                ),
            ),
        ));
    }
}
