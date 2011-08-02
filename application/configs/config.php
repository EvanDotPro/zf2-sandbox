<?php
// There is no need to edit this file at all. Everything in here can be 
// overridden by modules.
$c = array();
$c['bootstrap_class'] = 'Application\Bootstrap';
$c['di']['instance']['alias']['view']        = 'edp\View\View';

$c['di']['instance']['alias']['router']      = 'Zf2\Mvc\Router';
$c['di']['instance']['preferences']['Zf2\Mvc\RouteStack'] = 'Zf2\Mvc\Router';

$c['di']['instance']['Zf2\Mvc\Router']['methods']['addRoutes']['routes']['home']['class'] = 'Zf2\Mvc\Route\StaticRoute';
$c['di']['instance']['Zf2\Mvc\Router']['methods']['addRoutes']['routes']['home']['params']['path'] = '/';
$c['di']['instance']['Zf2\Mvc\Router']['methods']['addRoutes']['routes']['home']['params']['params']['controller'] = 'index';
$c['di']['instance']['Zf2\Mvc\Router']['methods']['addRoutes']['routes']['home']['params']['param']['action'] = 'index';

$c['di']['instance']['Zf2\Mvc\Router']['methods']['addRoutes']['routes']['default']['params']['regex'] = '#^/(?P<controller>[^/]+)(/(?P<action>[^/]+))?#';
$c['di']['instance']['Zf2\Mvc\Router']['methods']['addRoutes']['routes']['default']['params']['spec'] = '/{controller}/{action}';
$c['di']['instance']['preferences']['Zend\View\Renderer'] = 'Zend\View\PhpRenderer';
$c['di']['instance']['Zend\View\PhpRenderer']['methods']['setResolver']['resolver'] = 'Zend\View\TemplatePathStack';
$c['autoload']['Zend\Loader\StandardAutoloader']['namespaces']['Zf2']         = LIBRARY_PATH . '/Zf2';
$c['autoload']['Zend\Loader\StandardAutoloader']['namespaces']['Application'] = APPLICATION_PATH;
$c['autoload']['Zend\Loader\StandardAutoloader']['namespaces']['edp']         = LIBRARY_PATH . '/edp';

require_once('config.modules.php');

return $c;
