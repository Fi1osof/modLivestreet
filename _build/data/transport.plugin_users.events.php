<?php
/**
 * @package bannery
 * @subpackage build
 */
global  $modx, $sources;

$events = array();

$events['OnBeforeUserFormSave']= $modx->newObject('modPluginEvent');
$events['OnBeforeUserFormSave']->fromArray(array(
    'event' => 'OnBeforeUserFormSave',
    'priority' => 0,
    'propertyset' => 0,
),'',true,true);

$events['OnUserFormSave']= $modx->newObject('modPluginEvent');
$events['OnUserFormSave']->fromArray(array(
    'event' => 'OnUserFormSave',
    'priority' => 0,
    'propertyset' => 0,
),'',true,true);

$events['OnBeforeWebLogin']= $modx->newObject('modPluginEvent');
$events['OnBeforeWebLogin']->fromArray(array(
    'event' => 'OnBeforeWebLogin',
    'priority' => 0,
    'propertyset' => 0,
),'',true,true);

$events['OnWebLogin']= $modx->newObject('modPluginEvent');
$events['OnWebLogin']->fromArray(array(
    'event' => 'OnWebLogin',
    'priority' => 0,
    'propertyset' => 0,
),'',true,true);

$events['OnBeforeWebLogout']= $modx->newObject('modPluginEvent');
$events['OnBeforeWebLogout']->fromArray(array(
    'event' => 'OnBeforeWebLogout',
    'priority' => 0,
    'propertyset' => 0,
),'',true,true);

return $events;