<?php
namespace Core\Controller;
use edp\Mvc\ActionController;

class IndexController extends ActionController
{
    public function index()
    {
        return array(
            'something' => 'IT WORKS!',
        );
    }

    public function action2()
    {
        return array(
            'something' => 'IT WORKS! This is IndexController->action2()',
        );

    }
}
