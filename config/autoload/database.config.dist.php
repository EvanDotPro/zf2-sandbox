<?php
/**
 * Copy this file to database.config.php (no '.dist') BEFORE editing!
 */

$mdb = array(
    'dbname' => 'changeme',
    'user'   => 'changeme',
    'pass'   => 'changeme',
    'host'   => 'changeme',
);

/**
 * No need to edit below this line 
 */
return array(
    'di' => array(
        'instance' => array(
            'alias' => array(
                'masterdb' => 'PDO',
              //'slavedb'  => 'PDO', // Example of adding multiple DB connections
            ),
            'masterdb' => array(
                'parameters' => array(
                    'dsn'            => "mysql:dbname={$mdb['dbname']};host={$mdb['host']}",
                    'username'       => $mdb['user'],
                    'passwd'         => $mdb['pass'],
                    'driver_options' => array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''),
                ),
            ),
            /**
             * 'slavedb' => array(
             *     'parameters' => array(
             *         'dsn'            => "mysql:dbname={$sdb['dbname']};host={$sdb['host']}",
             *         'username'       => $sdb['user'],
             *         'passwd'         => $sdb['pass'],
             *         'driver_options' => array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''),
             *     ),
             * ),
             */
        ),
    ),
);
