<?php
?>
<link rel="stylesheet" href="<?php echo plugins_url('d1_plugin/resources/css/bootstrap.min.css','d1_plugin');?>" />
<script src="<?php echo plugins_url('d1_plugin/resources/js/bootstrap.min.js','d1_plugin');?>"></script>
<script src="<?php echo plugins_url('d1_plugin/resources/js/jquery.min.js','d1_plugin');?>"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style type="text/css">.form-style-5{max-width:2000px;padding:10px 20px;background:#f4f7f8;margin:10px auto;padding:20px;background:#f4f7f8;border-radius:8px;font-family:Georgia,"Times New Roman",Times,serif}.form-style-5 fieldset{border:none}.form-style-5 legend{font-size:1.4em;margin-bottom:10px}.form-style-5 label{display:block;margin-bottom:8px}.form-style-5 input[type="text"],.form-style-5 input[type="date"],.form-style-5 input[type="datetime"],.form-style-5 input[type="email"],.form-style-5 input[type="number"],.form-style-5 input[type="search"],.form-style-5 input[type="time"],.form-style-5 input[type="url"],.form-style-5 textarea,.form-style-5 select{font-family:Georgia,"Times New Roman",Times,serif;background:rgba(255,255,255,.1);border:none;border-radius:4px;font-size:16px;margin:0;outline:0;padding:7px;width:100%;box-sizing:border-box;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;background-color:#e8eeef;color:#8a97a0;-webkit-box-shadow:0 1px 0 rgba(0,0,0,.03) inset;box-shadow:0 1px 0 rgba(0,0,0,.03) inset;margin-bottom:30px}.form-style-5 input[type="text"]:focus,.form-style-5 input[type="date"]:focus,.form-style-5 input[type="datetime"]:focus,.form-style-5 input[type="email"]:focus,.form-style-5 input[type="number"]:focus,.form-style-5 input[type="search"]:focus,.form-style-5 input[type="time"]:focus,.form-style-5 input[type="url"]:focus,.form-style-5 textarea:focus,.form-style-5 select:focus{background:#d2d9dd}.form-style-5 select{-webkit-appearance:menulist-button;height:35px}.form-style-5 .number{background:#1abc9c;color:#fff;height:30px;width:30px;display:inline-block;font-size:.8em;margin-right:4px;line-height:30px;text-align:center;text-shadow:0 1px 0 rgba(255,255,255,.2);border-radius:15px 15px 15px 0}</style>
<div class="form-style-5">

<!-- ------------------------------------- Início Seção Se Torne um Expert ----------------------------------------------->
<!-- Card Primeira Parte -->
<div id='secao2_content1' class="content" style='display:block;'>
<label for="secao3_title">Titulo da Seção:</label><input type="text" name="secao3_title" value="<?php echo get_option('secao3_title')?>" placeholder="Titulo da Seção Se Torne um Expert">
<label for="secao3_descricao">Descrição da Seção:</label> <textarea name="secao3_descricao" placeholder="Descrição da Seção Se Torne um Expert"><?php echo get_option('secao3_descricao')?></textarea>

<!-- Card 1 -->
<fieldset style='display: inline;margin-right:4%;width:28%;'>
<legend><span class="number">1</span>Expert Card</legend>
<legend>Imagem Backgorund</legend><?php echo $this->d1_upload->get_image_options('secao3_minicard1_img_bg'); ?>
<label for="secao3_minicard1_descricao">Descrição do MiniCard1:</label> <textarea name="secao3_minicard1_descricao" placeholder="Descrição do MiniCard1"><?php echo get_option('secao3_minicard1_descricao')?></textarea>
</fieldset>

<!-- Card 2 -->
<fieldset style='display: inline;margin-right:4%;width:28%;'>
<legend><span class="number">2</span>Expert Card</legend>
<legend>Imagem Backgorund</legend><?php echo $this->d1_upload->get_image_options('secao3_minicard2_img_bg'); ?>
<label for="secao3_minicard1_descricao">Descrição do MiniCard2:</label> <textarea name="secao3_minicard2_descricao" placeholder="Descrição do MiniCard2"><?php echo get_option('secao3_minicard2_descricao')?></textarea>
</fieldset>

<!-- Card 3 -->
<fieldset style='display: inline;margin-right:4%;width:28%;'>
<legend><span class="number">3</span>Expert Card</legend>
<legend>Imagem Backgorund</legend><?php echo $this->d1_upload->get_image_options('secao3_minicard3_img_bg'); ?>
<label for="secao3_minicard3_descricao">Descrição do MiniCard3:</label> <textarea name="secao3_minicard3_descricao" placeholder="Descrição do MiniCard3"><?php echo get_option('secao3_minicard3_descricao')?></textarea>
</fieldset>

<!-------------------------------------- Fim Seção Se Torne um Expert ----------------------------------------------->

</div>
<script>var coll=document.getElementsByClassName("collapsible");var i;for(i=0;i<coll.length;i++){coll[i].addEventListener("click",function(){this.classList.toggle("active");var content=this.nextElementSibling;if(content.style.display==="block"){content.style.display="none"}else{content.style.display="block"}})}</script>