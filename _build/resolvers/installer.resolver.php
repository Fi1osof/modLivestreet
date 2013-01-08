<?php

/*
 * Создаем таблицы в базу данных
 */

if ($object->xpdo) {
    switch ($options[xPDOTransport::PACKAGE_ACTION]) {
        case xPDOTransport::ACTION_INSTALL:
        case xPDOTransport::ACTION_UPGRADE:
            $modx =& $object->xpdo;
            $manager = $modx->getManager();
            $core_path = $modx->getOption('modLivestreet.core_path', null,$modx->getOption('core_path').'components/modlivestreet/');
            $install_path = $core_path.'livestreet/';
            
            // Update files if this is not system directory
            if($path = $modx->getOption('modLivestreet.livestreet_path', null, false) AND $install_path != $path AND is_dir($path)){ 
                $modx->cacheManager->copyTree($install_path.'classes/', $path.'classes/');
                $modx->cacheManager->copyTree($install_path.'engine/', $path.'engine/');
                $modx->cacheManager->copyTree($install_path.'plugins/', $path.'plugins/');
                $modx->cacheManager->copyTree($install_path.'templates/', $path.'templates/');
            }
            
            break;
    }
}
return true;
?>
