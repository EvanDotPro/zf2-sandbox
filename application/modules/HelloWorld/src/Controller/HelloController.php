<?php
namespace HelloWorld\Controller;

use Zf2Mvc\Controller\ActionController;

class HelloController extends ActionController
{
    public function indexAction()
    {
        echo 'hi!';
        // do something
    }
}
