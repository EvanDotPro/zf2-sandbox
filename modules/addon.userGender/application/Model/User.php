<?php
namespace AddonUserGender\Model;
use CoreAuth\Model\User as UserModel;
class User extends UserModel
{
    /**
     * _gender 
     * 
     * @var string
     * @access protected
     */
    protected $_gender;
 
    /**
     * Get gender.
     *
     * @return gender
     */
    public function getGender()
    {
        return $this->_gender;
    }
 
    /**
     * Set gender.
     *
     * @param $gender the value to be set
     */
    public function setGender($gender)
    {
        $this->_gender = $gender;
        return $this;
    }
}
