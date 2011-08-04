<?php
edp\ModuleLoader::config($c, 'core.database.mysql');
$c['autoload']['Zend\Loader\StandardAutoloader']['namespaces']['CoreAuth'] = MODULES_PATH . '/core.auth/application';

$c['di']['instance']['alias']['user'] = 'CoreAuth\Controller\User';
$c['di']['instance']['Zend\View\PhpRenderer']['methods']['setResolver']['options']['script_paths'][] = MODULES_PATH . '/core.auth/application/views/scripts';

$c['di']['instance']['user']['parameters']['flashMessenger'] = 'Zend\Controller\Action\Helper\FlashMessenger';

$c['di']['instance']['alias']['userMapper'] = 'CoreAuth\Model\Mapper\User';
$c['di']['instance']['userMapper']['parameters']['readAdapter'] = 'read-adapter';
$c['di']['instance']['userMapper']['parameters']['writeAdapter'] = 'write-adapter';
$c['di']['instance']['userMapper']['parameters']['modelClass'] = 'CoreAuth\Model\User';

//$c['di']['instance']['alias']['userRegisterForm'] = 'CoreAuth\Form\User\Register';
$c['di']['instance']['CoreAuth\Form\User\Register']['parameters']['userMapper'] = 'userMapper';

$c['di']['instance']['alias']['userService'] = 'CoreAuth\Service\User';
$c['di']['instance']['userService']['parameters']['mapper'] = 'userMapper';
$c['di']['instance']['userService']['parameters']['registerForm'] = 'CoreAuth\Form\User\Register';
