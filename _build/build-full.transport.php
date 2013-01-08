<?php

$pkg_name = 'modLivestreet'; 
    
/* define package */
define('PKG_NAME', $pkg_name);
define('PKG_NAME_LOWER',strtolower(PKG_NAME)); 



print '<pre>';
require_once dirname(__FILE__). '/build.config.php';
require_once dirname(__FILE__).'/build-full.transport.class.php';

//print_R($modx->config);
//exit;
$builder = new modLivestreetFullBuilder($modx, $sources);

$builder->build();

$builder->pack();
?>
