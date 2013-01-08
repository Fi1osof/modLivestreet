<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class PluginModLivestreet_ActionCustom extends Action{
    function Init(){ 
        $this->SetDefaultEvent('index');
    }
    
    function RegisterEvent() {
        $this->AddEvent('index','EventIndex');
    }
    
    function EventIndex(){}
}
?>
