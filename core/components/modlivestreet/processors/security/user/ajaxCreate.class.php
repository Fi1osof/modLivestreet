<?php

$file = MODX_PROCESSORS_PATH.'security/user/create.class.php';  
if(!file_exists($file)){
    class modLivestreetUserCreateErrorProcessor extends modProcessor {
        public function process() {
            $err = 'processor security/user/create not found';
            $this->modx->log(modX::LOG_LEVEL_ERROR, $err);
            return $this->failure($err);
        }
    }
    return 'modLivestreetUserCreateErrorProcessor';
}

require_once $file;

class modLivestreetUserCreateProcessor extends modUserCreateProcessor {
    public $permission = '';
}
return 'modLivestreetUserCreateProcessor';
