<?php
/*
Но это для примера. Правильней, если нужна какая-то кастомная лента активности, то на стороне Livestreet программировать нужный элемент и выводить в шаблон, потому что данный пример вызывает еще одно обращение к движку Livestreet. Хотя можно воткнуть 5-тиминутное кеширование, и все будет ОК.
*/

$output = '';

$key="modlivestreet.streem";

if(!$output = $modx->cacheManager->get($key)){
	$output = $modx->runSnippet('modLivestreet.run', array(
		'request_uri' => '/modx_stream/all/',
	));
	// Сохраняем  5-тиминутный кеш. Можно свое значение поставить
	$modx->cacheManager->set($key, $output, 300);
}

return $output;