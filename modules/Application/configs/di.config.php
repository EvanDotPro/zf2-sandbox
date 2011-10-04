<?php
return array(
    'di' => array(
        'instance' => array(
            'alias' => array(
                'doctrine-pdo'  => 'masterdb',
                'user-pdo'      => 'masterdb',
                'guestbook-pdo' => 'masterdb',
            ),
        ),
    ),
);
