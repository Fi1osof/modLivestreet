<?php

class PluginModlivestreet_HookModLivestreet extends Hook{
    public function RegisterHook() { 
        $this->AddHook('template_html_head_begin', 'html_head_begin');
    }
    
    
    function html_head_begin(){
        return '[[$modLivestreet.html_head_begin]]';
    }
}
?>
