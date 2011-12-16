<?php
/**
 * SpiffyDoctrine Configuration
 */
$spiffyDoctrineConfiguration = array(
    /**
     * PDO Connection DI alias
     *
     * Specify the DI alias for the configured PDO instance that SpiffyDoctrine
     * should use.
     */
    'pdo' => 'masterdb',

    /**
     * End of SpiffyDoctrine configuration
     */
);

/**
 * You do not need to edit below this line
 */
return array(
    'di' => array(
        'instance' => array(
            'doctrine_connection' => array(
                'parameters' => array(
                    'pdo' => $spiffyDoctrineConfiguration['pdo'],
                ),
            ),
        ),
    ),
);
