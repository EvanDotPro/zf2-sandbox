<?php
namespace CoreHelloWorld\Base\Controller;
use edp\Mvc\ActionController;

class Index extends ActionController
{
    public function index()
    {
        $db = self::$di->get('read-adapter');
        $sql = $db->select()
            ->from('multisite_site')
            ->where('site_id = ?', 1);
        $row = $db->fetchRow($sql);
        return $row;
    }
}
