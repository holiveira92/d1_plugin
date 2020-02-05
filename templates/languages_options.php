<div class="linguagem"> 
<fieldset> 

<label for="d1_lang_option">Escolha a Linguagem para Editar:</label> 
<select name="d1_lang_option" id="d1_lang_option"> 
<option value="PT" selected="">PT</option> 
<option value="EN">EN</option> 
<option value="ES">ES</option> 
</select>
</fieldset> 
<!--
<input type="submit" name="submit_novo" id="submit_novo" 
class="button button-primary" value="Salvar alterações" 
style=" margin: 0; margin-left: 20px; line-height: 16px; font-weight: 300; font-size: 14px; ">
-->
</div>

<style>
.linguagem { display: inline-flex; margin: 20px 0; }
</style>

<script src="<?php echo plugins_url('d1_plugin/resources/js/jquery.min.js', 'd1_plugin'); ?>"></script>
<script>
    $(document).ready(function(){
        $("#d1_lang_option").change(function() { 
            $('#submit').trigger('click');
        }); 
    });
</script>