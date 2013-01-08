<?php
global  $modx, $sources;

$plugins = array();

$plugins[0] = $modx->newObject('modPlugin');
$plugins[0]->set('id', null);
$plugins[0]->set('name', 'modLivestreet');
$plugins[0]->set('description', 'Перехватывает запросы на LiveStreet');
$plugins[0]->set('plugincode', getSnippetContent($sources['source_core'].'/elements/plugins/modlivestreet.plugin.php'));



//print $sources['source_core'].'/elements/plugins/modlivestreet.plugin.php';
//  exit;

/* add plugin events */
$events = include $sources['data'].'transport.plugins.events.php';
if (is_array($events) && !empty($events)) {
    $plugins[0]->addMany($events, 'PluginEvents');
    $modx->log(xPDO::LOG_LEVEL_INFO,'Packaged in '.count($events).' Plugin Events.'); flush();
} else {
    $modx->log(xPDO::LOG_LEVEL_ERROR,'Could not find plugin events!');
}


$plugins[1] = $modx->newObject('modPlugin');
$plugins[1]->set('id', null);
$plugins[1]->set('name', 'modLivestreet_users');
$plugins[1]->set('description', 'HandleSynchronizeUserWork');
$plugins[1]->set('plugincode', getSnippetContent($sources['source_core'].'/elements/plugins/modlivestreet_users.plugin.php'));

/* add plugin events */
$events = include $sources['data'].'transport.plugin_users.events.php';
if (is_array($events) && !empty($events)) {
    $plugins[1]->addMany($events, 'PluginEvents');
    $modx->log(xPDO::LOG_LEVEL_INFO,'Packaged in '.count($events).' Plugin Events.'); flush();
} else {
    $modx->log(xPDO::LOG_LEVEL_ERROR,'Could not find plugin events!');
}
 

return $plugins;
