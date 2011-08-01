<?php
$c['di']['instance']['alias']['index'] = 'CoreSite1\Base\Controller\Index';
$c['di']['instance']['Zend\View\PhpRenderer']['methods']['setResolver']['options']['script_paths'][] = MODULES_PATH . '/core.site1/application/layouts/scripts';
$c['di']['instance']['Zend\View\PhpRenderer']['methods']['setResolver']['options']['script_paths'][] = MODULES_PATH . '/core.site1/application/views/scripts';
$c['autoload']['Zend\Loader\StandardAutoloader']['namespaces']['CoreSite1'] = MODULES_PATH . '/core.site1/application';
