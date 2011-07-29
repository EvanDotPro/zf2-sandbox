<?php
namespace CoreHelloWorld\Base\Controller;
use edp\Mvc\ActionController;

class Index extends ActionController
{
    public function index()
    {
        $siteService = self::$di->get('siteService');
        var_dump($siteService->getSiteByHostname('framework.dev'));
    }
}
