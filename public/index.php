<?php
// Define application environment
defined('APPLICATION_ENV')
    || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'production'));

// Ensure library/ is on include_path
set_include_path(implode(PATH_SEPARATOR, array(
    realpath(__DIR__ . '/../library'),
    realpath(__DIR__ . '/../library/ZendFramework2/library'), // just for git submodule
    get_include_path(),
)));

require_once 'Zend/Loader/AutoloaderFactory.php';
Zend\Loader\AutoloaderFactory::factory(array(
    'Zend\Loader\ClassMapAutoloader' => array(
        __DIR__ . '/../library/ZendFramework2/modules/Zf2Module/classmap.php',
    ),
    'Zend\Loader\StandardAutoloader' => array(),
));
// Init config
$appConfig = include __DIR__ . '/../configs/application.config.php';

/**
 * Long-hand:
 * $modules = new Zf2Module\ModuleCollection;
 * $modules->getLoader()->registerPaths($appConfig->modulePaths->toArray());
 * $modules->loadModules($appConfig->modules->toArray());
 */
$modules = Zf2Module\ModuleCollection::fromConfig($appConfig);

// Get the merged config object
$config = $modules->getMergedConfig();

// Create application, bootstrap, and run
$bootstrap = new $config->bootstrap_class($config);
$application = new Zf2Mvc\Application;
$bootstrap->bootstrap($application);
$application->run()->send();
