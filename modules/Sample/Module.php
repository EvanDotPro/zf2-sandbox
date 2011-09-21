<?php

namespace Sample;

use Zend\Config\Config;

class Module
{
    public function init()
    {
        $this->initAutoloader();
    }

    protected function initAutoloader()
    {
        include __DIR__ . '/autoload_register.php';
    }

    public static function getConfig()
    {
        return new Config(include __DIR__ . '/configs/config.php');
    }
}
