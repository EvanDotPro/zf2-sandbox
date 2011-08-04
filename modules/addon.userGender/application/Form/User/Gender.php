<?php
namespace AddonUserGender\Form\User;
use edp\SubFormAbstract;
class Gender extends SubFormAbstract
{
    public function init()
    {
        $this->addElement('select', 'gender', array(
            'required'   => true,
            'label'      => 'Gender',
            'multiOptions'   => array(
                                    'male' => 'Male',
                                    'female' => 'Female',
                                    'other' => 'Other'
                                )
        ));
    }
}
