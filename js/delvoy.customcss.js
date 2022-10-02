jQuery(document).ready(function($){
    var updateCSS = function(){
        $('#delvoy_css').val(editor.getSession().getValue());
    }

    $('#save-custom-css-form').submit(updateCSS);
});

var editor = ace.edit("delvoy-custom-css");
editor.setTheme('ace/theme/monokai');
editor.getSession().setMode('ace/mode/css');