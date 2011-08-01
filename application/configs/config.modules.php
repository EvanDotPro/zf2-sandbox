<?php
edp\ModuleLoader::config($c, 'core.multisite');
edp\ModuleLoader::config($c, 'core.auth');
edp\ModuleLoader::config($c, 'core.database.mysql');
switch($_SERVER['HTTP_HOST']){
    case 'site1.dev':
        edp\ModuleLoader::config($c, 'core.site1');
        break;
    case 'site2.dev':
        edp\ModuleLoader::config($c, 'core.site2');
        break;
    default:
        edp\ModuleLoader::config($c, 'core.helloworld');
        break;
}
