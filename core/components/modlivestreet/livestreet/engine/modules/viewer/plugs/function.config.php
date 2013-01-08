<?php
/**
 * Smarty plugin
 *
 * @package Smarty
 * @subpackage PluginsFunction
 */


function smarty_function_config($params, & $smarty)
{   
    if(!isset($params['name']) OR !$name = $params['name']){return;}
    $assign = false;
    if(isset($params['assign']) && $params['assign']){
        $assign = (string)$params['assign'];
    }
    $output = $smarty->modx->getOption($name, null);
    return $assign ?   $smarty->assign($assign, $output) : $output;
}

?>