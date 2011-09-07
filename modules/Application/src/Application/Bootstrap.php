<?php
namespace Application;
use Zend\Config\Config,
    Zf2Mvc\Application,
    Zf2Mvc\Router\Http\Literal,
    Zend\Di\Configuration,
    Zend\Di\Definition,
    Zend\Di\Definition\Builder,
    Zend\Di\DependencyInjector;
class Bootstrap
{
    protected $config;

    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    public function bootstrap(Application $app)
    {
        $this->setupLocator($app);
        $this->setupRoutes($app);
        $this->setupEvents($app);
    }

    protected function setupLocator(Application $app)
    {
        /**
         * Instantiate and configure a DependencyInjector instance, or 
         * a ServiceLocator, and return it.
         */
        $definition = new Definition\AggregateDefinition;
        $this->di = new DependencyInjector;
        $this->di->setDefinition($definition);
        $config   = new Configuration($this->config->di);
        $config->configure($this->di);
        $this->di->getDefinition()->addDefinition(new Definition\RuntimeDefinition);
        $app->setLocator($this->di);
    }

    protected function setupRoutes(Application $app)
    {
        /**
         * Pull the routing table from configuration, and pass it to the
         * router composed in the Application instance.
         */
        $router = $this->di->get('Zf2Mvc\Router\SimpleRouteStack');
        $app->setRouter($router);
    }

    protected function setupEvents(Application $app)
    {
        /**
         * Wire events into the Application's EventManager, and/or setup
         * static listeners for events that may be invoked.
         */
    }
}
