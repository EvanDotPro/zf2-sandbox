<?php
$c = array();
$c['autoload']['Zend\Loader\StandardAutoloader']['namespaces']['SomeDep'] = MODULES_PATH . '/HelloWorldDep/src/SomeDep';
$c['di']['instance']['alias']['controller_some-dep_dep'] = 'SomeDep\Controller\DepController';
$c['di']['instance']['Zf2Mvc\Router\SimpleRouteStack']['methods']['addRoutes']['routes']['dep']['type'] = 'Zf2Mvc\Router\Http\Literal';
$c['di']['instance']['Zf2Mvc\Router\SimpleRouteStack']['methods']['addRoutes']['routes']['dep']['options']['route'] = '/dep';
$c['di']['instance']['Zf2Mvc\Router\SimpleRouteStack']['methods']['addRoutes']['routes']['dep']['options']['defaults']['controller'] = 'controller_some-dep_dep';
return $c;
