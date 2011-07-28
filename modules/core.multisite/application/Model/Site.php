<?php
namespace CoreMultisite\Model;
class Site
{
    protected $_siteId;

    protected $_hostname;

    protected $_sessionNamespace;

    protected $_masterSite;
 
    /**
     * Get siteId.
     *
     * @return siteId
     */
    public function getSiteId()
    {
        return $this->_siteId;
    }
 
    /**
     * Set siteId.
     *
     * @param $siteId the value to be set
     */
    public function setSiteId($siteId)
    {
        $this->_siteId = (int)$siteId;
        return $this;
    }
 
    /**
     * Get hostname.
     *
     * @return hostname
     */
    public function getHostname()
    {
        return $this->_hostname;
    }
 
    /**
     * Set hostname.
     *
     * @param $hostname the value to be set
     */
    public function setHostname($hostname)
    {
        $this->_hostname = $hostname;
        return $this;
    }
 
    /**
     * Get sessionNamespace.
     *
     * @return sessionNamespace
     */
    public function getSessionNamespace()
    {
        return $this->_sessionNamespace;
    }
 
    /**
     * Set sessionNamespace.
     *
     * @param $sessionNamespace the value to be set
     */
    public function setSessionNamespace($sessionNamespace)
    {
        $this->_sessionNamespace = $sessionNamespace;
        return $this;
    }
 
    /**
     * Get masterSite.
     *
     * @return masterSite
     */
    public function getMasterSite()
    {
        return $this->_masterSite;
    }
 
    /**
     * Set masterSite.
     *
     * @param $masterSite Multisite_Model_Site the value to be set
     */
    public function setMasterSite($masterSite)
    {
        $this->_masterSite = $masterSite;
        return $this;
    }
}
