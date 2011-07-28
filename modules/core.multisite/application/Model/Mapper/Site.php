<?php
namespace CoreMultisite\Model\Mapper;
class Site
{
    protected $_name = 'multisite_site';

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

