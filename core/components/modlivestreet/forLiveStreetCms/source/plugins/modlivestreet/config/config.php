<?php
/*-------------------------------------------------------
*
*   LiveStreet Engine Social Networking
*   Copyright © 2008 Mzhelskiy Maxim
*
*--------------------------------------------------------
*
*   Official site: www.livestreet.ru
*   Contact e-mail: rus.engine@gmail.com
*
*   GNU General Public License, version 2:
*   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
*
---------------------------------------------------------
*/
$config=array();

  

if(!defined('MODX_API_MODE')){
    return $config;
}



Config::Set('router.page.modx', 'PluginModLivestreet_ActionIndex');

// Активация аккаунта
if(strpos($_SERVER['REQUEST_URI'], '/registration/activate/') === 0){
    Config::Set('router.page.registration', 'PluginModLivestreet_ActionRegistration');
}
 
// Редактирование аккаунта
/*if(strpos($_SERVER['REQUEST_URI'], '/settings/account/') === 0){
    Config::Set('router.page.settings', 'PluginModLivestreet_ActionSettings');
}*/

  
return $config;

?>