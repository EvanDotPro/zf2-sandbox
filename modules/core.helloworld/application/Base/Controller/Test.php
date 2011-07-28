<?php
namespace CoreHelloWorld\Base\Controller;
use edp\Mvc\ActionController;

class Test extends ActionController
{
    public function index()
    {
        return array(
            'something' => 'IT WORKS! This is the test controller.',
        );
    }
}
