<?php
return array(
    'modules' => array(
        'Application',
        'EdpCommon',
        'MwopGuestbook',
        'EdpUser',
        'SpiffyDoctrineORM',
        'SpiffyDoctrine',
    ),
    'module_listener_options' => array( 
        'config_cache_enabled' => false,
        'cache_dir'            => 'data/cache',
        'module_paths' => array(
            '../devmodules',
            './module',
            './vendor',
        ),
    ),
);
