<?php

namespace Application\Controller;

use Zend\Mvc\Controller\ActionController;

class IndexController extends ActionController
{
    public function indexAction()
    {
        return array(
            'introbar'  => true,
            'nowrapper' => true
        );
    }
}
