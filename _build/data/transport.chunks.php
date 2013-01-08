<?php
global  $modx, $sources;

$chunks = array();


$chunk = $modx->newObject('modChunk', array(
    'name'          =>  'modLivestreet.html_head_begin',
    'description'   => 'Выводится в заголовок документов Livestreet',
    'snippet'       => getSnippetContent($sources['source_core'].'/elements/chunks/html_head_begin.chunk.html'),
));
$chunks[] = $chunk;
 

return $chunks;
