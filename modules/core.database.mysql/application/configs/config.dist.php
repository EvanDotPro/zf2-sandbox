<?php
$c['autoload']['Zend\Loader\StandardAutoloader']['namespaces']['CoreDatabaseMysql'] = MODULES_PATH . '/core.database.mysql/application';

$c['di']['instance']['alias']['read-adapter']  = 'Zend\Db\Adapter\PdoMysql';
$c['di']['instance']['read-adapter']['parameters']['config']['host']        = 'changeme';    
$c['di']['instance']['read-adapter']['parameters']['config']['dbname']      = 'changeme';                      
$c['di']['instance']['read-adapter']['parameters']['config']['username']    = 'changeme';                      
$c['di']['instance']['read-adapter']['parameters']['config']['password']    = 'changeme';                         
$c['di']['instance']['read-adapter']['parameters']['config']['charset']     = 'UTF8';                           

$c['di']['instance']['alias']['write-adapter'] = 'Zend\Db\Adapter\PdoMysql';
$c['di']['instance']['write-adapter']['parameters']['config']['host']        = 'changeme';    
$c['di']['instance']['write-adapter']['parameters']['config']['dbname']      = 'changeme';                      
$c['di']['instance']['write-adapter']['parameters']['config']['username']    = 'changeme';                      
$c['di']['instance']['write-adapter']['parameters']['config']['password']    = 'changeme';                         
$c['di']['instance']['write-adapter']['parameters']['config']['charset']     = 'UTF8';                           
