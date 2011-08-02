<?php  
namespace CoreAuth\Form\User;
class Register extends Base
{
    /**
     * _userMapper 
     * 
     * @var CoreAuth\Model\Mapper\User
     */
    protected $_userMapper;

    /**
     * init 
     * 
     * @return void
     */
    public function init()
    {
        parent::init();
        $this->removeElement('userId');
        $this->getElement('submit')->setLabel($this->translate('register'));
        //$this->removeElement('role');
    }

    /**
     * isValid 
     * 
     * @param mixed $values 
     * @return bool
     */
    public function isValid($values)
    {
        // add username db validor
        $this->getElement('username')->addValidator('Db\NoRecordExists', true, array(
            'adapter'   => $this->_userMapper->getReadAdapter(),
            'table'     => $this->_userMapper->getTableName(),
            'field'     => 'username'
        ));
        return parent::isValid($values);        
    }
 
    /**
     * Get userMapper.
     *
     * @return userMapper
     */
    public function getUserMapper()
    {
        return $this->_userMapper;
    }
 
    /**
     * Set userMapper.
     *
     * @param $userMapper the value to be set
     */
    public function setUserMapper($userMapper)
    {
        $this->_userMapper = $userMapper;
        return $this;
    }
}
