<?php
$c['autoload']['Zend\Loader\StandardAutoloader']['namespaces']['CoreMultisite'] = MODULES_PATH . '/core.multisite/application';
$c['di']['instance']['CoreMultisite\Model\Mapper\Site']['parameters']['readAdapter'] = 'read-adapter';
$c['di']['instance']['CoreMultisite\Model\Mapper\Site']['parameters']['writeAdapter'] = 'write-adapter';
$c['di']['instance']['alias']['siteService'] = 'CoreMultisite\Service\Site';
$c['di']['instance']['alias']['siteMapper'] = 'CoreMultisite\Model\Mapper\Site';
