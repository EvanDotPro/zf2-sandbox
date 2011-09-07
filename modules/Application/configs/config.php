<?php
$c = array();
$c['autoload']['Zend\Loader\StandardAutoloader']['namespaces']['Zf2Mvc']         = LIBRARY_PATH . '/ZendFramework2/modules/Zf2Mvc/src/Zf2Mvc';
$c['autoload']['Zend\Loader\StandardAutoloader']['namespaces']['Application']    = MODULES_PATH . '/Application/src/Application';
$c['bootstrap_class'] = 'Application\Bootstrap';
$c['di']['instance']['alias']['controller_application_index'] = 'Application\Controller\IndexController';
$c['di']['instance']['Zf2Mvc\Router\SimpleRouteStack']['methods']['addRoutes']['routes']['index']['type'] = 'Zf2Mvc\Router\Http\Literal';
$c['di']['instance']['Zf2Mvc\Router\SimpleRouteStack']['methods']['addRoutes']['routes']['index']['options']['route'] = '/';
$c['di']['instance']['Zf2Mvc\Router\SimpleRouteStack']['methods']['addRoutes']['routes']['index']['options']['defaults']['controller'] = 'controller_application_index';

// Config the HelloWorld module
include MODULES_PATH . '/HelloWorld/configs/config.php';

if (file_exists(__DIR__ . '/config.' . APPLICATION_ENV . '.php')) {
    include __DIR__ . '/config.' . APPLICATION_ENV . '.php';
}

return $c;

