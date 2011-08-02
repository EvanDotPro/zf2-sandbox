<?php
namespace CoreAuth\Form\User;
use edp\FormAbstract;
class Base extends FormAbstract
{
    public function init()
    {
        $this->addElement('text', 'username', array(
            'filters'    => array('StringTrim'),
            'validators' => array(
                array('Alnum', true, array()),
                array('StringLength', true, array(3, 128)),
            ),
            'required'   => true,
            'label'      => $this->translate('username')
        ));

        $this->addElement('password', 'password', array(
            'filters'    => array('StringTrim'),
            'validators' => array(
                array('StringLength', true, array(6, 128))
            ),
            'required'   => true,
            'label'      => $this->translate('password')
        ));

        $this->addElement('password', 'passwordVerify', array(
            'filters'    => array('StringTrim'),
            'validators' => array(
               array('Identical', false, array('token' => 'password'))
            ),
            'required'   => true,
            'label'      => $this->translate('confirm_password')
        ));

//        $this->addElement('select', 'role', array(
//            'required'   => true,
//            'label'      => 'Role',
//            'multiOptions'   => Zend_Registry::get('Default_DiContainer')
//                        ->getRoleService()
//                        ->getRolesForForm(),
//        ));

        $this->addElement('submit', 'submit', array(
            'ignore'   => true,
            'label'    => $this->translate('submit'),
        ));

        $this->addElement('hidden', 'userId', array(
            'filters'    => array('StringTrim'),
            'required'   => true,
            'decorators' => array('viewHelper',array('HtmlTag', array('tag' => 'dd', 'class' => 'noDisplay')))
        ));

        $this->setDecorators(array(
            'FormElements',
            array('Description', array('placement' => 'prepend', 'class' => 'error')),
            'FormDecorator'
        ));
    }
}
