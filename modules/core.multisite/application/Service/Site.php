<?php
namespace CoreMultisite\Service;
use edp\ServiceAbstract;
class Site extends ServiceAbstract
{
    public function getSiteByHostname($hostname)
    {
        return $this->getMapper()->getSiteByHostname($hostname);
    }
}
