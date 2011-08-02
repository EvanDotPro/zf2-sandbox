<?php
namespace CoreAuth\Service;
use edp\ServiceAbstract,
    CoreAuth\Form\User\Register;
class User extends ServiceAbstract
{
    /**
     * _registerForm 
     * 
     * @var CoreAuth\Form\User\Register
     * @access protected
     */
    protected $_registerForm;

    public function getUser($username)
    {
        return $this->getMapper()->getUserByUsername($username);
    }

    /**
     * Get registerForm.
     *
     * @return registerForm
     */
    public function getRegisterForm()
    {
        if ($this->_registerForm === null) {
            $this->_registerForm = new Register();
        }
        return $this->_registerForm;
    }
 
    /**
     * Set registerForm.
     *
     * @param $registerForm the value to be set
     */
    public function setRegisterForm($registerForm)
    {
        $this->_registerForm = $registerForm;
        return $this;
    }
}
