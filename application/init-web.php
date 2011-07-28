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

// Define application environment
defined('APPLICATION_ENV')
	|| define('APPLICATION_ENV',
			(getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV')
											: 'production'));

// Ensure ZF/library is on include_path
set_include_path(implode(PATH_SEPARATOR, array(ZF_PATH, LIBRARY_PATH, get_include_path())));

// Init autoloader
require_once 'Zend/Loader/AutoloaderFactory.php';
Zend\Loader\AutoloaderFactory::factory(array(
    'Zend\Loader\ClassMapAutoloader' => array(
        APPLICATION_PATH . '/.classmap.php',
    ),
    'Zend\Loader\StandardAutoloader' => array(
        'namespaces' => array(
            'Zf2'         => LIBRARY_PATH . '/Zf2',
        ),
    ),
));

// Configuration
$config = new Zend\Config\Config(include APPLICATION_PATH . '/configs/config.php');
if (is_array($config->phpSettings)) {
    foreach ($config->phpSettings as $key => $value) {
        ini_set($key, $value);
    }
}

// Create application, bootstrap, and run
$bootstrap = new $config->bootstrap_class($config);
$bootstrap->execute();

$front   = new Zf2\Mvc\FrontController($bootstrap->getContainer());
$front->dispatch(new Zf2\Http\Request())->send();
