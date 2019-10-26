<?php
?>
<link rel="stylesheet" href="<?php echo plugins_url('d1_plugin/resources/css/bootstrap.min.css','d1_plugin');?>" />
<script src="<?php echo plugins_url('d1_plugin/resources/js/bootstrap.min.js','d1_plugin');?>"></script>
<script src="<?php echo plugins_url('d1_plugin/resources/js/jquery.min.js','d1_plugin');?>"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style type="text/css"> .form-style-5{display: flex; flex-wrap: wrap; padding: 20px; background: #f4f7f8; border-radius: 8px; font-family: Georgia,"Times New Roman",Times,serif;}.form-style-5 fieldset{border:none}.form-style-5 legend{font-size:1.4em;margin-bottom:10px}.form-style-5 label{display:block;margin-bottom:8px}.form-style-5 input[type="text"],.form-style-5 input[type="date"],.form-style-5 input[type="datetime"],.form-style-5 input[type="email"],.form-style-5 input[type="number"],.form-style-5 input[type="search"],.form-style-5 input[type="time"],.form-style-5 input[type="url"],.form-style-5 textarea,.form-style-5 select{font-family:Georgia,"Times New Roman",Times,serif;background:rgba(255,255,255,.1);border:none;border-radius:4px;font-size:16px;margin:0;outline:0;padding:7px;width:100%;box-sizing:border-box;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;background-color:#e8eeef;color:#8a97a0;-webkit-box-shadow:0 1px 0 rgba(0,0,0,.03) inset;box-shadow:0 1px 0 rgba(0,0,0,.03) inset;}.form-style-5 input[type="text"]:focus,.form-style-5 input[type="date"]:focus,.form-style-5 input[type="datetime"]:focus,.form-style-5 input[type="email"]:focus,.form-style-5 input[type="number"]:focus,.form-style-5 input[type="search"]:focus,.form-style-5 input[type="time"]:focus,.form-style-5 input[type="url"]:focus,.form-style-5 textarea:focus,.form-style-5 select:focus{background:#d2d9dd}.form-style-5 select{-webkit-appearance:menulist-button;height:35px}.form-style-5 .number{background:#1abc9c;color:#fff;height:30px;width:30px;display:inline-block;font-size:.8em;margin-right:4px;line-height:30px;text-align:center;text-shadow:0 1px 0 rgba(255,255,255,.2);border-radius:15px 15px 15px 0} </style>
<div class="form-style-5">

<!----------------------------------------------------------------------- Seção 5 - Inicio Regulamentação,Parceiros e Prêmios ----------------------------------------------------------------------->
<!-- Área de Regulamentação -->
<legend style='margin-bottom:30px;'>Regulamentação</legend>

<!-- Regulamentação 1 -->
<fieldset style='display: inline;margin-right:4%;width:29%;margin-bottom:30px;'>
<legend><span class="number">1</span>Imagem</legend>
<?php echo $this->d1_upload->get_image_options('secao5_regulamentacao1_img'); ?>
</fieldset>
<!-- Regulamentação 2 -->
<fieldset style='display: inline;margin-right:4%;width:29%;margin-bottom:30px;'>
<legend><span class="number">2</span>Imagem</legend>
<?php echo $this->d1_upload->get_image_options('secao5_regulamentacao2_img'); ?>
</fieldset>
<!-- Regulamentação 3 -->
<fieldset style='display: inline;margin-right:4%;width:29%;margin-bottom:30px;'>
<legend><span class="number">3</span>Imagem</legend>
<?php echo $this->d1_upload->get_image_options('secao5_regulamentacao3_img'); ?>
</fieldset>

<!-- Área de Parceiros -->
<legend>Parceiros</legend>
<!-- Parceiros 1 -->
<fieldset style='display: inline;margin-right:4%;width:29%;margin-bottom:30px;'>
<legend><span class="number">1</span>Imagem</legend>
<?php echo $this->d1_upload->get_image_options('secao5_parceiros1_img'); ?>
</fieldset>
<!-- Parceiros 2 -->
<fieldset style='display: inline;margin-right:4%;width:29%;margin-bottom:30px;'>
<legend><span class="number">2</span>Imagem</legend>
<?php echo $this->d1_upload->get_image_options('secao5_parceiros2_img'); ?>
</fieldset>
<!-- Parceiros 3 -->
<fieldset style='display: inline;margin-right:4%;width:29%;margin-bottom:30px;'>
<legend><span class="number">3</span>Imagem</legend>
<?php echo $this->d1_upload->get_image_options('secao5_parceiros3_img'); ?>
</fieldset>

<!-- Área de Prêmios -->
<legend>Prêmios</legend>
<!-- Prêmios 1 -->
<fieldset style='display: inline;margin-right:4%;width:29%;margin-bottom:30px;'>
<legend><span class="number">1</span>Imagem</legend>
<?php echo $this->d1_upload->get_image_options('secao5_premios1_img'); ?>
</fieldset>
<!-- Prêmios 2 -->
<fieldset style='display: inline;margin-right:4%;width:29%;margin-bottom:30px;'>
<legend><span class="number">2</span>Imagem</legend>
<?php echo $this->d1_upload->get_image_options('secao5_premios2_img'); ?>
</fieldset>
<!-- Prêmios 3 -->
<fieldset style='display: inline;margin-right:4%;width:29%;margin-bottom:30px;'>
<legend><span class="number">3</span>Imagem</legend>
<?php echo $this->d1_upload->get_image_options('secao5_premios3_img'); ?>
</fieldset>
<!----------------------------------------------------------------------- Seção 5 - Fim Regulamentação,Parceiros e Prêmios -------------------------------------------------------------------------->


</div>