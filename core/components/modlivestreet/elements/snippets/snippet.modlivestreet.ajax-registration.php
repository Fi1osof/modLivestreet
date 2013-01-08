<?php
// if not in sync mode
if($modx->getOption('modLivestreet.sync_users') != true){
	return;
}

$path = $modx->getObject('modNamespace', array(
	'name' =>  'modLivestreet'
)) -> getCorePath()."processors/";

$response = $modx->runProcessor('security/user/ajaxCreate', array(
	'username' => $_POST['login'],
	'email'	=> $_POST['mail'],
	'passwordnotifymethod' => 'false',
	'passwordgenmethod' => 'false',
	'specifiedpassword'	=> $_POST['password'],
	'confirmpassword'	=> $_POST['password_confirm'],
), array(
	'processors_path' => $path
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
                    case 'email':
                        $name = 'mail';
                        break;
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
        'sMsg'	=> 'Поздравляем! Регистрация прошла успешно!',
        'bStateError'	=> false,
        'sUrlRedirect' => $_POST['return-path'],
    );
}

return json_encode($response);