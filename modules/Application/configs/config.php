<?php
$c = array();
$c['bootstrap_class'] = 'Application\Bootstrap';
$c['di']['instance']['alias']['controller_application_index'] = 'Application\Controller\IndexController';
$c['di']['instance']['Zf2Mvc\Router\SimpleRouteStack']['methods']['addRoutes']['routes']['index']['type'] = 'Zf2Mvc\Router\Http\Literal';
$c['di']['instance']['Zf2Mvc\Router\SimpleRouteStack']['methods']['addRoutes']['routes']['index']['options']['route'] = '/';
$c['di']['instance']['Zf2Mvc\Router\SimpleRouteStack']['methods']['addRoutes']['routes']['index']['options']['defaults']['controller'] = 'controller_application_index';

// Config the HelloWorld module
//include MODULES_PATH . '/HelloWorld/configs/config.php';

if (file_exists(__DIR__ . '/config.' . APPLICATION_ENV . '.php')) {
    include __DIR__ . '/config.' . APPLICATION_ENV . '.php';
}

return $c;

