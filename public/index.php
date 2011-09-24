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
    'Zend\Loader\ClassMapAutoloader' => array(__DIR__ . '/../library/ZendFramework2/modules/ZendModule/autoload_classmap.php'), // will not be needed later
    'Zend\Loader\StandardAutoloader' => array(),
));

$appConfig = include __DIR__ . '/../configs/application.config.php';

$moduleLoader = new Zend\Loader\ModuleAutoloader($appConfig->module_paths);
$moduleLoader->register();

$moduleManager = new Zend\Module\Manager(
    $appConfig->modules,
    new Zend\Module\ManagerOptions($appConfig->module_config)
);

// Get the merged config object
$config = $moduleManager->getMergedConfig();

// Create application, bootstrap, and run
$bootstrap = new $config->bootstrap_class($config);
$application = new Zend\Mvc\Application;
$bootstrap->bootstrap($application);
$application->run()->send();
