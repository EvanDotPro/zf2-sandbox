<?php
namespace Application;
use Zend\Config\Config,
    Zend\Di\Configuration,
    Zend\Di\Definition,
    Zend\Di\Definition\Builder,
    Zend\Di\DependencyInjector,
    Zend\EventManager\StaticEventManager;

class Bootstrap 
{
    protected $config;
    protected $di;

    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    public function execute()
    {
        $this->defineDependencies();
        $this->defineEventHandlers();
    }

    public function getContainer()
    {
        return $this->di;
    }

    public function defineDependencies()
    {
        $this->di = new DependencyInjector;
        $config   = new Configuration($this->_getDiConfiguration());
        $config->configure($this->di);
        \edp\Mvc\ActionController::$di = $this->di;
    }

    public function defineEventHandlers()
    {
        $events = StaticEventManager::getInstance();
        $view   = $this->di->get('view');
        $events->attach('Zf2\Mvc\FrontController', 'dispatch.post', function($e) use ($view) {
            $content  = $view->render($e->getParam('request'), $e->getParam('__RESULT__'));
            $response = $e->getParam('response');
            $response->setContent($content);
            return $response;
        });
    }

    protected function _getDiConfiguration()
    {
        return $this->config->di;
    }
}
