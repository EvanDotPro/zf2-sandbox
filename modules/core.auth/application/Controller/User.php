<?php
namespace CoreAuth\Controller;
use edp\Mvc\ActionController;

class User extends ActionController
{
    public function index()
    {
        return array(self::$di->get('userService')->getUser('ecoury'));
    }

    public function login()
    {

    }

    public function register()
    {
        $regForm = self::$di->get('userService')->getRegisterForm();
        $request = $this->getRequest();
        if ($this->getRequest()->isPost()) {
            if ($regForm->isValid($request->post()->toArray())) {
                die('success!');
            } else {
                die('fail!');
            }
        }
        return array('registerForm' => $regForm);
    }

    public function registerPost()
    {


    }
}
