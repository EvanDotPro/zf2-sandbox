<?php
namespace edp;
use Zend\Form\Form;
class FormAbstract extends Form
{
    public function __construct($options = NULL)
    {
        parent::__construct($options);
        $this->setDisableTranslator(true);
    }

    /**
     * Translate wrapper method to allow for clean translation compatible with 
     * poedit. 
     * 
     * @param string $string 
     * @access public
     * @return string
     */
    public function translate($string)
    {
        if ($this->getTranslator()) {
            return $this->getTranslator()->_($string);
        }
        return $string;
    }
}
