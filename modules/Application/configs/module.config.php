<?php
return array_replace_recursive(array(
    'bootstrap_class' => 'Application\Bootstrap',
    'layout' => 'layouts/layout.phtml',
    'di' => array( 'instance' => array(
        'alias' => array(
            'index' => 'Application\Controller\IndexController',
            'error' => 'Application\Controller\ErrorController',
            'view'  => 'Zend\View\PhpRenderer',
        ),

        'Zend\View\HelperLoader' => array('parameters' => array(
            'map' => array(
                'url' => 'Application\View\Helper\Url',
            ),
        )),

        'Zend\View\HelperBroker' => array('parameters' => array(
            'loader' => 'Zend\View\HelperLoader',
        )),

        'Zend\View\PhpRenderer' => array(
            'methods' => array(
                'setResolver' => array(
                    'resolver' => 'Zend\View\TemplatePathStack',
                    'options' => array(
                        'script_paths' => array(
                            'application' => __DIR__ . '/../views',
                        ),
                    ),
                ),
            ),
            'parameters' => array(
                'broker' => 'Zend\View\HelperBroker',
            ),
        ),
    )),

    'routes' => array(
        'default' => array(
            'type'    => 'Zend\Mvc\Router\Http\Regex',
            'options' => array(
                'regex' => '/(?P<controller>[^/]+)(/(?P<action>[^/]+)?)?',
                'defaults' => array(
                    'controller' => 'error',
                    'action'     => 'index',
                ),
                'spec' => '/%controller%/%action%',
            ),
        ),
        'home' => array(
            'type' => 'Zend\Mvc\Router\Http\Literal',
            'options' => array(
                'route' => '/',
                'defaults' => array(
                    'controller' => 'index',
                    'action'     => 'index',
                ),
            ),
        ),
    ),
), (file_exists(__DIR__ . '/module.config.' . APPLICATION_ENV . '.php')) ? include __DIR__ . '/module.config.' . APPLICATION_ENV . '.php' : array());
