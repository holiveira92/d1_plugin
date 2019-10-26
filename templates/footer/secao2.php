<?php
?>
<link rel="stylesheet" href="<?php echo plugins_url('d1_plugin/resources/css/bootstrap.min.css','d1_plugin');?>" />
<script src="<?php echo plugins_url('d1_plugin/resources/js/bootstrap.min.js','d1_plugin');?>"></script>
<script src="<?php echo plugins_url('d1_plugin/resources/js/jquery.min.js','d1_plugin');?>"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style type="text/css"> .form-style-5{display: flex; flex-wrap: wrap; padding: 20px; background: #f4f7f8; border-radius: 8px; font-family: Georgia,"Times New Roman",Times,serif;}.form-style-5 fieldset{border:none}.form-style-5 legend{font-size:1.4em;margin-bottom:10px}.form-style-5 label{display:block;margin-bottom:8px}.form-style-5 input[type="text"],.form-style-5 input[type="date"],.form-style-5 input[type="datetime"],.form-style-5 input[type="email"],.form-style-5 input[type="number"],.form-style-5 input[type="search"],.form-style-5 input[type="time"],.form-style-5 input[type="url"],.form-style-5 textarea,.form-style-5 select{font-family:Georgia,"Times New Roman",Times,serif;background:rgba(255,255,255,.1);border:none;border-radius:4px;font-size:16px;margin:0;outline:0;padding:7px;width:100%;box-sizing:border-box;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;background-color:#e8eeef;color:#8a97a0;-webkit-box-shadow:0 1px 0 rgba(0,0,0,.03) inset;box-shadow:0 1px 0 rgba(0,0,0,.03) inset;}.form-style-5 input[type="text"]:focus,.form-style-5 input[type="date"]:focus,.form-style-5 input[type="datetime"]:focus,.form-style-5 input[type="email"]:focus,.form-style-5 input[type="number"]:focus,.form-style-5 input[type="search"]:focus,.form-style-5 input[type="time"]:focus,.form-style-5 input[type="url"]:focus,.form-style-5 textarea:focus,.form-style-5 select:focus{background:#d2d9dd}.form-style-5 select{-webkit-appearance:menulist-button;height:35px}.form-style-5 .number{background:#1abc9c;color:#fff;height:30px;width:30px;display:inline-block;font-size:.8em;margin-right:4px;line-height:30px;text-align:center;text-shadow:0 1px 0 rgba(255,255,255,.2);border-radius:15px 15px 15px 0} </style>
<div class="form-style-5">

<!-- ------------------------------------- Início Blog ----------------------------------------------->
<!-- Card Primeira Parte -->
<fieldset style='flex: 0 100%; padding: 0 2%;'>
<legend><span class="number">0</span>Informações da Seção</legend>
<div id='secao2_content1' class="content" style='display:block;'>
<label for="secao2_title">Titulo da Seção:</label><input type="text" name="secao2_title" value="<?php echo get_option('secao2_title')?>" placeholder="Titulo da Seção">
<label for="secao2_descricao">Descrição da Seção:</label> <textarea name="secao2_descricao" placeholder="Descrição da Seção Se Torne um Expert"><?php echo get_option('secao2_descricao')?></textarea>
</fieldset>

<!-- Card 1 -->
<fieldset style='flex: 0 33%; padding: 0 2%;;'>
<legend><span class="number">1</span>Blog Card</legend>
<label for="secao2_card1_title">Titulo da Seção:</label><input type="text" name="secao2_card1_title" value="<?php echo get_option('secao2_card1_title')?>" placeholder="Titulo">
<label for="secao2_card1_descricao">Descrição:</label> <textarea name="secao2_card1_descricao" placeholder="Descrição" rows='4'><?php echo get_option('secao2_card1_descricao')?></textarea>
<label for="secao2_card1_artigo_link">Link Artigo:</label> <textarea name="secao2_card1_artigo_link" placeholder="Link Artigo" rows='1'><?php echo get_option('secao2_card1_artigo_link')?></textarea>
<legend>Imagem Background</legend><?php echo $this->d1_upload->get_image_options('secao2_card1_img_bg'); ?>
</fieldset>

<!-- Card 2 -->
<fieldset style='flex: 0 33%; padding: 0 2%;'>
<legend><span class="number">2</span>Blog Card</legend>
<label for="secao2_card2_title">Titulo da Seção:</label><input type="text" name="secao2_card2_title" value="<?php echo get_option('secao2_card2_title')?>" placeholder="Titulo">
<label for="secao2_card2_descricao">Descrição:</label> <textarea name="secao2_card2_descricao" placeholder="Descrição" rows='4'><?php echo get_option('secao2_card2_descricao')?></textarea>
<label for="secao2_card2_artigo_link">Link Artigo:</label> <textarea name="secao2_card2_artigo_link" placeholder="Link Artigo" rows='1'><?php echo get_option('secao2_card2_artigo_link')?></textarea>
<legend>Imagem Background</legend><?php echo $this->d1_upload->get_image_options('secao2_card2_img_bg'); ?>
</fieldset>

<!-- Card 3 -->
<fieldset style='flex: 0 33%; padding: 0 2%;;'>
<legend><span class="number">3</span>Blog Card</legend>
<label for="secao2_card3_title">Titulo da Seção:</label><input type="text" name="secao2_card3_title" value="<?php echo get_option('secao2_card3_title')?>" placeholder="Titulo">
<label for="secao2_card3_descricao">Descrição:</label> <textarea name="secao2_card3_descricao" placeholder="Descrição" rows='4'><?php echo get_option('secao2_card3_descricao')?></textarea>
<label for="secao2_card3_artigo_link">Link Artigo:</label> <textarea name="secao2_card3_artigo_link" placeholder="Link Artigo" rows='1'><?php echo get_option('secao2_card3_artigo_link')?></textarea>
<legend>Imagem Background</legend><?php echo $this->d1_upload->get_image_options('secao2_card3_img_bg'); ?>
</fieldset>

<!-------------------------------------- Fim Seção Blog ----------------------------------------------->
</div>