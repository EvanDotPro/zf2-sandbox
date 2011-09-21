<?php

namespace Sample\Controller;

use Zend\Mvc\Controller\ActionController;

class SampleController extends ActionController
{
    public function indexAction()
    {
        return array('content' => 'IT WORKS!');
    }
}
