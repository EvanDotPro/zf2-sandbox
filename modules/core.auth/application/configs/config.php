<?php
$c['di']['instance']['alias']['index']       = 'CoreAuth\Auth\Controller\Index';
$c['di']['instance']['alias']['userService'] = 'CoreAuth\Auth\Service\User';
$c['di']['instance']['Zend\View\PhpRenderer']['methods']['setResolver']['options']['script_paths'][] = MODULES_PATH . '/core.auth/application/views/scripts';
$c['autoload']['Zend\Loader\StandardAutoloader']['namespaces']['CoreAuth'] = MODULES_PATH . '/core.auth/application';
