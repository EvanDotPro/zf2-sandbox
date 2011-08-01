<?php
$c['di']['instance']['alias']['index'] = 'CoreSite2\Base\Controller\Index';
$c['di']['instance']['Zend\View\PhpRenderer']['methods']['setResolver']['options']['script_paths'][] = MODULES_PATH . '/core.site2/application/layouts/scripts';
$c['di']['instance']['Zend\View\PhpRenderer']['methods']['setResolver']['options']['script_paths'][] = MODULES_PATH . '/core.site2/application/views/scripts';
$c['autoload']['Zend\Loader\StandardAutoloader']['namespaces']['CoreSite2'] = MODULES_PATH . '/core.site2/application';
