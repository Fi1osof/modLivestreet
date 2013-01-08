<?php

error_reporting(E_ALL ^E_NOTICE);

ini_set('display_errors', 1);

$pkg_name = 'modLivestreet';
    
/* define package */
define('PKG_NAME', $pkg_name);
define('PKG_NAME_LOWER',strtolower(PKG_NAME));

print '<pre>';
require_once dirname(__FILE__). '/build.config.php';
require_once dirname(__FILE__).'/build.transport.class.php';
  

define('PKG_VERSION', '0.6.0'); 
define('PKG_RELEASE', 'rc'); 

//print_R($modx->config);
//exit;
$builder = new modLivestreetBuilder($modx, $sources); 

$builder->build();

$builder->pack();
?>
