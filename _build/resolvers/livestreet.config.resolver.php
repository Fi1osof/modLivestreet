<?php

/*
 * Создаем таблицы в базу данных
 */

if ($object->xpdo) {
    switch ($options[xPDOTransport::PACKAGE_ACTION]) {
        case xPDOTransport::ACTION_INSTALL:
        case xPDOTransport::ACTION_UPGRADE:
            $modx =& $object->xpdo;
            $livestreet_path = $modx->getOption('modLivestreet.livestreet_path');
            // $livestreet_path = $modx->getOption('modLivestreet.core_path', null,$modx->getOption('core_path').'components/modlivestreet/livestreet/');
            
            $config_path = $livestreet_path."config/";
            
            if(!file_exists($config_path) || !is_dir($config_path) ||!is_writable($config_path)){
                return false;
            }
            
            $config_file =  $config_path."config.local.php";
            
            if(!$fo = fopen($config_file, "w+")){
                return false;
            }
            
            $host = $modx->getOption('host');
            $dbname = $modx->getOption('dbname');
            $username = $modx->getOption('username');
            $password = $modx->getOption('password');
            $table_prefix = $modx->getOption('table_prefix')."livestreet_";
            
            $config =<<<DOC
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
            
\$config['db']['params']['host'] = '{$host}'; 
\$config['db']['params']['dbname'] = '{$dbname}'; 
\$config['db']['params']['user'] = '{$username}'; 
\$config['db']['params']['pass'] = '{$password}'; 
\$config['db']['table']['prefix'] = '{$table_prefix}'; 
\$config['path']['offset_request_url'] = '0';        
            

if(!defined('IN_MODX')) return  \$config;

// Если надо, то \$modx можно привязать к самому LiveStreet, но пока мы его просто заглобалим
global \$modx;   



\$config['sys']['cookie']['host'] = \$modx->getOption('session_cookie_domain', null);
\$cookiePath = \$modx->getOption('session_cookie_path', null, '/');
if (empty(\$cookiePath)) \$cookiePath = \$modx->getOption('base_url', null, MODX_BASE_URL);
\$config['sys']['cookie']['path'] = \$cookiePath;

\$config['sys']['cookie']['time'] = \$cookieTime = \$modx->getOption('session_cookie_lifetime');

// Формирует новый УРЛ для LiveStreet-сайта
\$web = preg_replace('/([^:])\/\//', "\$1/",LIVESTREET_WEB.LIVESTREET_URL_PREFIXE);
\$web = preg_replace('/\/+\$/', "", \$web);
\$config['path']['root']['web'] = \$web;

\$server = LIVESTREET_PATH;
\$server = preg_replace('/\/$/', '', \$server);
\$config['path']['root']['server'] = \$server;

// Можно задать новый префикс для кеша, но не обязательно. 
\$config['sys']['cache']['prefix'] = \$modx->getOption('modLivestreet.cache_prefix', null, 'modlivestreet_cache');

// Another skin
\$skin = \$modx->getOption('modLivestreet.template', null);
if(!\$skin){
    \$skin = 'synio';
}
\$config['view']['skin']        = \$skin;  // шаблон(скин)

// Можно взять название сайта из MODX
\$config['view']['name']        = \$modx->getOption('site_name', null);                   // название сайта
\$config['view']['description'] = \$modx->getOption('modLivestreet.site_description', null, '');

return \$config;
?>
DOC;
            if(!fwrite($fo, $config)){
                return false;
            }
            $fo ? fclose($fo) : "";
            break;
    }
}
return true;
?>
