<?php


require_once dirname(__FILE__). "/build.transport__.class.php";

class modLivestreetBuilder extends modLivestreetBuilder__{
    
    protected $mediaSources = array();
    
    function build(){
        // print_R($this->sources);
        /*$this->sources['model'];
        require_once $this->sources['build'].'schema/schema_builder.class.php';
        
        $schema_builder = new schema_builder($this->modx);
        $schema_builder->create( 'livestreet', 'mx_livestreet_', $this->sources['model']);
        exit;*/
        
        parent::build();
    }
    
    protected function  addResolves(){
        parent::addResolves();
        
    }
    
    protected function createVehicle(){
        parent::createVehicle();
        // Создаем источники файлов
        $this->createMediaSources();
        
        // Создаем статические ресурсы
        $this->createStaticSources();
        
        // Запаковываем источники файлов
        $this->packMediaSources();
        
        $this->addCreateDBResolves();
        
    }
    
    // Создаем источники файлов
    protected function createMediaSources(){
        //modlivesreet 
        $params = array(
            "basePath" => array(
                "name" => "basePath",
                "desc" => "prop_file.basePath_desc",
                "type" => "textfield",
                "options" => Array(),
                "value" => "core/components/modlivestreet/livestreet/",
                "lexicon" => "core:source",
            ),
            "baseUrl" => Array
            (
                "name" => "baseUrl",
                "desc" => "prop_file.baseUrl_desc",
                "type" => "textfield",
                "options" => Array(),
                "value" => "core/components/modlivestreet/livestreet/",
                "lexicon" => "core:source",
            )
        );
        
        $this->mediaSources['Livestreet'] = $this->modx->newObject('sources.modMediaSource', array(
            'name' => 'Livestreet',
            'class_key' => 'sources.modFileMediaSource',
            'description'   => 'Раздел сайта Livestreet',
            'properties' => $params,
        ));
        
        
        // modLivestreetUploads
        $params = array(
            "basePath" => array(
                "name" => "basePath",
                "desc" => "prop_file.basePath_desc",
                "type" => "textfield",
                "options" => Array(),
                "value" => "core/components/modlivestreet/livestreet/uploads/",
                "lexicon" => "core:source",
            ),
            "baseUrl" => Array
            (
                "name" => "baseUrl",
                "desc" => "prop_file.baseUrl_desc",
                "type" => "textfield",
                "options" => Array(),
                "value" => "uploads/",
                "lexicon" => "core:source",
            )
        );
        
        $this->mediaSources['LivestreetUploads'] = $this->modx->newObject('sources.modMediaSource', array(
            'name' => 'LivestreetUploads',
            'class_key' => 'sources.modFileMediaSource',
            'description'   => 'Раздел загружаемых статических файлов Livestreet',
            'properties' => $params,
        ));
        
        
        // modLivestreetPlugin
        $params = array(
            "basePath" => array(
                "name" => "basePath",
                "desc" => "prop_file.basePath_desc",
                "type" => "textfield",
                "options" => Array(),
                "value" => "core/components/modlivestreet/livestreet/plugins/modlivestreet/",
                "lexicon" => "core:source",
            ),
            "baseUrl" => Array
            (
                "name" => "baseUrl",
                "desc" => "prop_file.baseUrl_desc",
                "type" => "textfield",
                "options" => Array(),
                "value" => "core/components/modlivestreet/livestreet/plugins/modlivestreet/",
                "lexicon" => "core:source",
            )
        );
        
        $this->mediaSources['modLivestreetPlugin'] = $this->modx->newObject('sources.modMediaSource', array(
            'name' => 'modLivestreetPlugin',
            'class_key' => 'sources.modFileMediaSource',
            'description'   => 'Раздел плагина modLivestreet для Livestreet',
            'properties' => $params,
        ));
    }
    
    protected function packMediaSources(){
        $vehicleParams = array(
            xPDOTransport::PRESERVE_KEYS => false,
            xPDOTransport::UPDATE_OBJECT => false,
            xPDOTransport::UNIQUE_KEY => 'name',
        );
        
        foreach($this->mediaSources as & $mediaSource){
            $vehicle = $this->builder->createVehicle($mediaSource, $vehicleParams);
            $this->builder->putVehicle($vehicle);
        }
        
        return;
    }
    
    // Создаем статические ресурсы
    protected function createStaticSources(){
        // Создаем статические шаблоны
        $this->createStaticTemplates();
        
        // Создаем статические чанки
        $this->createStaticChunks();
    }
    
    // Создаем статические шаблоны
    protected function createStaticTemplates(){}
    
    // Создаем статические чанки
    protected function createStaticChunks(){
        $chunks = array();
        
        // ActionWall/index.tpl
        $chunk = $this->modx->newObject('modChunk', array(
            'name'  => 'modLivestreet.ActionWall',
            'description'   => 'Шаблон вывода сайдбара для страниц MODX',
            'static'        => '1',
            'static_file'   => 'templates/skin/default/actions/ActionWall/index.tpl',
        ));
        
        $chunk->addOne($this->mediaSources['modLivestreetPlugin'],  'Source');
        
        $chunks[] = $chunk;
        
        
        //  ActionIndex/index
        $chunk = $this->modx->newObject('modChunk', array(
            'name'  => 'modLivestreet.ActionIndex',
            'description'   => 'Шаблон для действия ActionIndex/index плагина modLivestreet',
            'static'        => '1',
            'static_file'   => 'templates/skin/default/actions/ActionIndex/index.tpl',
        ));
        
        $chunk->addOne($this->mediaSources['modLivestreetPlugin'],  'Source');
        
        $chunks[] = $chunk; 
        
        
        //  ActionCustom/index
        $chunk = $this->modx->newObject('modChunk', array(
            'name'  => 'modLivestreet.ActionCustom',
            'description'   => 'Шаблон для действия ActionCustom/index плагина modLivestreet',
            'static'        => '1',
            'static_file'   => 'templates/skin/default/actions/ActionCustom/index.tpl',
        ));
        
        $chunk->addOne($this->mediaSources['modLivestreetPlugin'],  'Source');
        
        $chunks[] = $chunk; 
        
        $this->category->addMany($chunks);
        
    }
    
    protected function addCreateDBResolves(){
        // $vehicle = $this->builder->createVehicle($this->category);

        $this->modx->log(modX::LOG_LEVEL_INFO,'Adding create database code resolvers to category...');
        
        $this->vehicle->resolve('php',array(
            'source' => $this->sources['resolvers'] . 'tables.resolver.php',
        ));
        
        $this->modx->log(modX::LOG_LEVEL_INFO,'Adding Livestreet config file...');
        
        $this->vehicle->resolve('php',array(
            'source' => $this->sources['resolvers'] . 'livestreet.config.resolver.php',
        ));
         
    }
}

?>
