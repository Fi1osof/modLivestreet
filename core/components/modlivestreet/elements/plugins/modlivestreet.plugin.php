<?php
/*
 * Important!
 * To be sure then all MODX tags will be removed from $_POST,
 * create web-context bolling setting "allow_tags_in_post" and set value to False
 */
switch($modx->context->key){
	case 'mgr':
            return;
            break;
	default:;
}

switch($modx->event->name){
    // Check static LiveStreet resources requests
    case 'OnHandleRequest':
        // Чтобы подгрузить файл-конфиг livestreet_path/config/
        define('IN_MODX', true); 
        define('LIVESTREET_WEB', $modx->getOption('modLivestreet.site_url', null, MODX_SITE_URL));
        define('LIVESTREET_PATH', $modx->getOption('modLivestreet.livestreet_path'));
        define('LIVESTREET_INDEX_FILE', $modx->getOption('modLivestreet.index_file'));
        define('LIVESTREET_URL_PREFIXE', $modx->getOption('modLivestreet.url_prefix'));
		$request = false;

        if(!function_exists('clear_post_data')){
                function clear_post_data(&$data){
                    if(is_array($data)){
                        foreach($data as $r_name => &$r_val){
                            clear_post_data($r_val);
                            continue;
                        }
                    }
                    else{
                        $data =  str_replace(array('[', ']', '%5B', '%5D'), array('&#91;', '&#93;', '&#91;','&#93;',), $data);
                    }
                }
        }
        clear_post_data($_SERVER['REQUEST_URI']);
        // Если разрешены MODX-теги в POST, и указано заменять их спецсимволами
        if($modx->getOption('modLivestreet.replaceModxTagsInPost', null, true) && $modx->getOption('allow_tags_in_post', null)){
            
            clear_post_data($_GET);
            $_REQUEST = array_merge($_REQUEST, $_GET);
            
            clear_post_data($_POST);
            $_REQUEST = array_merge($_REQUEST, $_POST);
	}

        // Определяем есть ли запрос на LiveStreet
        if($_SERVER['REQUEST_URI'] == LIVESTREET_URL_PREFIXE || $_SERVER['REQUEST_URI']."/" == LIVESTREET_URL_PREFIXE){
            $request = '/';
		}
		else{
				// Если это не раздел LiveStreet, пропускаем
				$preg = str_replace('/', '\/', LIVESTREET_URL_PREFIXE);
	
				if(!preg_match("/^{$preg}/", $_SERVER['REQUEST_URI']."/")){
						return;
				}
				$request = preg_replace("/^{$preg}/", '', $_SERVER['REQUEST_URI']);
	
		}
        if( substr( $request, 0, 1) != '/')  $request = '/'. $request;   
        
        // Фиксируем запрос на LS
        define('LIVESTREET_REQUEST_URI', $request);  
        // Проверяем статус сайта, чтобы не отдавать контент, если сайт закрыт
        if(!$modx->checkSiteStatus()){
                return;
        }
        
        $file = LIVESTREET_INDEX_FILE;
        // Проверяем на обращение к директории LiveStreet
	/*
		if able, config your server rewrite rules

		1) for templates static files
		location /templates/{
			root   /www/comm2.modx-cms.ru/public_html;
			access_log   off;
			expires      30d;
		}

		2) for /engine/lib/external/html5shiv.js and other scripts
		location ~/engine/.*\.js{
			root   /www/comm2.modx-cms.ru/public_html;
			access_log   off;
			expires      30d;
		}
	*/
        $preg = str_replace('/', '\/', "(/plugins/|/templates/|/uploads/|/engine/lib/external/jquery|/engine/.*(\.js|\.css|\.swf))");
        
        if(preg_match("/^{$preg}/", LIVESTREET_REQUEST_URI)){
            $file = LIVESTREET_REQUEST_URI; 
            $file = preg_replace('/\?+.*/', '', $file);
            $pi = pathinfo( $file);
            $ext = $pi['extension'];
            $allowed_exts = explode(",", $modx->getOption('upload_files', null));
            $allowed_exts = array_merge($allowed_exts, array('swf', 'xls'));
            
            if(!in_array(strtolower($ext), $allowed_exts)){
                die('Forbidden');
            }
            $fullpath = str_replace('//','/', LIVESTREET_PATH.$file);
            if(!file_exists($fullpath)){
                die('File Not Found');
            }

            $fsize = filesize($fullpath); 
            switch ($ext) {
                case "css": $ctype="text/css; charset=utf-8"; break;
                case "js": $ctype="application/x-javascript; charset=utf-8"; break;
                case "pdf": $ctype="application/pdf"; break;
                case "exe": $ctype="application/octet-stream"; break;
                case "zip": $ctype="application/zip"; break;
                case "doc": $ctype="application/msword"; break;
                case "xls": $ctype="application/vnd.ms-excel"; break;
                case "ppt": $ctype="application/vnd.ms-powerpoint"; break;
                case "swf": $ctype="application/x-shockwave-flash"; break;
                case "gif": $ctype="image/gif"; break;
                case "png": $ctype="image/png"; break;
                case "jpeg":
                case "jpg": $ctype="image/jpg"; break;
                default: $ctype="application/force-download";
            } 
            header("Content-type: {$ctype}", true);  
            header("Content-Length: ".$fsize);
            header("last-modified: ". gmdate("d, d m y h:i:s", filemtime($fullpath) )." GMT"); 
            header("Pragma: public");  
            header("Expires: 0");  
            readfile($fullpath); 
            exit;
        }
        
        /* 
        * Определяем надо ли какой-нибудь модуль запускать
        */
        // Каптча
        $preg = str_replace('/', '\/', "/engine/lib/external/kcaptcha/");
        if(preg_match("/^{$preg}/", LIVESTREET_REQUEST_URI)){
            $file = 'engine/lib/external/kcaptcha/index.php'; 
            require_once LIVESTREET_PATH.$file;
            exit;
        }
        
        /*
         * Search
         */
        if(preg_match("/^\/search\/.*\?q=(.*)/", LIVESTREET_REQUEST_URI, $match)){
            if(!$modx->resource){
                $modx->resource = $modx->newObject('modResource', array(
                    'cacheable' =>  false,
                ));
            }
            $q = urldecode($match[1]);
            $_GET['q'] = $q;
            $_REQUEST['q'] = $q;
            print $modx->runSnippet('modLivestreet.run', array('parseOutput' => '1'));
            exit;
        }

        break;

    case 'OnPageNotFound':
        if(isset($modx->resource) && is_object($modx->resource)){return;}
        
        // if not LiveStreet request, stop
        if(!defined('LIVESTREET_REQUEST_URI')){
            return;
        }

        if($modx->getOption('modLivestreet.active', null, false) != true) return;
        
        $_SERVER['REQUEST_URI'] = LIVESTREET_REQUEST_URI;

		// It`s neccessary fo BreadCrumbs and etc.
        if(!$modx->resource){
            $modx->resource = $modx->newObject('modResource', array(
                'cacheable' =>  false,
            ));
        }

	// Registration
	if(strpos(LIVESTREET_REQUEST_URI, $modx->getOption('modLivestreet.registration_url', null, '/registration/ajax-registration/')) === 0){ 
		// if not in sync mode
		if($modx->getOption('modLivestreet.sync_users') == true){
			print $modx->runSnippet('modLivestreet.ajax-registration');
			exit;
		}
	}

	// Login
	elseif(strpos(LIVESTREET_REQUEST_URI, $modx->getOption('modLivestreet.login_url', null, '/login/ajax-login/')) === 0){ 
		// if not in sync mode
		if($modx->getOption('modLivestreet.sync_users') == true){
			print $modx->runSnippet('modLivestreet.ajax-login');
			exit;
		}
	} 

	// Logout
	elseif(strpos(LIVESTREET_REQUEST_URI, $modx->getOption('modLivestreet.logout_url', null, '/login/exit/')) === 0 ){ 
		// if not in sync mode
		if($modx->getOption('modLivestreet.sync_users') == true){
			print $modx->runSnippet('modLivestreet.ajax-logout');
			exit;
		}
	}


        print $modx->runSnippet('modLivestreet.run', array('parseOutput' => '1'));
        exit;

        break;
        
    default:;
}