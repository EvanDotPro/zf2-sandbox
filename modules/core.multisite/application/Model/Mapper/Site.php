<?php
namespace CoreMultisite\Model\Mapper;
use CoreDatabaseMysql\DbMapperAbstract;
class Site extends DbMapperAbstract 
{
    protected $_tableName = 'multisite_site';

    public function getSiteByHostname($hostname)
    {
        $db = $this->getReadAdapter();
        $sql = $db->select()
            ->from($this->getTableName())
            ->where('hostname = ?', $hostname);
        $row = $db->fetchRow($sql);
        return ($row) ? new Multisite_Model_Site($row) : false;
    }

    public function getSiteById($siteId)
    {
        $db = $this->getReadAdapter();
        $sql = $db->select()
            ->from($this->getTableName())
            ->where('site_id = ?', $siteId);
        $row = $db->fetchRow($sql);
        return ($row) ? new Multisite_Model_Site($row) : false;
    }
}

