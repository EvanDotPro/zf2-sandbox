<?php
namespace edp;
// @TODO: Figure out a more flexible solution to this.
class ModuleLoader
{
    public static $loaded = array(); 

    public static function config(&$c, $module)
    {
        if (!isset(self::$loaded[$module])) {
            $cFile = MODULES_PATH . '/' . $module . '/application/configs/config.php';
            if (file_exists($cFile)) {
                self::$loaded[$module] = true;
                require_once $cFile;
            } else {
                self::$loaded[$module] = false;
            }
        }
    }
}
