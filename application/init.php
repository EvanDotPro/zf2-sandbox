<?php
// Define path to application directory
defined('APPLICATION_PATH')
	|| define('APPLICATION_PATH',
			realpath(dirname(__FILE__) . '/../application'));

// Define path to library directory
defined('LIBRARY_PATH')
	|| define('LIBRARY_PATH',
	        realpath(dirname(__FILE__) . '/../library'));

// Define path to Zend Framework directory
defined('ZF_PATH')
	|| define('ZF_PATH',
	        realpath(LIBRARY_PATH . '/ZendFramework2/library'));

// Ensure ZF/library is on include_path
set_include_path(implode(PATH_SEPARATOR, array(ZF_PATH, LIBRARY_PATH, get_include_path())));

// Init config
require_once 'Zend/Config/Config.php';
$config = new Zend\Config\Config(include APPLICATION_PATH . '/configs/config.php');

// Init autoloader
require_once 'Zend/Loader/AutoloaderFactory.php';
Zend\Loader\AutoloaderFactory::factory($config->autoload);

if (is_array($config->phpSettings)) {
    foreach ($config->phpSettings as $key => $value) {
        ini_set($key, $value);
    }
}

// Create application, bootstrap, and run
$app       = new Zf2Mvc\Application();
$bootstrap = new $config->bootstrap_class($config);
$bootstrap->bootstrap($app);
$response = $app->run();
$response->send();
