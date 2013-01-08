<?php

$pkg_name = 'modLivestreet';
    
/* define package */
define('PKG_NAME', $pkg_name);
define('PKG_NAME_LOWER',strtolower(PKG_NAME));

print '<pre>';
require_once dirname(__FILE__). '/build.config.php';
require_once dirname(__FILE__).'/build.transport.class.php';
  

define('PKG_VERSION', '0.5.6'); 
define('PKG_RELEASE', 'rc'); 

//print_R($modx->config);
//exit;
$builder = new modLivestreetBuilder($modx, $sources); 

$builder->build();

$builder->pack();
?>
