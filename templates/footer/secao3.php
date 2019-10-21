<?php
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style type="text/css"> .form-style-5{width:97%;padding:10px 20px;background:#f4f7f8;padding:20px;background:#f4f7f8;border-radius:8px;font-family:Georgia,"Times New Roman",Times,serif}.form-style-5 fieldset{border:none}.form-style-5 legend{font-size:1.4em;margin-bottom:10px}.form-style-5 label{display:block;margin-bottom:8px}.form-style-5 input[type="text"],.form-style-5 input[type="date"],.form-style-5 input[type="datetime"],.form-style-5 input[type="email"],.form-style-5 input[type="number"],.form-style-5 input[type="search"],.form-style-5 input[type="time"],.form-style-5 input[type="url"],.form-style-5 textarea,.form-style-5 select{font-family:Georgia,"Times New Roman",Times,serif;background:rgba(255,255,255,.1);border:none;border-radius:4px;font-size:16px;margin:0;outline:0;padding:7px;width:100%;box-sizing:border-box;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;background-color:#e8eeef;color:#8a97a0;-webkit-box-shadow:0 1px 0 rgba(0,0,0,.03) inset;box-shadow:0 1px 0 rgba(0,0,0,.03) inset;margin-bottom:30px}.form-style-5 input[type="text"]:focus,.form-style-5 input[type="date"]:focus,.form-style-5 input[type="datetime"]:focus,.form-style-5 input[type="email"]:focus,.form-style-5 input[type="number"]:focus,.form-style-5 input[type="search"]:focus,.form-style-5 input[type="time"]:focus,.form-style-5 input[type="url"]:focus,.form-style-5 textarea:focus,.form-style-5 select:focus{background:#d2d9dd}.form-style-5 select{-webkit-appearance:menulist-button;height:35px}.form-style-5 .number{display:inline-block;background:#1abc9c;color:#fff;height:30px;width:30px;display:inline-block;font-size:.8em;margin-right:4px;line-height:30px;text-align:center;text-shadow:0 1px 0 rgba(255,255,255,.2);border-radius:15px 15px 15px 0}.collapsible{background-color:#777;color:white;cursor:pointer;padding:18px;width:100%;border:none;text-align:left;outline:none;font-size:15px}.active,.collapsible:hover{background-color:#555}.content{padding:0 18px;display:none;overflow:hidden;background-color:#f1f1f1} </style>
</head>
<body>
<div class="form-style-5">

<!----------------------------------------------------------------------- Seção 3 - Inicio Seção Pré-CTA ----------------------------------------------------------------------->
<button type="button" class="collapsible">+ Pré-CTA</button>
<div id='secao1_content1' class="content">
<label for="secao3_title">Titulo :</label> <input type="checkbox" name="secao3_title_degrade"> Para Inserir Degradê, Selecione o Texto e Marque Esta Opção <br> <input type="text" name="secao3_title" value="<?php echo get_option('secao3_title')?>" placeholder="Titulo da Seção">
<label for="secao3_url_cta1">URL CTA 1 :</label> <input type="text" name="secao3_url_cta1" value="<?php echo get_option('secao3_url_cta1')?>" placeholder="URL CTA 1">
<label for="secao3_url_cta2">URL CTA 2 :</label> <input type="text" name="secao3_url_cta2" value="<?php echo get_option('secao3_url_cta2')?>" placeholder="URL CTA 2">
<label for="secao3_url_cta3">URL CTA 3 :</label> <input type="text" name="secao3_url_cta3" value="<?php echo get_option('secao3_url_cta3')?>" placeholder="URL CTA 3">
</div>
<!----------------------------------------------------------------------- Seção 3 - Fim Seção Pré-CTA -------------------------------------------------------------------------->

<!----------------------------------------------------------------------- Seção 3 - Inicio Info D1 ----------------------------------------------------------------------->
<button type="button" class="collapsible">+ Informações D1</button>
<div id='secao1_content2' class="content">
<label for="secao3_info_d1">Info D1:</label> <textarea name="secao3_info_d1" placeholder="Info D1" rows=10><?php echo get_option('secao3_info_d1')?></textarea>
<legend>Imagem Logo</legend><?php echo $this->d1_upload->get_image_options('secao3_info_d1_logo'); ?>
</div>
<!----------------------------------------------------------------------- Seção 3 - Fim Info D1 -------------------------------------------------------------------------->

<!----------------------------------------------------------------------- Seção 3 - Inicio Links ----------------------------------------------------------------------->
<button type="button" class="collapsible">+ Links</button>
<div id='secao1_content3' class="content">

<!-- Grupo 1 -->
<fieldset style='display: inline;margin-right:4%;width:29%;'>
<legend><span class="number">1</span>Grupo 1</legend>
<div style='float:left;'>
<label for="secao3_title">Item 1 - Nome -> Link :</label> <input type="text" name="secao3_grupo1_item1_nome" value="<?php echo get_option('secao3_grupo1_item1_nome')?>" placeholder="Nome" style='width:50%;'> <input type="text" name="secao3_grupo1_item1_link" value="<?php echo get_option('secao3_grupo1_item1_link')?>" placeholder="Link" style='width:48%;'>
<label for="secao3_title">Item 2 - Nome -> Link :</label> <input type="text" name="secao3_grupo1_item2_nome" value="<?php echo get_option('secao3_grupo1_item2_nome')?>" placeholder="Nome" style='width:50%;'> <input type="text" name="secao3_grupo1_item2_link" value="<?php echo get_option('secao3_grupo1_item2_link')?>" placeholder="Link" style='width:48%;'>
<label for="secao3_title">Item 3 - Nome -> Link :</label> <input type="text" name="secao3_grupo1_item3_nome" value="<?php echo get_option('secao3_grupo1_item3_nome')?>" placeholder="Nome" style='width:50%;'> <input type="text" name="secao3_grupo1_item3_link" value="<?php echo get_option('secao3_grupo1_item3_link')?>" placeholder="Link" style='width:48%;'>
<label for="secao3_title">Item 4 - Nome -> Link :</label> <input type="text" name="secao3_grupo1_item4_nome" value="<?php echo get_option('secao3_grupo1_item4_nome')?>" placeholder="Nome" style='width:50%;'> <input type="text" name="secao3_grupo1_item4_link" value="<?php echo get_option('secao3_grupo1_item4_link')?>" placeholder="Link" style='width:48%;'>
<label for="secao3_title">Item 5 - Nome -> Link :</label> <input type="text" name="secao3_grupo1_item5_nome" value="<?php echo get_option('secao3_grupo1_item5_nome')?>" placeholder="Nome" style='width:50%;'> <input type="text" name="secao3_grupo1_item5_link" value="<?php echo get_option('secao3_grupo1_item5_link')?>" placeholder="Link" style='width:48%;'>
<label for="secao3_title">Item 6 - Nome -> Link :</label> <input type="text" name="secao3_grupo1_item6_nome" value="<?php echo get_option('secao3_grupo1_item6_nome')?>" placeholder="Nome" style='width:50%;'> <input type="text" name="secao3_grupo1_item6_link" value="<?php echo get_option('secao3_grupo1_item6_link')?>" placeholder="Link" style='width:48%;'>
</div>
</fieldset>

<!-- Grupo 2 -->
<fieldset style='display: inline;margin-right:4%;width:29%;'>
<legend><span class="number">2</span>Grupo 2</legend>
<div style='float:left;'>
<label for="secao3_title">Item 1 - Nome -> Link :</label> <input type="text" name="secao3_grupo2_item1_nome" value="<?php echo get_option('secao3_grupo2_item1_nome')?>" placeholder="Nome" style='width:50%;'> <input type="text" name="secao3_grupo2_item1_link" value="<?php echo get_option('secao3_grupo2_item1_link')?>" placeholder="Link" style='width:48%;'>
<label for="secao3_title">Item 2 - Nome -> Link :</label> <input type="text" name="secao3_grupo2_item2_nome" value="<?php echo get_option('secao3_grupo2_item2_nome')?>" placeholder="Nome" style='width:50%;'> <input type="text" name="secao3_grupo2_item2_link" value="<?php echo get_option('secao3_grupo2_item2_link')?>" placeholder="Link" style='width:48%;'>
<label for="secao3_title">Item 3 - Nome -> Link :</label> <input type="text" name="secao3_grupo2_item3_nome" value="<?php echo get_option('secao3_grupo2_item3_nome')?>" placeholder="Nome" style='width:50%;'> <input type="text" name="secao3_grupo2_item3_link" value="<?php echo get_option('secao3_grupo2_item3_link')?>" placeholder="Link" style='width:48%;'>
<label for="secao3_title">Item 4 - Nome -> Link :</label> <input type="text" name="secao3_grupo2_item4_nome" value="<?php echo get_option('secao3_grupo2_item4_nome')?>" placeholder="Nome" style='width:50%;'> <input type="text" name="secao3_grupo2_item4_link" value="<?php echo get_option('secao3_grupo2_item4_link')?>" placeholder="Link" style='width:48%;'>
<label for="secao3_title">Item 5 - Nome -> Link :</label> <input type="text" name="secao3_grupo2_item5_nome" value="<?php echo get_option('secao3_grupo2_item5_nome')?>" placeholder="Nome" style='width:50%;'> <input type="text" name="secao3_grupo2_item5_link" value="<?php echo get_option('secao3_grupo2_item5_link')?>" placeholder="Link" style='width:48%;'>
<label for="secao3_title">Item 6 - Nome -> Link :</label> <input type="text" name="secao3_grupo2_item6_nome" value="<?php echo get_option('secao3_grupo2_item6_nome')?>" placeholder="Nome" style='width:50%;'> <input type="text" name="secao3_grupo2_item6_link" value="<?php echo get_option('secao3_grupo2_item6_link')?>" placeholder="Link" style='width:48%;'>
</div>
</fieldset>

<!-- Grupo 3 -->
<fieldset style='display: inline;margin-right:4%;width:29%;'>
<legend><span class="number">3</span>Grupo 3</legend>
<div style='float:left;'>
<label for="secao3_title">Item 1 - Nome -> Link :</label> <input type="text" name="secao3_grupo3_item1_nome" value="<?php echo get_option('secao3_grupo3_item1_nome')?>" placeholder="Nome" style='width:50%;'> <input type="text" name="secao3_grupo3_item1_link" value="<?php echo get_option('secao3_grupo3_item1_link')?>" placeholder="Link" style='width:48%;'>
<label for="secao3_title">Item 2 - Nome -> Link :</label> <input type="text" name="secao3_grupo3_item2_nome" value="<?php echo get_option('secao3_grupo3_item2_nome')?>" placeholder="Nome" style='width:50%;'> <input type="text" name="secao3_grupo3_item2_link" value="<?php echo get_option('secao3_grupo3_item2_link')?>" placeholder="Link" style='width:48%;'>
<label for="secao3_title">Item 3 - Nome -> Link :</label> <input type="text" name="secao3_grupo3_item3_nome" value="<?php echo get_option('secao3_grupo3_item3_nome')?>" placeholder="Nome" style='width:50%;'> <input type="text" name="secao3_grupo3_item3_link" value="<?php echo get_option('secao3_grupo3_item3_link')?>" placeholder="Link" style='width:48%;'>
<label for="secao3_title">Item 4 - Nome -> Link :</label> <input type="text" name="secao3_grupo3_item4_nome" value="<?php echo get_option('secao3_grupo3_item4_nome')?>" placeholder="Nome" style='width:50%;'> <input type="text" name="secao3_grupo3_item4_link" value="<?php echo get_option('secao3_grupo3_item4_link')?>" placeholder="Link" style='width:48%;'>
<label for="secao3_title">Item 5 - Nome -> Link :</label> <input type="text" name="secao3_grupo3_item5_nome" value="<?php echo get_option('secao3_grupo3_item5_nome')?>" placeholder="Nome" style='width:50%;'> <input type="text" name="secao3_grupo3_item5_link" value="<?php echo get_option('secao3_grupo3_item5_link')?>" placeholder="Link" style='width:48%;'>
<label for="secao3_title">Item 6 - Nome -> Link :</label> <input type="text" name="secao3_grupo3_item6_nome" value="<?php echo get_option('secao3_grupo3_item6_nome')?>" placeholder="Nome" style='width:50%;'> <input type="text" name="secao3_grupo3_item6_link" value="<?php echo get_option('secao3_grupo3_item6_link')?>" placeholder="Link" style='width:48%;'>
</div>
</fieldset>

<!-- Grupo 4 -->
<fieldset style='display: inline;margin-right:4%;width:29%;'>
<legend><span class="number">4</span>Grupo 4</legend>
<div style='float:left;'>
<label for="secao3_title">Item 1 - Nome -> Link :</label> <input type="text" name="secao3_grupo4_item1_nome" value="<?php echo get_option('secao3_grupo4_item1_nome')?>" placeholder="Nome" style='width:50%;'> <input type="text" name="secao3_grupo4_item1_link" value="<?php echo get_option('secao3_grupo4_item1_link')?>" placeholder="Link" style='width:48%;'>
<label for="secao3_title">Item 2 - Nome -> Link :</label> <input type="text" name="secao3_grupo4_item2_nome" value="<?php echo get_option('secao3_grupo4_item2_nome')?>" placeholder="Nome" style='width:50%;'> <input type="text" name="secao3_grupo4_item2_link" value="<?php echo get_option('secao3_grupo4_item2_link')?>" placeholder="Link" style='width:48%;'>
<label for="secao3_title">Item 3 - Nome -> Link :</label> <input type="text" name="secao3_grupo4_item3_nome" value="<?php echo get_option('secao3_grupo4_item3_nome')?>" placeholder="Nome" style='width:50%;'> <input type="text" name="secao3_grupo4_item3_link" value="<?php echo get_option('secao3_grupo4_item3_link')?>" placeholder="Link" style='width:48%;'>
<label for="secao3_title">Item 4 - Nome -> Link :</label> <input type="text" name="secao3_grupo4_item4_nome" value="<?php echo get_option('secao3_grupo4_item4_nome')?>" placeholder="Nome" style='width:50%;'> <input type="text" name="secao3_grupo4_item4_link" value="<?php echo get_option('secao3_grupo4_item4_link')?>" placeholder="Link" style='width:48%;'>
<label for="secao3_title">Item 5 - Nome -> Link :</label> <input type="text" name="secao3_grupo4_item5_nome" value="<?php echo get_option('secao3_grupo4_item5_nome')?>" placeholder="Nome" style='width:50%;'> <input type="text" name="secao3_grupo4_item5_link" value="<?php echo get_option('secao3_grupo4_item5_link')?>" placeholder="Link" style='width:48%;'>
<label for="secao3_title">Item 6 - Nome -> Link :</label> <input type="text" name="secao3_grupo4_item6_nome" value="<?php echo get_option('secao3_grupo4_item6_nome')?>" placeholder="Nome" style='width:50%;'> <input type="text" name="secao3_grupo4_item6_link" value="<?php echo get_option('secao3_grupo4_item6_link')?>" placeholder="Link" style='width:48%;'>
</div>
</fieldset>

<!-- Grupo 5 -->
<fieldset style='display: inline;margin-right:4%;width:29%;'>
<legend><span class="number">5</span>Grupo 5</legend>
<div style='float:left;'>
<label for="secao3_title">Item 1 - Nome -> Link :</label> <input type="text" name="secao3_grupo5_item1_nome" value="<?php echo get_option('secao3_grupo5_item1_nome')?>" placeholder="Nome" style='width:50%;'> <input type="text" name="secao3_grupo5_item1_link" value="<?php echo get_option('secao3_grupo5_item1_link')?>" placeholder="Link" style='width:48%;'>
<label for="secao3_title">Item 2 - Nome -> Link :</label> <input type="text" name="secao3_grupo5_item2_nome" value="<?php echo get_option('secao3_grupo5_item2_nome')?>" placeholder="Nome" style='width:50%;'> <input type="text" name="secao3_grupo5_item2_link" value="<?php echo get_option('secao3_grupo5_item2_link')?>" placeholder="Link" style='width:48%;'>
<label for="secao3_title">Item 3 - Nome -> Link :</label> <input type="text" name="secao3_grupo5_item3_nome" value="<?php echo get_option('secao3_grupo5_item3_nome')?>" placeholder="Nome" style='width:50%;'> <input type="text" name="secao3_grupo5_item3_link" value="<?php echo get_option('secao3_grupo5_item3_link')?>" placeholder="Link" style='width:48%;'>
<label for="secao3_title">Item 4 - Nome -> Link :</label> <input type="text" name="secao3_grupo5_item4_nome" value="<?php echo get_option('secao3_grupo5_item4_nome')?>" placeholder="Nome" style='width:50%;'> <input type="text" name="secao3_grupo5_item4_link" value="<?php echo get_option('secao3_grupo5_item4_link')?>" placeholder="Link" style='width:48%;'>
<label for="secao3_title">Item 5 - Nome -> Link :</label> <input type="text" name="secao3_grupo5_item5_nome" value="<?php echo get_option('secao3_grupo5_item5_nome')?>" placeholder="Nome" style='width:50%;'> <input type="text" name="secao3_grupo5_item5_link" value="<?php echo get_option('secao3_grupo5_item5_link')?>" placeholder="Link" style='width:48%;'>
<label for="secao3_title">Item 6 - Nome -> Link :</label> <input type="text" name="secao3_grupo5_item6_nome" value="<?php echo get_option('secao3_grupo5_item6_nome')?>" placeholder="Nome" style='width:50%;'> <input type="text" name="secao3_grupo5_item6_link" value="<?php echo get_option('secao3_grupo5_item6_link')?>" placeholder="Link" style='width:48%;'>
</div>
</fieldset>

<!-- Grupo 6 -->
<fieldset style='display: inline;margin-right:4%;width:29%;'>
<legend><span class="number">6</span>Grupo 6</legend>
<div style='float:left;'>
<label for="secao3_title">Item 1 - Nome -> Link :</label> <input type="text" name="secao3_grupo6_item1_nome" value="<?php echo get_option('secao3_grupo6_item1_nome')?>" placeholder="Nome" style='width:50%;'> <input type="text" name="secao3_grupo6_item1_link" value="<?php echo get_option('secao3_grupo6_item1_link')?>" placeholder="Link" style='width:48%;'>
<label for="secao3_title">Item 2 - Nome -> Link :</label> <input type="text" name="secao3_grupo6_item2_nome" value="<?php echo get_option('secao3_grupo6_item2_nome')?>" placeholder="Nome" style='width:50%;'> <input type="text" name="secao3_grupo6_item2_link" value="<?php echo get_option('secao3_grupo6_item2_link')?>" placeholder="Link" style='width:48%;'>
<label for="secao3_title">Item 3 - Nome -> Link :</label> <input type="text" name="secao3_grupo6_item3_nome" value="<?php echo get_option('secao3_grupo6_item3_nome')?>" placeholder="Nome" style='width:50%;'> <input type="text" name="secao3_grupo6_item3_link" value="<?php echo get_option('secao3_grupo6_item3_link')?>" placeholder="Link" style='width:48%;'>
<label for="secao3_title">Item 4 - Nome -> Link :</label> <input type="text" name="secao3_grupo6_item4_nome" value="<?php echo get_option('secao3_grupo6_item4_nome')?>" placeholder="Nome" style='width:50%;'> <input type="text" name="secao3_grupo6_item4_link" value="<?php echo get_option('secao3_grupo6_item4_link')?>" placeholder="Link" style='width:48%;'>
<label for="secao3_title">Item 5 - Nome -> Link :</label> <input type="text" name="secao3_grupo6_item5_nome" value="<?php echo get_option('secao3_grupo6_item5_nome')?>" placeholder="Nome" style='width:50%;'> <input type="text" name="secao3_grupo6_item5_link" value="<?php echo get_option('secao3_grupo6_item5_link')?>" placeholder="Link" style='width:48%;'>
<label for="secao3_title">Item 6 - Nome -> Link :</label> <input type="text" name="secao3_grupo6_item6_nome" value="<?php echo get_option('secao3_grupo6_item6_nome')?>" placeholder="Nome" style='width:50%;'> <input type="text" name="secao3_grupo6_item6_link" value="<?php echo get_option('secao3_grupo6_item6_link')?>" placeholder="Link" style='width:48%;'>
</div>
</fieldset>

</div>
<!----------------------------------------------------------------------- Seção 3 - Fim Links ----------------------------------------------------------------------->

<!----------------------------------------------------------------------- Seção 3 - Inicio Regulamentação,Parceiros e Prêmios ----------------------------------------------------------------------->
<button type="button" class="collapsible">+ Regulamentação,Parceiros e Prêmios</button>
<div id='secao1_content4' class="content">

<!-- Área de Regulamentação -->
<legend>Regulamentação</legend>
<!-- Regulamentação 1 -->
<fieldset style='display: inline;margin-right:4%;width:29%;'>
<legend><span class="number">1</span>Imagem</legend>
<?php echo $this->d1_upload->get_image_options('secao3_regulamentacao1_img'); ?>
</fieldset>
<!-- Regulamentação 2 -->
<fieldset style='display: inline;margin-right:4%;width:29%;'>
<legend><span class="number">2</span>Imagem</legend>
<?php echo $this->d1_upload->get_image_options('secao3_regulamentacao2_img'); ?>
</fieldset>
<!-- Regulamentação 3 -->
<fieldset style='display: inline;margin-right:4%;width:29%;'>
<legend><span class="number">3</span>Imagem</legend>
<?php echo $this->d1_upload->get_image_options('secao3_regulamentacao3_img'); ?>
</fieldset>

<!-- Área de Parceiros -->
<legend>Parceiros</legend>
<!-- Parceiros 1 -->
<fieldset style='display: inline;margin-right:4%;width:29%;'>
<legend><span class="number">1</span>Imagem</legend>
<?php echo $this->d1_upload->get_image_options('secao3_parceiros1_img'); ?>
</fieldset>
<!-- Parceiros 2 -->
<fieldset style='display: inline;margin-right:4%;width:29%;'>
<legend><span class="number">2</span>Imagem</legend>
<?php echo $this->d1_upload->get_image_options('secao3_parceiros2_img'); ?>
</fieldset>
<!-- Parceiros 3 -->
<fieldset style='display: inline;margin-right:4%;width:29%;'>
<legend><span class="number">3</span>Imagem</legend>
<?php echo $this->d1_upload->get_image_options('secao3_parceiros3_img'); ?>
</fieldset>

<!-- Área de Prêmios -->
<legend>Prêmios</legend>
<!-- Prêmios 1 -->
<fieldset style='display: inline;margin-right:4%;width:29%;'>
<legend><span class="number">1</span>Imagem</legend>
<?php echo $this->d1_upload->get_image_options('secao3_premios1_img'); ?>
</fieldset>
<!-- Prêmios 2 -->
<fieldset style='display: inline;margin-right:4%;width:29%;'>
<legend><span class="number">2</span>Imagem</legend>
<?php echo $this->d1_upload->get_image_options('secao3_premios2_img'); ?>
</fieldset>
<!-- Prêmios 3 -->
<fieldset style='display: inline;margin-right:4%;width:29%;'>
<legend><span class="number">3</span>Imagem</legend>
<?php echo $this->d1_upload->get_image_options('secao3_premios3_img'); ?>
</fieldset>

</div>
<!----------------------------------------------------------------------- Seção 3 - Fim Regulamentação,Parceiros e Prêmios -------------------------------------------------------------------------->

<!----------------------------------------------------------------------- Seção 3 - Inicio Pitch ----------------------------------------------------------------------->
<button type="button" class="collapsible">+ Pitch</button>
<div id='secao1_content2' class="content">
<label for="secao3_pitch">Pitch Footer:</label> <textarea name="secao3_pitch" placeholder="Pitch Footer" rows=10><?php echo get_option('secao3_pitch')?></textarea>
</div>
<!----------------------------------------------------------------------- Seção 3 - Fim Pitch -------------------------------------------------------------------------->

<script>var coll=document.getElementsByClassName("collapsible");var i;for(i=0;i<coll.length;i++){coll[i].addEventListener("click",function(){this.classList.toggle("active");var content=this.nextElementSibling;if(content.style.display==="block"){content.style.display="none"}else{content.style.display="block"}})}</script>