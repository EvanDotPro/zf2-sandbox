<?php
return array(
    'di' => array(
        'instance' => array(
            'alias' => array(
                'edpuser_pdo'       => 'masterdb',
                'mwopguestbook_pdo' => 'masterdb',
                //'edpuser_user_mapper' => 'EdpUser\Mapper\UserZendDb',
            ),
            'doctrine_connection' => array(
                'parameters' => array(
                    'pdo' => 'masterdb',
                ),
            ),
        ),
    ),
);
