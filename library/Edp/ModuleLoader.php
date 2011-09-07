<?php
namespace Edp;
use Zend\Config\Config;
class ModuleLoader
{
    public static function config(Config $config)
    {
        foreach ($config->modules as $moduleName => $data) {
            require_once MODULES_PATH . '/' . $moduleName . '/Information.php';
            $className = $moduleName . '\Information';
            $config->merge($className::getConfig());
        }
        return $config;
    }
}
