<?php
return new Zend\Config\Config(array(
    'module_paths' => array(
        realpath(__DIR__ . '/../modules'),
        realpath(__DIR__ . '/../library/ZendFramework2/modules'),
    ),
    'modules' => array(
        'Zf2Module', // paradox?!
        'Zf2Mvc',
        'Application',
        'Sample',
    ),
    'module_config' => array( 
        'cache_config'  => false,
        'cache_dir'     => null,
    ),
));
