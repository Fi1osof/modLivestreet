<?php

class PluginModlivestreet_HookModLivestreet extends Hook{
    public function RegisterHook() { 
        // При редактировании топика выводим реплейсинг MODX-тегов
        // $this->AddHook('template_form_add_topic_topic_end', 'form_add_topic_topic_end');
    }
    
    
    function form_add_topic_topic_end(){
        /*$code = <<<JS
        <script type="text/javascript">
            var editor = $(".markitup-editor");
            var html = editor.html();
            html = html.replace(/(&|&amp;)#91;/g, '[');
            html = html.replace(/(&|&amp;)#93;/g, ']');
            editor.html(html);
            console.log(html);
        </script>
JS;
        return $code;*/
    }
}
?>
