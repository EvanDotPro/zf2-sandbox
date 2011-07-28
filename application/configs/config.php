<?php
$c = array();
$c['bootstrap_class'] = 'Application\Bootstrap';
$c['di']['instance']['alias']['index']       = 'Core\Controller\IndexController';
$c['di']['instance']['alias']['test']        = 'Core\Controller\TestController';
$c['di']['instance']['alias']['view']        = 'edp\View\View';
$c['di']['instance']['alias']['router']      = 'Zf2\Mvc\Router';
$c['di']['instance']['Zf2\Mvc\Router']['methods']['addRoutes']['routes']['home']['class'] = 'Zf2\Mvc\Route\StaticRoute';
$c['di']['instance']['Zf2\Mvc\Router']['methods']['addRoutes']['routes']['home']['params']['path'] = '/';
$c['di']['instance']['Zf2\Mvc\Router']['methods']['addRoutes']['routes']['home']['params']['params']['controller'] = 'index';
$c['di']['instance']['Zf2\Mvc\Router']['methods']['addRoutes']['routes']['home']['params']['param']['action'] = 'index';
$c['di']['instance']['Zf2\Mvc\Router']['methods']['addRoutes']['routes']['default']['params']['regex'] = '#^/(?P<controller>[^/]+)(/(?P<action>[^/]+))?#';
$c['di']['instance']['Zf2\Mvc\Router']['methods']['addRoutes']['routes']['default']['params']['spec'] = '/{controller}/{action}';
$c['di']['instance']['preferences']['Zend\View\Renderer'] = 'edp\View\PhpRenderer';
$c['di']['instance']['edp\View\PhpRenderer']['methods']['setResolver']['resolver'] = 'Zend\View\TemplatePathStack';
$c['di']['instance']['edp\View\PhpRenderer']['methods']['setResolver']['options']['script_paths'][] = APPLICATION_PATH . '/layouts/scripts';
$c['di']['instance']['edp\View\PhpRenderer']['methods']['setResolver']['options']['script_paths'][] = APPLICATION_PATH . '/views/scripts';

// @TODO: Dynamic loop or require user to explicitly add module's configs
require_once(MODULES_PATH . '/core.auth/application/configs/config.php'); // comment this line to "toggle" the module on and off

return $c;
