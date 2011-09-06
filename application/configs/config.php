<?php
$c = array();
$c['bootstrap_class'] = 'Application\Bootstrap';
$c['autoload']['Zend\Loader\StandardAutoloader']['namespaces']['Zf2Mvc']         = LIBRARY_PATH . '/ZendFramework2/modules/Zf2Mvc/src/Zf2Mvc';
$c['autoload']['Zend\Loader\StandardAutoloader']['namespaces']['Application']    = APPLICATION_PATH;
$c['autoload']['Zend\Loader\StandardAutoloader']['namespaces']['HelloWorld']     = APPLICATION_PATH . '/modules/HelloWorld/src';
$c['di']['instance']['alias']['controller_hello-world_hello'] = 'HelloWorld\Controller\HelloController';
$c['di']['instance']['Zf2Mvc\Router\SimpleRouteStack']['methods']['addRoutes']['routes']['hello']['type'] = 'Zf2Mvc\Router\Http\Literal';
$c['di']['instance']['Zf2Mvc\Router\SimpleRouteStack']['methods']['addRoutes']['routes']['hello']['options']['route'] = '/hello';
$c['di']['instance']['Zf2Mvc\Router\SimpleRouteStack']['methods']['addRoutes']['routes']['hello']['options']['defaults']['controller'] = 'controller_hello-world_hello';
return $c;

