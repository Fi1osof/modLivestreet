<?php

// exit();
print '<pre>';
// Подгружаем основной файл-конфиг сайта или самим придется прописывать все основные настройки
//require_once dirname(dirname(dirname(__FILE__))).'/core/config/config.inc.php';
// require_once  dirname(dirname(dirname(__FILE__))).'/core/config/config.inc.php';
require_once dirname(dirname(__FILE__)).'/build.config.php';

// Подружаем основной  класс MODx
include_once MODX_CORE_PATH . 'model/modx/modx.class.php';

// Инициализируем класс MODx
// $modx= new modX();
// $modx->initialize('mgr');

/*if(!$modx->hasPermission('createSchema')){
	die('Not found');
}*/

/*******************************************************/
/* Конфиги нашей схемы                                 */
/*******************************************************/

// Имя Класса. Так будет потом называться Класс при вызове $modx->loadClass()
$obj = 'livestreet';		


// print_r($sources);
// exit;
/*
Префикс таблиц. Если префикс не отличается от системного, то можно вообще не указывать.
К сожалению, xPDO при генерации не позволяет перечислять имена конкретных таблиц,
которые нам нужны, а позволяет отсеять только по префиксу.
*/
$tablePrefix='mx_livestreet_';

// Папка, где будет записана XML-схема и все файлы создаваемого объекта
// Путь к файлам класса вы будете потом прописывать в вызове метода $modx->loadClass();
// $Path = dirname(__FILE__).'/model/';
$Path = $sources['model'];

// Файл-схема
$Schema = $Path.'/'.$obj.'.mysql.schema.xml';

/*******************************************************/




// Инициализируем контекст, если принципиально
// $modx->initialize('mgr');
 
// Устанавливаем настройки логирования
// Не обязательно
$modx->setLogLevel(modX::LOG_LEVEL_INFO);
$modx->setLogTarget(XPDO_CLI_MODE ? 'ECHO' : 'HTML');

// !!! Обязательно!
// Подгружаем основной класс-пакер
$modx->loadClass('transport.modPackageBuilder', '', false, true);

// Указатель типа базы данных (MySQL / MsSQL и т.п.)
$manager = $modx->getManager();

// Класс-генератор схем
$generator = $manager->getGenerator();


// Генерируем файл-XML
// /xpdo/om/mysql/xpdogenerator.class.php
// public function writeSchema($schemaFile, $package= '', $baseClass= '', $tablePrefix= '', $restrictPrefix= false)
// $tablePrefix  - указываем, если хотим только те таблицы, которые начинаются с этого префикса.
// $restrictPrefix - указывает true, если хотим получить таблицы только по префиксу
$xml= $generator->writeSchema($Schema,  $obj, 'xPDOObject', $tablePrefix ,$restrictPrefix=true , $originalPrefix = true );

// Создает классы и мапы (php) по схеме xml
if(!$generator->parseSchema($Schema, $Path)){
    print "<br  />Error! Схема не была сгенерирована";
    return false;
}

print "<br />Схема сгенерирована успешно";

print "<br /><br />Выполнено";


// Теперь надо собрать все данные Livestreet-а


/*
// Еще не проверено
// Создает таблицу из схемы
// $modx->addPackage('cuz_regions', $Path);
$manager->createObjectContainer('cuz_regions'); // Создать Таблицу modx_kl_cuz_regions

*/