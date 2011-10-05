<?php
return array(
    'di' => array(
        'instance' => array(
            'alias' => array(
                // This is how you "tell" the modules which database connection to use.
                'user-pdo'      => 'masterdb',
                'guestbook-pdo' => 'masterdb',
            ),
        ),
    ),
);
