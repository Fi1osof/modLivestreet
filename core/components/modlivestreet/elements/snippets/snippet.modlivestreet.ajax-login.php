<?php
// if not in sync mode
if($modx->getOption('modLivestreet.sync_users') != true){
	return;
}

define('LIVESTREET_PROCESS_AJAX_LOGIN', true);

$response = $modx->runProcessor('security/login', array(
	'username' 	=> $_POST['login'],
	'password'	=> $_POST['password'],
	'rememberme'=> $_POST['remember'],
));

$bStateError = false;
$sMsgTitle = null;
$sMsg = null;
$errors = array();

if($response->isError()){
    $errorsArray = (array)$modx->error->errors;
    // processEventResponse
    // $error = $response->getMessage();
    if($errMessageArr = (array)explode("\n", $response->getMessage())){
        foreach($errMessageArr as $message){
            if(!$message = trim($message))continue;
            if(!$errArr = explode('::', $message) OR  count($errArr) != 2){
                    $sMsg = $message;
            }
            else{
                $errorsArray[] = array(
                    'id' => $errArr[0],
                    'msg'	=> $errArr[1],
                ); 
            }
        }
    }  

    foreach($errorsArray as $err){
        // LiveStreet Errors
        if($name = $err['id']){
            switch($name){
                case 'username':
                    $name =  'login';
                    break;
                case 'specifiedpassword':
                    $name = 'password';
                    break;
                case 'confirmpassword':
                    $name = 'password_confirm';
                    break;
                default: continue;
            }
            $errors[$name][0] = $err['msg'];
        }
        // MODX errors
        else{
            $sMsg = current($err);
        }
    }

    if(!$errors && !$sMsg){
            $sMsg = 'Ошибка выполнения запроса';
    }
    if($sMsg){
        $sMsgTitle = 'Error';
        $bStateError = true;
    }
    $response = array(
        'sMsgTitle' => $sMsgTitle,
        'sMsg'	=> $sMsg,
        'bStateError'	=> $bStateError,
        'aErrors'	=> $errors
    );
}
else{
    // Success
    $response = array(
        'sMsgTitle' => null,
        'sMsg'	=> 'Поздравляем! Вы успешно авторизовались!',
        'bStateError'	=> false,
        'sUrlRedirect' => $_POST['return-path'],
    );
}
// print_r($response);
return json_encode($response);