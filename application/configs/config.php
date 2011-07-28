<?php
$c = array();
$c['bootstrap_class'] = 'Application\Bootstrap';
$c['di']['instance']['alias']['index']      = 'Core\Controller\IndexController';
$c['di']['instance']['alias']['view']       = 'Application\View';
$c['di']['instance']['alias']['router']     = 'Zf2\Mvc\Router';
$c['di']['instance']['Zf2\Mvc\Router']['methods']['addRoutes']['routes']['home']['class'] = 'Zf2\Mvc\Route\StaticRoute';
$c['di']['instance']['Zf2\Mvc\Router']['methods']['addRoutes']['routes']['home']['params']['path'] = '/';
$c['di']['instance']['Zf2\Mvc\Router']['methods']['addRoutes']['routes']['home']['params']['params']['controller'] = 'index';
$c['di']['instance']['Zf2\Mvc\Router']['methods']['addRoutes']['routes']['home']['params']['param']['action'] = 'index';
$c['di']['instance']['Zend\View\PhpRenderer']['methods']['setResolver']['resolver'] = 'Zend\View\TemplatePathStack';
$c['di']['instance']['Zend\View\PhpRenderer']['methods']['setResolver']['options']['script_paths'][] = APPLICATION_PATH . "/layouts/scripts";
$c['di']['instance']['Zend\View\PhpRenderer']['methods']['setResolver']['options']['script_paths'][] = APPLICATION_PATH . "/views/scripts";
$c['di']['instance']['preferences']['Zend\View\Renderer'] = 'Zend\View\PhpRenderer';
return $c;
