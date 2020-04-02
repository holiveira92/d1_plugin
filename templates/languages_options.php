<?php
$lang_option = get_option_esc('d1_lang_option');
echo '<form method="post" action="options.php" enctype="multipart/form-data">';
settings_fields('config_geral_secao_2');
do_settings_sections('d1_plugin_config_geral');
?>
<div style="margin:20px 0 20px 0;">
<label for="d1_lang_option">Escolha a Linguagem para Editar:</label>
<select name="d1_lang_option" id="d1_lang_option">
    <option value="PT" <?php echo ($lang_option == "PT") ? "selected" : "";?>>PT</option>
    <option value="EN" <?php echo ($lang_option == "EN") ? "selected" : "";?>>EN</option>
    <option value="ES" <?php echo ($lang_option == "ES") ? "selected" : "";?>>ES</option>
</select>
<input type="submit" id="submit_lang" name="submit_lang" class="btn btn-info" value="Salvar Linguagem" style="display:none;"/>
</div>
</form>

<script src="<?php echo plugins_url('d1_plugin/resources/js/jquery.min.js', 'd1_plugin'); ?>"></script>
<script>
    $(document).ready(function(){
        $("#d1_lang_option").change(function() { 
            var opt = $(this).val();
            var lang_name = "Português";
            switch(opt){
                case 'PT':
                    lang_name = "Português";
                    break;
                case 'EN':
                    lang_name = "Inglês";
                    break;
                case 'ES':
                    lang_name = "Espanhol";
                    break;
                default:
                    lang_name = "Português";
                    break;
            }
            
            if(!confirm('Deseja Mudar Linguagem de Edição para ' + lang_name + ' ?')){
                return false;
            }else{
                $('#submit_lang').trigger('click');
            }
        }); 
    });
</script>