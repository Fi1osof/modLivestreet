<?php
/*
 * Synchronized registration MODX and Livestreet users
 */
switch($modx->event->name){

    case 'OnBeforeUserFormSave':
		// Registration
        switch($scriptProperties['mode']){
            // Register new user
            case 'new':
				// if not in sync mode
                if($modx->getOption('modLivestreet.sync_users') != true){
                    return;
				}
                // check password method
                if($scriptProperties['data']['passwordgenmethod'] == 'g'){
                    $len = $modx->getOption('password_generated_length',null,8);

                    $password = $password_confirm = modUserValidation::generatePassword($len);
                    
                    /*
                     * note then newPassword in createProcessor will not be overwrited !!!
                     * in backend will see wron new passrowd
                     */
                    $scriptProperties['user']->set('password', $password); 
                }
                else{
                    $password = $scriptProperties['data']['specifiedpassword'];
                    $password_confirm = $scriptProperties['data']['confirmpassword'];
                }

                $_REQUEST['password'] = $password;
                $_REQUEST['password_confirm'] = $password_confirm;

                $_REQUEST['login'] = $scriptProperties['data']['username'];
                $_REQUEST['mail'] = $scriptProperties['data']['email']; 

                if($modx->context->key == 'mgr'){
                       $captcha = time();
                       $_SESSION['captcha_keystring'] = $captcha;
                       $_REQUEST['captcha'] = $captcha;

                       $_SESSION['user_id'] = '';

                       $_REQUEST['security_ls_key'] =  md5( session_id(). $modx->getOption('modLivestreet.module.security.hash', null, 'livestreet_security_key'));
                }


                $response = $modx->runSnippet('modLivestreet.run', array(
                        'request_uri' => $modx->getOption('modLivestreet.registration_url')
                ));


                $response =  json_decode($response);
                
                if(!is_object($response)){
                	$modx->event->output('Ошибка выполнения запроса');
					return;
                }
                elseif(isset($response->aErrors) && $response->aErrors){ 
                    $errors = '';
                    $errors__ = array();
                    foreach((array)$response->aErrors as $f => $val){
                        $errors .= "$f:: ". $val[0]."\n";
                    }
                    $modx->event->_output = $errors; 
                }
				else{
                    // Все ОК
                    // Если по настройкам Livestreet разрешено пользователям сразу быть авторизованными
                    // и пользователь уже авторизован, то активируем и авторизовываем и текущего пользователя
                    if(defined('LS_VERSION') && class_exists('Config')){
                        if(!Config::Get('general.reg.activation') 
                            && isset($_SESSION['user_id']) 
                            && $_SESSION['user_id'] != ''
                        ){
                            $scriptProperties['user']->set('active', '1');  
                            $scriptProperties['user']->set('doLogin', '1'); 
                        }
                    }
		}
                return;
                break;
            default:;
        }
        break;

	// OnUserFormSave
	case 'OnUserFormSave':
            switch($scriptProperties['mode']){
                case 'new':
                    // If neccessary to Login
                    if($modx->context->key != 'mgr' 
                        && $scriptProperties['user']->get('doLogin') == '1'
                    ){
                        $loginContext =  $modx->context->key;   
                        $scriptProperties['user']->addSessionContext($loginContext);
                        $_SESSION['modx.' . $loginContext . '.session.cookie.lifetime'] = Config::Get('sys.cookie.time');
                    }
                break;
                default:;
            }
            break;

	// onBeforeLogin
	case 'OnBeforeWebLogin':
            // try Livestreet login
            // if not in sync mode
            if($modx->getOption('modLivestreet.sync_users') != true){
		$modx->event->_output = true;
                return;
            }
            $_REQUEST['login'] = $scriptProperties['username'];
            $_REQUEST['password'] = $scriptProperties['password'];
            $_REQUEST['remember'] = (bool)$scriptProperties['attributes']['rememberme'] == true;

            if($modx->context->key == 'mgr' || !defined('LIVESTREET_PROCESS_AJAX_LOGIN')){
                $_REQUEST['security_ls_key'] =  md5( session_id(). 
                $modx->getOption('modLivestreet.module.security.hash', null, 'livestreet_security_key'));
            }

            $response = $modx->runSnippet('modLivestreet.run', array(
                    'request_uri' => $modx->getOption('modLivestreet.login_url')
            ));

            $response =  json_decode($response);


            if(!is_object($response)){
                $modx->event->output('Ошибка выполнения запроса');
				return;
            }
            elseif(isset($response->bStateError) && $response->bStateError){
		$modx->event->_output = ($response->sMsg ? $response->sMsg : 'Ошибка выполнения запроса');
		return ;
            }

            $headers = headers_list();
            for($x = count($headers)-1; $x>=0; $x--){
                $header = $headers[$x];
                if(preg_match('/Set-Cookie: *key\=/',$header)){
                    define('LIVESTREET_COOKIE_KEY', $header);
                    break;
                }
            }
            // Временно убиваем ключ сессии Livestreet,
            // чтобы авторизация в LS пока слетела, и мы ее восстановили бы только
            // в случае успешной авторизации в MODX
			//  print '<pre>Cookie:';
			//  print_r($_COOKIE);
			if(isset($_SESSION['user_id']) && $_SESSION['user_id'] != ''){
                    define('LIVESTREET_SESSION_USER_ID', $_SESSION['user_id']);
                    $_SESSION['user_id'] = '';
            }

            // Убиваем сессию
            setcookie('key','',1, '/' , $modx->getOption('session_cookie_domain', null, ''));


	// It`s neccessary for indicate that all OK
	$modx->event->_output = true;
	break;

	// onLogin
	case 'OnWebLogin':
            if($modx->getOption('modLivestreet.sync_users') != true){
                return;
            }
            
            if(!defined('LS_VERSION') || !class_exists('Config')){
                return;
            }
            
            if(defined('LIVESTREET_SESSION_USER_ID')){
                $_SESSION['user_id'] = LIVESTREET_SESSION_USER_ID;
            }

            if(defined('LIVESTREET_COOKIE_KEY')){
                    $key =  null;
                    $expires = 0;
                    $path = null;
                    $domain = null;

                    if(preg_match('/key=(.+?)(;|$)/', LIVESTREET_COOKIE_KEY, $match)){
                            $key = $match[1];
                    }

                    if(preg_match('/expires=(.+?)(;|$)/', LIVESTREET_COOKIE_KEY, $match)){
                            $expires = strtotime($match[1]);
                            if(!$expires){
                                    $expires = time()+Config::Get('sys.cookie.time');
                            }
                    }

                    if(preg_match('/path=(.+?)(;|$)/', LIVESTREET_COOKIE_KEY, $match)){
                            $path = $match[1];
                            if(!$path){
                                    $path = Config::Get('sys.cookie.path');
                            }
                    }

                    if(preg_match('/domain=(.+?)(;|$)/', LIVESTREET_COOKIE_KEY, $match)){
                            $domain = $match[1];
                            if(!$domain){
                                    $domain = Config::Get('sys.cookie.host');
                            }
                    }
                    // Устанавливаемкуку  Livestreet
                    setcookie('key',$key,$expires,$path,$domain);
            }
            break;

	case 'OnBeforeWebLogout':
		if($modx->getOption('modLivestreet.sync_users') != true){
            return;
        }

		if(defined('LIVESTREET_DO_NOT_SYNC_LOGOUT')){
			return;
		}
		$security_key =  $modx->getOption('modLivestreet.module.security.hash', null, 'livestreet_security_key');
		$key =  md5( session_id(). $security_key);

		// &service= - Login snippet recursion fixin
		$request_uri  = $modx->getOption('modLivestreet.logout_url', null, '/login/exit/')."?security_ls_key={$key}&service=";
		//print $request_uri;
		$modx->runSnippet('modLivestreet.run', array(
			'request_uri'  =>  $request_uri)
		);
		break;

    default:$modx->log(modX::LOG_LEVEL_ERROR, "Wrong Event: ". $modx->event->name);
}