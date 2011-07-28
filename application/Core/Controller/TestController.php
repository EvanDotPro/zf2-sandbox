<?php
namespace Core\Controller;
use edp\Mvc\ActionController;

class TestController extends ActionController
{
    public function index()
    {
        return array(
            'something' => 'IT WORKS! This is the test controller.',
            'name'      => self::$di->get('userService')->getName()
        );
    }
}
