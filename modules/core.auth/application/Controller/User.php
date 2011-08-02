<?php
namespace CoreAuth\Controller;
use edp\Mvc\ActionController,
    Zf2\Mvc\RouteStack;

class User extends ActionController
{
    protected $_flashMessenger;

    public function index()
    {
        return array(self::$di->get('userService')->getUser('ecoury'));
    }

    public function login()
    {

    }

    public function register()
    {
        $regForm = $this->_getRegisterForm();
        $request = $this->getRequest();
        return array('registerForm' => $regForm);
    }

    public function registerPost()
    {
        $regForm = $this->_getRegisterForm();
        $request = $this->getRequest();

        $redirect = $this->router->assemble(
            array('controller' => 'user', 'action' => 'register'), 
            array('name' => 'default')
        );

        if (!$this->getRequest()->isPost()) {
            $this->response->getHeaders()
                           ->setStatusCode(302)
                           ->addHeader('Location', $redirect);
            return $this->response;
        }

        if ($regForm->isValid($request->post()->toArray())) {
            die('success!');
        } else {
            $this->getFlashMessenger()->addMessage($regForm);
            $this->response->getHeaders()
                           ->setStatusCode(302)
                           ->addHeader('Location', $redirect);
            return $this->response;
        }
    }

    protected function _getRegisterForm()
    {
        $fm = $this->getFlashMessenger()->getMessages();
        return (count($fm) > 0) ? $fm[0] : self::$di->get('userService')->getRegisterForm();
    }
 
    /**
     * Get flashMessenger.
     *
     * @return flashMessenger
     */
    public function getFlashMessenger()
    {
        return $this->_flashMessenger;
    }
 
    /**
     * Set flashMessenger.
     *
     * @param $flashMessenger the value to be set
     */
    public function setFlashMessenger($flashMessenger)
    {
        $this->_flashMessenger = $flashMessenger;
        return $this;
    }

    public function setRouter(RouteStack $router)
    {
        $this->router = $router;
        return $this;
    }
}
