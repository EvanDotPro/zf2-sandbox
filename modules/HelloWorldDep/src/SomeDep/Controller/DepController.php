<?php
namespace SomeDep\Controller;
use Zf2Mvc\Controller\ActionController;
class DepController extends ActionController
{
    public function indexAction()
    {
        $this->response->setContent('HelloWorldDep module -> Dep controller -> Index action');
    }
}
