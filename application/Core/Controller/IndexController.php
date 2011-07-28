<?php
namespace Core\Controller;
use edp\Mvc\ActionController;

class IndexController extends ActionController
{
    public function index()
    {
        return array(
            'something' => 'IT WORKS!',
            'name'      => self::$di->get('userService')->getName()
        );
    }
}
