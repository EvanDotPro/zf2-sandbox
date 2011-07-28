<?php
namespace CoreAuth\Auth\Controller;
use edp\Mvc\ActionController;

class Index extends ActionController
{
    public function index()
    {
        return array(
            'something' => 'IT WORKS! USER MODULE',
            'name'      => self::$di->get('userService')->getName()
        );
    }
}
