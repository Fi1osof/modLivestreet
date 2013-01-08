<?php

$config=array();

  
if(!defined('MODX_API_MODE')){
    return $config;
}

Config::Set('router.page.modx', 'PluginModLivestreet_ActionIndex');
Config::Set('router.page.modx_custom', 'PluginModLivestreet_ActionCustom');

// Вывод Активности
Config::Set('router.page.modx_stream', 'PluginModLivestreet_ActionStream');
 
// Активация аккаунта
if(strpos($_SERVER['REQUEST_URI'], '/registration/activate/') === 0){
    Config::Set('router.page.registration', 'PluginModLivestreet_ActionRegistration');
}

// Инициализация для шаблонов MODX
// Дефолтовая страница с сайдбаром
Config::Set('block.rule_modx_block', array(
	'action'  => array(
        'modx' => array(
            'index'
        )
	),
	'blocks'  => array(
			'right' => array('stream'=>array('priority'=>100),'tags'=>array('priority'=>50),'blogs'=>array('params'=>array(),'priority'=>1))
		),
	'clear' => false,
));


  
return $config;

?>