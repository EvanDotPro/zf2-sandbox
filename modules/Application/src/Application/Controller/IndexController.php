<?php
namespace Application\Controller;
use Zf2Mvc\Controller\ActionController;
class IndexController extends ActionController
{
    public function indexAction()
    {
        $this->response->setContent('Application module -> Index controller -> Index action');
    }
}
