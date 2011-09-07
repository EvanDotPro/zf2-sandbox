<?php
namespace HelloWorldDep;
use Zend\Config\Config;
class Information
    // implements Some\Information\Interface
{
    public static function getConfig()
    {
        return new Config(include __DIR__ . '/configs/config.php');
    }
}
