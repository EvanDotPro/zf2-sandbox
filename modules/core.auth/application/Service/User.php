<?php
namespace CoreAuth\Service;
use edp\ServiceAbstract,
    CoreAuth\Form\User\Register,
    CoreAuth\Model\User as UserModel;
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

    public function createFromForm($form)
    {
        $user = new UserModel();
        $user->setUsername($form->getValue('username'))
             ->setSalt($this->randomBytes(16))
             ->setPassword($this->hashPassword($form->getValue('password'), $user->getSalt()));
        $user = $this->_mapper->insert($user);
        return $user;
    }

    public function hashPassword($password, $salt)
    {
        return hash('sha512', $password.$salt);
    }

    public function randomBytes($byteLength)
    {
        if (function_exists('openssl_random_pseudo_bytes')) {
           $data = openssl_random_pseudo_bytes($byteLength);
        } elseif (is_readable('/dev/urandom')) {
            $fp = @fopen('/dev/urandom','rb');
            if ($fp !== false) {
                $data = fread($fp, $byteLength);
                fclose($fp);
            }
        } elseif (class_exists('COM')) {
            // @TODO: Someone care to test on Windows? Not it!
            try {
                $capi = new COM('CAPICOM.Utilities.1');
                $data = $capi->GetRandom($btyeLength,0);
            } catch (Exception $ex) {
                // Fail silently
            }
        }
        return $data;
    }
}
