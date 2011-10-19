<?php
return array_replace_recursive(array(
    'layout'          => 'layouts/layout.phtml',
    'di'              => array(
        'instance' => array(
            'alias' => array(
                'index' => 'Application\Controller\IndexController',
                'error' => 'Application\Controller\ErrorController',
                'view'  => 'Zend\View\PhpRenderer',
            ),

            'Zend\View\HelperLoader' => array(
                'parameters' => array(
                    'map' => array(
                        'url' => 'Application\View\Helper\Url',
                    ),
                ),
            ),

            'Zend\View\HelperBroker' => array(
                'parameters' => array(
                    'loader' => 'Zend\View\HelperLoader',
                ),
            ),

            'Zend\View\PhpRenderer' => array(
                'parameters' => array(
                    'broker' => 'Zend\View\HelperBroker',
                    'resolver' => 'Zend\View\TemplatePathStack',
                    'options'  => array(
                        'script_paths' => array(
                            'application' => __DIR__ . '/../views',
                        ),
                    ),
                ),
            ),
        ),
    ),

    'routes' => array(
        'default' => array(
            'type'    => 'Zend\Mvc\Router\Http\Regex',
            'options' => array(
                'regex'    => '/(?P<controller>[^/]+)(/(?P<action>[^/]+)?)?',
                'spec'     => '/%controller%/%action%',
                'defaults' => array(
                    'controller' => 'error',
                    'action'     => 'index',
                ),
            ),
        ),
        'home' => array(
            'type' => 'Zend\Mvc\Router\Http\Literal',
            'options' => array(
                'route'    => '/',
                'defaults' => array(
                    'controller' => 'index',
                    'action'     => 'index',
                ),
            ),
        ),
    ),
) 
 ,file_exists(__DIR__ . '/di.config.php') ? include __DIR__ . '/di.config.php' : array()
 ,file_exists(__DIR__ . '/database.config.php') ? include __DIR__ . '/database.config.php' : array()
);
