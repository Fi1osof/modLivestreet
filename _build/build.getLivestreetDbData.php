<?php

/*
 * Собираем все данные из LS
 */
print '<pre>';
require_once dirname(__FILE__). '/build.config.php';

// print_r($sources);

$sqlPath = $sources['model']."sql/";

$cacheOptions = array(
    'cache_path' => $sqlPath,
);

$queries = array();

/*if($modx->cacheManager->set('sql', $var, 0, $cacheOptions)){
    print 'yes';
}
else print 'no';

exit;*/
$modelPath = $sources['model'];
// $modx->addPackage('livestreet', $sources['build'].'schema/model/' );
$modx->addPackage('livestreet',  $modelPath);

//  $livestreetSchemaPath = $sources['build'].'schema/model/livestreet.mysql.schema.xml';
$livestreetSchemaPath = $modelPath.'/livestreet.mysql.schema.xml';
print $livestreetSchemaPath;
$schema = simplexml_load_file($livestreetSchemaPath);

// print_r($schema);
// exit;
// Собираем все данные Livestreet

function createDataSQL($class, &$array, $limit = 300, $offset){
    global $modx;
    if(!isset($offset)){
        return false;
    }
        
    $q = $modx->newQuery($class);
    $q->select(array(
        "{$class}.*"
    ));
    $q->limit($limit, $offset);
    
    if(!$q->prepare()){
        return false;
    }
    
    // print $q->toSQL();
    if(!$q->stmt->execute()){
        return false;
    }
    
    $result = $q->stmt->FetchAll(PDO::FETCH_ASSOC);
    
    // print_r($data);
    if(!$result || !count($result)){
        return false;
    }
    if($offset == 0){
        // print_r($result);
        if(!$record = $result[0]){
            return;
        }

        $fields = array();
        foreach($record as $f => $val){
            $fields[] = "`{$f}`";
        }
        $array['fields'] =  implode(", ", $fields);
    }
    
    
    $data = array();
    foreach($result as $row){
        $d = array();
        foreach(array_values($row) as $value){
            $d[] = "'". mysql_escape_string($value) ."'";
        }
        $str  = "(". implode(', ', $d) . ")";
        $data[] = $str;
    }
    if(!$data){
        return;
    }
    $array['records'][] = $data;
    
    /*if(count($array['records']) > 10){
        // print_r($array);
        // print "s222222dfdf";
        // exit;
    }*/
    
    $offset += $limit;
    createDataSQL($class, $array, $limit, $offset);
    
    return;
}

foreach($schema->object as $object){
    $attributes = $object->attributes();
    $class =  (string)$attributes['class'] ;
    if(!$class){
        continue;
    }
    print "<br />Class: {$class}";
    $queries[$class] = array(
        'fields'    => '',
        'records'   => array(),
    );
    
    createDataSQL($class, $queries[$class], 300, 0);
    
    
    // $data = $modx->getCollection($class);
    // print "<br />df";
    // exit;
}

$object = current($queries);
print "<br />".count($object['records']);
print "<br />".count($object['records'][0]);

// print_r($queries);

if($modx->cacheManager->set('sql', $queries, 0, $cacheOptions)){
    print 'yes';
}
else print 'no';

?>
