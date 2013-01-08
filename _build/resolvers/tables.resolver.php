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
            $model_path = $core_path.'model/';
            $sql_path = $model_path.'sql/';
            $cacheOptions = array(
                'cache_path' => $sql_path,
            );
            
            // Получаем объект с данными
            if($sql_object = $modx->cacheManager->get('sql', $cacheOptions)){
                // Подключаем package
                $prefix = $modx->config[xPDO::OPT_TABLE_PREFIX]; 
                $modx->addPackage('livestreet', $model_path, $prefix);
                foreach($sql_object as $class => $data){
                    //  print "<br />Class: {$class}";
                    // Создаем таблицу
                    $manager->createObjectContainer($class);
                    
                    $tableName = $modx->getTableName($class);
                    // print "<br />". $tableName;
                    
                    foreach($data['records'] as $record){
                        $sql = "INSERT IGNORE INTO {$tableName} ({$data['fields']}) VALUES ". implode (",\n", $record).";";
                        $modx->exec($sql); 
                    }
                }
            }
            
            /*$modx =& $object->xpdo;
            $modelPath = $modx->getOption('quip.core_path',null,$modx->getOption('core_path').'components/quip/').'model/';
            $modx->addPackage('quip',$modelPath);

            $manager = $modx->getManager();
            $modx->setLogLevel(modX::LOG_LEVEL_ERROR);
            $manager->createObjectContainer('quipThread');
            $manager->createObjectContainer('quipComment');
            $manager->createObjectContainer('quipCommentNotify');
            $manager->createObjectContainer('quipCommentClosure');
            $modx->setLogLevel(modX::LOG_LEVEL_INFO);*/
            break;
    }
}
return true;
?>
