
jQuery(document).ready(function($) {
    $('[name*=_degrade').click(function(){
        var field_name = $(this).attr('name');
        field_name = field_name.replace('_degrade','');
        var strtoreplace = getSelectionTextInsertDegrade();
        var string = $('[name=' + field_name).val();
        if(string != ""){
            var find = string.indexOf('[degrade]');
            if (find != -1){
                alert('Já existe um degradê selecionado, para selecionar novamente remova as tags existentes');
                return false;
            }
        }

        if(strtoreplace != ""){
            var fullstring = $('[name=' + field_name).val().replace(strtoreplace,"[degrade]" + strtoreplace.trim() + "[/degrade]")
            $('[name=' + field_name).val(fullstring);
        }
        return false;
    });

    function getSelectionTextInsertDegrade() {
        var text = "";
        if (window.getSelection) {
            text = window.getSelection().toString();
        }else if (document.selection && document.selection.type != "Control"){
            text = document.selection.createRange().text;
        }
        
        return text;
    }
});