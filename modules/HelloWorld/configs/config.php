<?php
$c = array();
$c['modules']['HelloWorldDep'] = array('stuff here?'); // Cool, I just declared my own dependency!
$c['autoload']['Zend\Loader\StandardAutoloader']['namespaces']['HelloWorld'] = MODULES_PATH . '/HelloWorld/src/HelloWorld';
$c['di']['instance']['alias']['controller_hello-world_hello'] = 'HelloWorld\Controller\HelloController';
$c['di']['instance']['Zf2Mvc\Router\SimpleRouteStack']['methods']['addRoutes']['routes']['hello']['type'] = 'Zf2Mvc\Router\Http\Literal';
$c['di']['instance']['Zf2Mvc\Router\SimpleRouteStack']['methods']['addRoutes']['routes']['hello']['options']['route'] = '/hello';
$c['di']['instance']['Zf2Mvc\Router\SimpleRouteStack']['methods']['addRoutes']['routes']['hello']['options']['defaults']['controller'] = 'controller_hello-world_hello';
return $c;
