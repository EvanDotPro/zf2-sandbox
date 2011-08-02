<?php
namespace CoreAuth\Model;
use edp\ModelAbstract;
class User extends ModelAbstract
{
    /**
     * _userId 
     * 
     * @var int
     * @access protected
     */
    protected $_userId;

    /**
     * _username 
     * 
     * @var string
     * @access protected
     */
    protected $_username;

    /**
     * _password 
     * 
     * @var string
     * @access protected
     */
    protected $_password;

    /**
     * _salt 
     * 
     * @var string
     * @access protected
     */
    protected $_salt;

    /**
     * _lastLogin 
     * 
     * @var DateTime
     * @access protected
     */
    protected $_lastLogin;

    /**
     * _lastIp 
     * 
     * @var string
     * @access protected
     */
    protected $_lastIp;

    /**
     * _registerTime 
     * 
     * @var DateTime
     * @access protected
     */
    protected $_registerTime;

    /**
     * _registerIp 
     * 
     * @var string
     * @access protected
     */
    protected $_registerIp;


 
    /**
     * Get userId.
     *
     * @return userId
     */
    public function getUserId()
    {
        return $this->_userId;
    }
 
    /**
     * Set userId.
     *
     * @param $userId the value to be set
     */
    public function setUserId($userId)
    {
        $this->_userId = $userId;
        return $this;
    }
 
    /**
     * Get username.
     *
     * @return username
     */
    public function getUsername()
    {
        return $this->_username;
    }
 
    /**
     * Set username.
     *
     * @param $username the value to be set
     */
    public function setUsername($username)
    {
        $this->_username = $username;
        return $this;
    }
 
    /**
     * Get password.
     *
     * @return password
     */
    public function getPassword()
    {
        return $this->_password;
    }
 
    /**
     * Set password.
     *
     * @param $password the value to be set
     */
    public function setPassword($password)
    {
        $this->_password = $password;
        return $this;
    }
 
    /**
     * Get salt.
     *
     * @return salt
     */
    public function getSalt()
    {
        return $this->_salt;
    }
 
    /**
     * Set salt.
     *
     * @param $salt the value to be set
     */
    public function setSalt($salt)
    {
        $this->_salt = $salt;
        return $this;
    }
 
    /**
     * Get lastLogin.
     *
     * @return lastLogin
     */
    public function getLastLogin()
    {
        return $this->_lastLogin;
    }
 
    /**
     * Set lastLogin.
     *
     * @param $lastLogin the value to be set
     */
    public function setLastLogin($lastLogin)
    {
        $this->_lastLogin = $lastLogin;
        return $this;
    }
 
    /**
     * Get lastIp.
     *
     * @return lastIp
     */
    public function getLastIp()
    {
        return $this->_lastIp;
    }
 
    /**
     * Set lastIp.
     *
     * @param $lastIp the value to be set
     */
    public function setLastIp($lastIp)
    {
        $this->_lastIp = $lastIp;
        return $this;
    }
 
    /**
     * Get registerTime.
     *
     * @return registerTime
     */
    public function getRegisterTime()
    {
        return $this->_registerTime;
    }
 
    /**
     * Set registerTime.
     *
     * @param $registerTime the value to be set
     */
    public function setRegisterTime($registerTime)
    {
        $this->_registerTime = $registerTime;
        return $this;
    }
 
    /**
     * Get registerIp.
     *
     * @return registerIp
     */
    public function getRegisterIp()
    {
        return $this->_registerIp;
    }
 
    /**
     * Set registerIp.
     *
     * @param $registerIp the value to be set
     */
    public function setRegisterIp($registerIp)
    {
        $this->_registerIp = $registerIp;
        return $this;
    }
}
