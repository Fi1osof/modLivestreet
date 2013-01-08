<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class PluginModLivestreet_ActionIndex extends Action{
    
    // protected $sDefaultEvent = 'index';
    
    function Init(){ 
        $this->SetDefaultEvent('index');
    }
    
    function RegisterEvent() {
        $this->AddEvent('index','EventIndex');
        $this->AddEvent('no_sidebar','EventNoSidebar');
    }
    
    function EventIndex(){}
    
    function EventNoSidebar(){}
}
?>
