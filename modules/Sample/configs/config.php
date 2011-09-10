<?php
return array(
    'di' => array( 'instance' => array(
        'alias' => array(
            'sample' => 'Sample\Controller\SampleController',
        ),
        'Zend\View\PhpRenderer' => array('methods' => array(
            'setResolver' => array(
                'options' => array(
                    'script_paths' => array(
                        'sample' => __DIR__ . '/../views',
                    ),
                ),
            ),
        )),
    )),
);
