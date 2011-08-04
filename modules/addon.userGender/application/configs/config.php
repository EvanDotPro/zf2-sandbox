<?php
edp\ModuleLoader::config($c, 'core.auth');
$c['autoload']['Zend\Loader\StandardAutoloader']['namespaces']['AddonUserGender'] = MODULES_PATH . '/addon.userGender/application';
$c['di']['definitions']['builder']['class'] = 'Zend\Di\Definition\BuilderDefinition';
$c['di']['definitions']['builder']['CoreAuth\Form\User\Register']['injectionmethods']['addSubForm']['form'] = 'AddonUserGender\Form\User\Gender';
$c['di']['definitions']['builder']['CoreAuth\Form\User\Register']['injectionmethods']['addSubForm']['name'] = 'gender';
$c['di']['definitions']['builder']['CoreAuth\Form\User\Register']['injectionmethods']['addSubForm']['order'] = -1;
// HACK
$c['di']['instance']['CoreAuth\Form\User\Register']['parameters']['form'] = $c['di']['definitions']['builder']['CoreAuth\Form\User\Register']['injectionmethods']['addSubForm']['form'];
$c['di']['instance']['CoreAuth\Form\User\Register']['parameters']['name'] = $c['di']['definitions']['builder']['CoreAuth\Form\User\Register']['injectionmethods']['addSubForm']['name'];
$c['di']['instance']['CoreAuth\Form\User\Register']['parameters']['order'] = $c['di']['definitions']['builder']['CoreAuth\Form\User\Register']['injectionmethods']['addSubForm']['order'];
$c['di']['instance']['userMapper']['parameters']['modelClass'] = 'AddonUserGender\Model\User';
