<?php

class PluginModlivestreet_HookModLivestreetSettingsAccountSaveBefore extends Hook{
    public function RegisterHook() { 
        // При редактировании топика выводим реплейсинг MODX-тегов
        $this->AddHook('settings_account_save_before', 'settings_account_save_before');
    }
    
    function settings_account_save_before($params){
        if($params['bError']){
            return;
        }
        
        if(!defined('MODX_API_MODE')){
            return;
        }
        global $modx; 
        
        $password = getRequest('password','');
         
        $user = $modx->user;
         
        // Если меняется пароль
        if ($password = getRequest('password','') AND $password != '') {
            if($modx->getOption('modLivestreet.sync_users') != true){
                    return;
            }
            if($user->get('id') < 1){
                $this->Message_AddError("MODX-пользователь не найден. Вероятно требуется повторная авторизация. Если ошибка повторится, обратитесь к администрации сайта." ,$this->Lang_Get('error'));
                $params['bError'] = true;
                return;
            }
            $path = $modx->getObject('modNamespace', array(
                    'name' =>  'modLivestreet'
            )) -> getCorePath()."processors/";
            
            $response = $modx->runProcessor('security/user/update', array(
                    'id'	=> $user->get('id'),
                    'username' 	=> $user->get('username'),
                    'email'	=> $_POST['mail'],
                    'passwordnotifymethod' => 'false',
                    'passwordgenmethod' => 'false',
                    'newpassword'       => $password,
                    'specifiedpassword'	=> $password,
                    'confirmpassword'	=> $password,
            ), array(
                    'processors_path' => $path
            ));
            
            if($response->isError()){
                $params['bError'] = true;
                if($error = $response->getMessage()){
                    $this->Message_AddError($error ,$this->Lang_Get('error')); 
                }
                foreach((array)$modx->error->errors as $err){
                    if($msg = $err['msg']){
                        $this->Message_AddError($msg ,$this->Lang_Get('error')); 
                    }
                }
            }
            return;
        }
    }
}
?>
