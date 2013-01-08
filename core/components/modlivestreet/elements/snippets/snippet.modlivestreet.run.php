<?php

if($request_uri){
	$_SERVER['REQUEST_URI'] = $request_uri;

	if(preg_match('/\?(.+)(\#|$)/', $request_uri, $match)){
		$params_str = $match[1];
		$params = array();
		$params_array = (array)explode('&', $params_str);

		foreach($params_array as $param){
			if(!$param)continue;

			if($pos = strpos($param,'=')){
				$params[substr($param,0,$pos)] = substr($param, $pos+1);
			}
			else{
				$params[$param] = null;
			}
		}
		$_REQUEST = array_merge($_REQUEST, $params);
		$_GET = array_merge($_GET, $params);
	}
}
ob_start();
    @include $modx->getOption('modLivestreet.livestreet_path').$modx->getOption('modLivestreet.index_file'); 
    $output = ob_get_contents();
ob_end_clean();

// Очищаем амперсанты в экранах тегов MODX
$in = array('&amp;#91;', '&amp;#93;', '&amp;\#91;', '&amp;\#93;');
$out = array('&#91;', '&#93;', '&amp;#91;','&amp;#93;');
$output = str_replace($in, $out, $output);

if($parseOutput == '1'){
    $maxIterations= intval($modx->getOption('parser_max_iterations', null, 10));
    $modx->parser->processElementTags('', $output, true, false, '[[', ']]', array(), $maxIterations);
    $modx->parser->processElementTags('', $output, true, true, '[[', ']]', array(), $maxIterations);
}

return $output;