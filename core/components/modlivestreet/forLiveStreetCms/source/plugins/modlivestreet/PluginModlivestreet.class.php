<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class PluginModLivestreet extends Plugin{
    public static $modx;
    // Объявление делегирований (нужны для того, чтобы назначить свои экшны и шаблоны)
    public $aDelegates = array(
        // 'action' => array('PluginModLivestreet_ActionSettings'=>'ActionSettings'),
            /**
             * 'action' => array('ActionIndex'=>'_ActionSomepage'),
             * Замена экшна ActionIndex на ActionSomepage из папки плагина
             */
             //'template' => array('index.tpl'=>'___path.static.root___/templates/skin/___view.skin___index.tpl'),
             /* Замена index.tpl из корня скина файлом /plugins/abcplugin/templates/skin/default/my_plugin_index.tpl
             *
             * 'template'=>array('actions/ActionIndex/index.tpl'=>'_actions/ActionTest/index.tpl'),
             * Замена index.tpl из скина из папки actions/ActionIndex/ файлом /plugins/abcplugin/templates/skin/default/actions/ActionTest/index.tpl
             */
            // 'template'=>array('account.tpl'=>'actions/ActionSettings/account.tpl'),


    );
    
    static $aTemplatePath = array();
    
    function Init(){
        global $modx;
        if (!is_object($modx) || !($modx instanceof modX)){
            return;
        }
        self::$modx = & $modx;
        
        // Инициализируем различные действия
        $this->initActions();
    }
    
    // Инициализируем различные действия
    private function initActions(){
        //'settings/account/';
        
        /*print "<pre>";
        print_r(Config::Get('router.page'));
        exit;*/
    }
    
    
    public function RegisterHook() {
        /**
        * Хук для вставки HTML кода
        */
         
        $this->AddHook('template_body_end', 'Profiler');
    }

    /**
    * Выводим HTMLy
    *
    */
    public function Profiler() {
        print "sdfsdf";
        exit;
        return 333333;
        // return $this->Viewer_Fetch(Plugin::GetTemplatePath(__CLASS__).'link.tpl');
    }
}
?>
