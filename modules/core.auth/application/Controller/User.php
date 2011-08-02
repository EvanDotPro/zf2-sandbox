<?php
namespace CoreAuth\Controller;
use edp\Mvc\ActionController,
    Zf2\Mvc\RouteStack;

class User extends ActionController
{
    public function login()
    {}

    public function register()
    {
        return array('form' => $this->_getRegisterForm());
    }

    public function registerPost()
    {
        // We are going to redirect no matter what
        $this->response->getHeaders()->setStatusCode(302);

        $regForm = $this->_getRegisterForm();
        $request = $this->getRequest();

        $failRedirect = $this->_router->assemble(
            array('controller' => 'user', 'action' => 'register'), 
            array('name' => 'default')
        );

        if (!$this->getRequest()->isPost() || !$regForm->isValid($request->post()->toArray())) {
            $this->_flashMessenger->addMessage($regForm);
            $this->response->getHeaders()->addHeader('Location', $failRedirect);
            return $this->response;
        }
        $user = self::$di->get('userService')->createFromForm($regForm);
        var_dump($user);
        die('success!');
    }

    protected function _getRegisterForm()
    {
        $fm = $this->_flashMessenger->getMessages();
        return (count($fm) > 0) ? $fm[0] : self::$di->get('userService')->getRegisterForm();
    }
 
    public function setFlashMessenger($flashMessenger)
    {
        $this->_flashMessenger = $flashMessenger;
        return $this;
    }

    public function setRouter(RouteStack $router)
    {
        $this->_router = $router;
        return $this;
    }
}
