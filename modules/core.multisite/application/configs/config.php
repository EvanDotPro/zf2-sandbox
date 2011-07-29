<?php
edp\ModuleLoader::config($c, 'core.database.mysql');

$c['autoload']['Zend\Loader\StandardAutoloader']['namespaces']['CoreMultisite'] = MODULES_PATH . '/core.multisite/application';

$c['di']['instance']['alias']['siteMapper'] = 'CoreMultisite\Model\Mapper\Site';
$c['di']['instance']['siteMapper']['parameters']['readAdapter'] = 'read-adapter';
$c['di']['instance']['siteMapper']['parameters']['writeAdapter'] = 'write-adapter';

$c['di']['instance']['alias']['siteService'] = 'CoreMultisite\Service\Site';
$c['di']['instance']['siteService']['parameters']['mapper'] = 'siteMapper';
