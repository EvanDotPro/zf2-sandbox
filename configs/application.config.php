<?php
return array(
    'module_paths' => array(
        realpath(dirname(__DIR__) . '/modules'),
        realpath(dirname(__DIR__) . '/vendors'),
    ),
    'modules' => array(
        'EdpCommon',
        'EdpUser',
        'MwopGuestbook',
        'SpiffyDoctrine',
        'Application',
    ),
    'module_listener_options' => array( 
        'config_cache_enabled'     => false,
        'cache_dir'                => realpath(dirname(__DIR__) . '/data/cache'),
        'application_environment'  => getenv('APPLICATION_ENV'),
    ),
);
