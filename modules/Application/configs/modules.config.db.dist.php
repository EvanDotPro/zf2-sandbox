<?php
return array(
    'di' => array(
        'instance' => array(
            'PDO' => array(
                'parameters' => array(
                    'dsn'            => 'mysql:dbname=changeme;host=changeme',
                    'username'       => 'changeme',
                    'passwd'         => 'changeme',
                    'driver_options' => array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''),
                ),
            ),
        ),
    ),
);
