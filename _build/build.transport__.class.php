<?php

class modLivestreetBuilder__{
    public $mtime = null;
    public $tstart = null;
    
    public $sources = array();
    
    public $modx = null;
    
    public $builder = null;
    
    public $category = null;

    protected $vehicle = null;
    


    function __construct(modX & $modx, & $sources){
        $this->modx = & $modx;
        $this->sources = & $sources;
        
        $this->mtime = microtime();
        $this->mtime = explode(' ', $this->mtime);
        $this->mtime = $this->mtime[1] + $this->mtime[0];
        $this->tstart = $this->mtime;
        set_time_limit(0);
        
        $this->Init();
    }
    
    function Init(){
        print '<pre>';
        
    }
    
    function build(){ 
        global $modx; 
        
        print $this->sources['build'];
        
        
        echo '<pre>'; /* used for nice formatting of log messages */
        $this->modx->setLogLevel(modX::LOG_LEVEL_INFO);
        $this->modx->setLogTarget('ECHO');

        $this->modx->loadClass('transport.modPackageBuilder','',false, true);
        $this->builder = new modPackageBuilder($this->modx);
        $this->builder->createPackage(PKG_NAME,PKG_VERSION,PKG_RELEASE);
        $this->builder->registerNamespace(PKG_CATEGORY,false,true,'{core_path}components/'.PKG_PATH.'/');
        $this->modx->log(modX::LOG_LEVEL_INFO,'Created Transport Package and Namespace.');


        /* create category */$this->builder->createVehicle($this->category,$attr);
        $this->category= $this->modx->newObject('modCategory');
        $this->category->set('id', NULL);
        $this->category->set('category',PKG_CATEGORY);



        $plugins = include $this->sources['data'].'transport.plugins.php';
        if (!is_array($plugins)) {
            $this->modx->log(modX::LOG_LEVEL_ERROR,'Could not package in plugins.');
        } else {
            $this->category->addMany($plugins);
            $this->modx->log(modX::LOG_LEVEL_INFO,'Packaged in '.count($plugins).' plugins.');
        }

        /* add snippets */
        $snippets = include $this->sources['data'].'transport.snippets.php';
        //  print_r($this->sources);
        // print $this->sources['data'].'transport.snippets.php';
        
        // exit;
        if (!is_array($snippets)) {
            $this->modx->log(modX::LOG_LEVEL_ERROR,'Could not package in snippets.');
        } else {
            $this->category->addMany($snippets);
            $this->modx->log(modX::LOG_LEVEL_INFO,'Packaged in '.count($snippets).' snippets.');
        }

        /* now pack in the license file, readme and setup options */
        $this->builder->setPackageAttributes(array(
            'license' => file_get_contents($this->sources['docs'] . 'license.txt'),
            'readme' => file_get_contents($this->sources['docs'] . 'readme.txt'),
            'changelog' => file_get_contents($this->sources['docs'] . 'changelog.txt'),
            //'setup-options' => array(
                //'source' => $this->sources['build'].'setup.options.php',
            //),
        ));
        $this->modx->log(modX::LOG_LEVEL_INFO,'Added package attributes and setup options.');
        
        
        $this->createVehicle();
        
        /* load system settings */
        $settings = $this->getSettings();
        if (!is_array($settings)) {
            $this->modx->log(modX::LOG_LEVEL_ERROR,'Could not package in settings.');
        } else {
            $attributes= array(
                xPDOTransport::UNIQUE_KEY => 'key',
                xPDOTransport::PRESERVE_KEYS => true,
                xPDOTransport::UPDATE_OBJECT => false,
            );
            foreach ($settings as $setting) {
                $vehicle = $this->builder->createVehicle($setting,$attributes);
                $this->builder->putVehicle($vehicle);
            }
            $this->modx->log(modX::LOG_LEVEL_INFO,'Packaged in '.count($settings).' System Settings.');
        }
        unset($settings,$setting,$attributes);
        
        /* load menu */
        $menu = $this->getMenu();
        if (empty($menu)) {
            $this->modx->log(modX::LOG_LEVEL_ERROR,'Could not package in menu.');
        } else {
            $vehicle= $this->builder->createVehicle($menu,array (
                xPDOTransport::PRESERVE_KEYS => true,
                xPDOTransport::UPDATE_OBJECT => true,
                xPDOTransport::UNIQUE_KEY => 'text',
                xPDOTransport::RELATED_OBJECTS => true,
                xPDOTransport::RELATED_OBJECT_ATTRIBUTES => array (
                    'Action' => array (
                        xPDOTransport::PRESERVE_KEYS => false,
                        xPDOTransport::UPDATE_OBJECT => true,
                        xPDOTransport::UNIQUE_KEY => array ('namespace','controller'),
                    ),
                ),
            ));
            $this->modx->log(modX::LOG_LEVEL_INFO,'Adding in PHP resolvers...');
            $vehicle->resolve('php',array(
                'source' => $this->sources['resolvers'] . 'resolve.tables.php',
            ));
            $vehicle->resolve('php',array(
                'source' => $this->sources['resolvers'] . 'resolve.paths.php',
            ));
            $this->builder->putVehicle($vehicle);
            $this->modx->log(modX::LOG_LEVEL_INFO,'Packaged in menu.');
        }
        unset($vehicle,$menu);
        
        return;
    }
    
