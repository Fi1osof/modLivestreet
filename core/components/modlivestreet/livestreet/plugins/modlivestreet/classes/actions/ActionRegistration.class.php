<?php

class PluginModLivestreet_ActionRegistration extends ActionRegistration{
    
    /**
     * Обрабатывает активацию аккаунта
    */
    
    protected function EventActivate(){ 
        
        /*if(parent::EventActivate() == 'next'){
            return 'next';
        }
        else $this->SetTemplate('actions/ActionRegistration/activate.tpl');*/
        
        $bError=false;
	/**
	 * Проверяет передан ли код активации
	 */
	$sActivateKey=$this->GetParam(0);
	if (!func_check($sActivateKey,'md5')) {
		$bError=true;
	}
	/**
	 * Проверяет верный ли код активации
	 */
	if (!($oUser=$this->User_GetUserByActivateKey($sActivateKey))) {
		$bError=true;
	}
	/**
	 *
	 */
	if ($oUser and $oUser->getActivate()) {
		$this->Message_AddErrorSingle($this->Lang_Get('registration_activate_error_reactivate'),$this->Lang_Get('error'));
		return Router::Action('error');
	}
	/**
	 * Если что то не то
	 */
	if ($bError) {
		$this->Message_AddErrorSingle($this->Lang_Get('registration_activate_error_code'),$this->Lang_Get('error'));
		return Router::Action('error');
	}
	/**
	 * Активируем
	 */
	$oUser->setActivate(1);
	$oUser->setDateActivate(date("Y-m-d H:i:s"));
	/**
	 * Сохраняем юзера
	 */
	if ($this->User_Update($oUser)) {
		$this->DropInviteRegister();
		$this->Viewer_Assign('bRefreshToHome',true);
		$this->User_Authorization($oUser,false);
	} else {
		// $this->Message_AddErrorSingle($this->Lang_Get('system_error'));
		return Router::Action('error');
	}
        
        $this->SetTemplate('actions/ActionRegistration/activate.tpl');
    }
    
    
    function User_Update($oUser){
        global $modx;
        if(!defined('MODX_API_MODE') || !$modx || $modx->getOption('modLivestreet.sync_users') != true){
            if(parent::User_Update($oUser)){
                return true;
            }
            else{
                $this->Message_AddErrorSingle($this->Lang_Get('system_error'));
                return false;
            }
        } 
        
        // Получаем емейл текущего пользователя
        if(!$email = $oUser->getMail()){
            return $this->Message_AddError( "Не был получен емейл пользователя" ,$this->Lang_Get('error'));
        }
        
        // Пытаемся получить пользователя MODX
        $q = $modx->newQuery('modUser');
        $q->select(array('modUser.*', 'up.*'));
        $q->innerJoin('modUserProfile', 'up', 'up.internalKey = modUser.id');
        $q->where(array(
            'up.email' => $email,
        ));
        $users = $modx->getCollection('modUser',  $q);
        
        // Если ни одного пользователя
        if(count($users) == 0){
            return $this->Message_AddError( "Не был получен пользователь MODX" ,$this->Lang_Get('error'));
        }
        
        // Если более одного (в MODX может быть разрешено несколько аккаунтов с одним емейлом держать)
        else if(count($users) > 1){
            return $this->Message_AddError( "Было получено более чем один пользователь MODX" ,$this->Lang_Get('error'));
        }
        else{
            $user = current($users);
            // Если пользователь не активный, пытаемся его активировать
            if($user->get('active') != '1'){
                $user->set('active', 1);
                if(!$user->save()){
                    return $this->Message_AddError( "Не удалось обновить пользователя MODX" ,$this->Lang_Get('error'));
                }
            }
            $loginContext = $modx->context->key;
            $user->addSessionContext($loginContext);
            return parent::User_Update($oUser);
        }
        return true;
    }
    
}
?>
