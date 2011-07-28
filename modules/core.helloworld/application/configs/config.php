<?php
$c['di']['instance']['alias']['index'] = 'CoreHelloWorld\Base\Controller\Index';
$c['di']['instance']['alias']['test']  = 'CoreHelloWorld\Base\Controller\Test';
$c['di']['instance']['Zend\View\PhpRenderer']['methods']['setResolver']['options']['script_paths'][] = MODULES_PATH . '/core.helloworld/application/layouts/scripts';
$c['di']['instance']['Zend\View\PhpRenderer']['methods']['setResolver']['options']['script_paths'][] = MODULES_PATH . '/core.helloworld/application/views/scripts';
$c['autoload']['Zend\Loader\StandardAutoloader']['namespaces']['CoreHelloWorld'] = MODULES_PATH . '/core.helloworld/application';