    protected function createVehicle(){
        /* create category vehicle */
        $attr = array(
            xPDOTransport::UNIQUE_KEY => 'category',
            xPDOTransport::PRESERVE_KEYS => false,
            xPDOTransport::UPDATE_OBJECT => true,
            xPDOTransport::RELATED_OBJECTS => true,
            xPDOTransport::RELATED_OBJECT_ATTRIBUTES => array (
                'Children' => array(
                    xPDOTransport::PRESERVE_KEYS => false,
                    xPDOTransport::UPDATE_OBJECT => true,
                    xPDOTransport::UNIQUE_KEY => 'category',
                    xPDOTransport::RELATED_OBJECTS => true,
                    xPDOTransport::RELATED_OBJECT_ATTRIBUTES => array (
                        'Snippets' => array(
                            xPDOTransport::PRESERVE_KEYS => false,
                            xPDOTransport::UPDATE_OBJECT => true,
                            xPDOTransport::UNIQUE_KEY => 'name',
                        ),
                        'Chunks' => array(
                            xPDOTransport::PRESERVE_KEYS => false,
                            xPDOTransport::UPDATE_OBJECT => true,
                            xPDOTransport::UNIQUE_KEY => 'name',
                        ),
                    ),
                ),
                'Snippets' => array(
                    xPDOTransport::PRESERVE_KEYS => false,
                    xPDOTransport::UPDATE_OBJECT => true,
                    xPDOTransport::UNIQUE_KEY => 'name',
                ),
                'Chunks' => array (
                    xPDOTransport::PRESERVE_KEYS => false,
                    xPDOTransport::UPDATE_OBJECT => true,
                    xPDOTransport::UNIQUE_KEY => 'name',
                ),
                'Plugins' => array (
                    xPDOTransport::PRESERVE_KEYS => true,
                    xPDOTransport::UPDATE_OBJECT => true,
                    xPDOTransport::UNIQUE_KEY => 'name',
                ),
                'PluginEvents' => array(
                    xPDOTransport::PRESERVE_KEYS => true,
                    xPDOTransport::UPDATE_OBJECT => false,
                    xPDOTransport::UNIQUE_KEY => array('pluginid','event'),
                ),
                'Templates' => array (
                    xPDOTransport::PRESERVE_KEYS => true,
                    xPDOTransport::UPDATE_OBJECT => false,
                    xPDOTransport::UNIQUE_KEY => 'templatename',
                    xPDOTransport::RELATED_OBJECTS => true,
                    xPDOTransport::RELATED_OBJECT_ATTRIBUTES => array (
                        'sources.modMediaSource' => array (
                            xPDOTransport::PRESERVE_KEYS => true,
                            xPDOTransport::UPDATE_OBJECT => true,
                            xPDOTransport::UNIQUE_KEY => 'name',
                        ),
                    )
                ),
            ),
        );
        
        
        $this->vehicle = $this->builder->createVehicle($this->category,$attr);

        $this->modx->log(modX::LOG_LEVEL_INFO,'Adding file resolvers to category...');
        
        $this->vehicle->resolve('file',array(
            'source' => $this->sources['source_assets'],
            'target' => "return MODX_ASSETS_PATH . 'components/';",
        ));
        
        $this->vehicle->resolve('file',array(
            'source' => $this->sources['source_core'],
            'target' => "return MODX_CORE_PATH . 'components/';",
        ));
        
        $this->addTemplates();
        
        $this->addChunks();
        
        $this->addResolves();
        
        return  $this->vehicle;
    }
    
    protected function addChunks(){
        $chunks = include $this->sources['data'].'transport.chunks.php';
        if (!is_array($chunks)) {
            $this->modx->log(modX::LOG_LEVEL_ERROR,'Could not package in chunks.');
        } else {
            $this->category->addMany($chunks);
            $this->modx->log(modX::LOG_LEVEL_INFO,'Packaged in '.count($chunks).' chunks.');
        }
    }
    
    protected function getSettings(){
        return include $this->sources['data'].'transport.settings.php';
    }
    
    protected function getMenu(){
        return include $this->sources['data'].'transport.menu.php';
    }
    
    protected function  addResolves(){
        
    }
    
    protected function addTemplates(){
        $templates = include $this->sources['data'].'transport.templates.php';
        if(!is_array($templates)){
            $this->modx->log(modX::LOG_LEVEL_INFO,'Error. Templates was`nt found');
        }
        $this->category->addMany($templates);
        $this->modx->log(modX::LOG_LEVEL_INFO,'Packaged in '.count($templates).' templates.');
    }
    
    public function pack(){
        
        $this->builder->putVehicle($this->vehicle);
        
        /* zip up package */
        $this->modx->log(modX::LOG_LEVEL_INFO,'Packing up transport package zip...');
        $this->builder->pack();

        $this->mtime= microtime();
        $this->mtime= explode(" ", $this->mtime);
        $this->mtime= $this->mtime[1] + $this->mtime[0];
        $tend= $this->mtime;
        $totalTime= ($tend - $this->tstart);
        $totalTime= sprintf("%2.4f s", $totalTime);

        $this->modx->log(modX::LOG_LEVEL_INFO,"\n<br />Package Built.<br />\nExecution time: {$totalTime}\n");
    }
}