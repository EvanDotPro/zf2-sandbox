<?php
namespace CoreAuth\Model\Mapper;
use CoreDatabaseMysql\DbMapperAbstract;
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
}
