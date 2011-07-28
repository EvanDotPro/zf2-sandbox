<?php
namespace edp\View;
use Zend\View\PhpRenderer as ZfPhpRenderer; 
class PhpRenderer extends ZfPhpRenderer
{
    public function __get($var)
    {
        return $this->vars($var);
    }
}
