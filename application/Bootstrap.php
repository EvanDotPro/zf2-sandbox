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
        $definition = new Definition\AggregateDefinition;
        $this->di = new DependencyInjector;
        $this->di->setDefinition($definition);
        $config   = new Configuration($this->config->di);
        $config->configure($this->di);
        $this->di->getDefinition()->addDefinition(new Definition\RuntimeDefinition);
        \edp\Mvc\ActionController::$di = $this->di;
    }

    public function defineEventHandlers()
    {
        $events = StaticEventManager::getInstance();
        $view   = $this->di->get('view');
        $events->attach('Zf2\Mvc\FrontController', 'dispatch.post', function($e) use ($view) {
            $response = $e->getParam('response');
            if ($response->getHeaders()->getStatusCode() != 302) {
                $content  = $view->render($e->getParam('request'), $e->getParam('__RESULT__'));
                $response->setContent($content);
            }
            return $response;
        });
    }
}
