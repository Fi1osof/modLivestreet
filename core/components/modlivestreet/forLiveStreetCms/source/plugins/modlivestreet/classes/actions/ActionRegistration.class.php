<?php

class PluginModLivestreet_ActionRegistration extends ActionRegistration{
    
    protected function EventActivate(){ 
        if(parent::EventActivate() == 'next'){
            return 'next';
        }
        else $this->SetTemplate('actions/ActionRegistration/activate.tpl');
    }
    
    function User_Update($oUser){
        global $modx;
        if(!defined('MODX_API_MODE') || !$modx){
            return parent::User_Update($oUser);
        }
        // print '<pre>';
        
        // Получаем емейл текущего пользователя
        if(!$email = $oUser->getMail()){
            return $this->Message_AddError( "Не был получен емейл пользователя" ,$this->Lang_Get('error'));
        }
        
        // Пытаемся получить пользователя MODX
        $q = $modx->newQuery('modUser');
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
        return;
    }
    
}
?>
