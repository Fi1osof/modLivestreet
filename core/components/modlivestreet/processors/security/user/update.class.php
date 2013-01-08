<?php

 
$file = MODX_PROCESSORS_PATH.'security/user/update.class.php';  
if(!file_exists($file)){
    class modLivestreetUserUpdateErrorProcessor extends modProcessor {
        public function process() {
            $err = 'processor security/user/update not found';
            $this->modx->log(modX::LOG_LEVEL_ERROR, $err);
            return $this->failure($err);
        }
    }
    return 'modLivestreetUserUpdateErrorProcessor';
}

require_once $file;

class modLivestreetUserUpdateProcessor extends modUserUpdateProcessor {
    public $permission = '';
}
return 'modLivestreetUserUpdateProcessor';
