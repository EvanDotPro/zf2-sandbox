<?php
namespace CoreAuth\Model\Mapper;
use CoreDatabaseMysql\DbMapperAbstract,
    CoreAuth\Model\User as UserModel,
    Zend\Db\Expr as DbExpr;
class User extends DbMapperAbstract 
{
    protected $_tableName = 'user';
    protected $_modelClass = 'CoreAuth\Model\User';

    public function getUserByUsername($username)
    {
        $db = $this->getReadAdapter();
        $sql = $db->select()
            ->from($this->getTableName())
            ->where('username = ?', $username);
        $row = $db->fetchRow($sql);
        return ($row) ? $this->_rowToModel($row) : false;
    }

    public function insert(UserModel $user)
    {
        $data = array(
            'user_id'       => $user->getUserId(),
            'username'      => $user->getUsername(),
            'password'      => $user->getPassword(),
            'salt'          => $user->getSalt(),
            'register_time' => new DbExpr('NOW()'),
            'register_ip'   => new DbExpr("INET_ATON('{$_SERVER['REMOTE_ADDR']}')"),
        );
        $db = $this->getWriteAdapter();
        $db->insert($this->getTableName(), $data);
        $user->setUserId($db->lastInsertId());
        return $user;
    }
}
