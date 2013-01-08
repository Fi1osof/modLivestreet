<?php
// if not in sync mode
if($modx->getOption('modLivestreet.sync_users') == true){
	define('LIVESTREET_DO_NOT_SYNC_LOGOUT', true);
	$modx->runProcessor('security/logout');
}

return $modx->runSnippet('modLivestreet.run', array('parseOutput' => '1'));