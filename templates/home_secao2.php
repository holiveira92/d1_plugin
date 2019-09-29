<?php
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style type="text/css">
.form-style-5{
	width: 97%;
	padding: 10px 20px;
	background: #f4f7f8;
	padding: 20px;
	background: #f4f7f8;
	border-radius: 8px;
	font-family: Georgia, "Times New Roman", Times, serif;
}
.form-style-5 fieldset{
	border: none;
}
.form-style-5 legend {
	font-size: 1.4em;
	margin-bottom: 10px;
}
.form-style-5 label {
	display: block;
	margin-bottom: 8px;
}
.form-style-5 input[type="text"],
.form-style-5 input[type="date"],
.form-style-5 input[type="datetime"],
.form-style-5 input[type="email"],
.form-style-5 input[type="number"],
.form-style-5 input[type="search"],
.form-style-5 input[type="time"],
.form-style-5 input[type="url"],
.form-style-5 textarea,
.form-style-5 select {
	font-family: Georgia, "Times New Roman", Times, serif;
	background: rgba(255,255,255,.1);
	border: none;
	border-radius: 4px;
	font-size: 16px;
	margin: 0;
	outline: 0;
	padding: 7px;
	width: 100%;
	box-sizing: border-box; 
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box; 
	background-color: #e8eeef;
	color:#8a97a0;
	-webkit-box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
	box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
	margin-bottom: 30px;
	
}
.form-style-5 input[type="text"]:focus,
.form-style-5 input[type="date"]:focus,
.form-style-5 input[type="datetime"]:focus,
.form-style-5 input[type="email"]:focus,
.form-style-5 input[type="number"]:focus,
.form-style-5 input[type="search"]:focus,
.form-style-5 input[type="time"]:focus,
.form-style-5 input[type="url"]:focus,
.form-style-5 textarea:focus,
.form-style-5 select:focus{
	background: #d2d9dd;
}
.form-style-5 select{
	-webkit-appearance: menulist-button;
	height:35px;
}
.form-style-5 .number {
    display: inline-block;
	background: #1abc9c;
	color: #fff;
	height: 30px;
	width: 30px;
	display: inline-block;
	font-size: 0.8em;
	margin-right: 4px;
	line-height: 30px;
	text-align: center;
	text-shadow: 0 1px 0 rgba(255,255,255,0.2);
	border-radius: 15px 15px 15px 0px;
}

.collapsible {
  background-color: #777;
  color: white;
  cursor: pointer;
  padding: 18px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 15px;
}

.active, .collapsible:hover {
  background-color: #555;
}

.content {
  padding: 0 18px;
  display: none;
  overflow: hidden;
  background-color: #f1f1f1;
}
</style>
</head>
<body>
<div class="form-style-5">
<!-- ------------------------------------- Início Seção Config. Seção -  Cases de Sucesso --------------------------------------->
<!-- Titulo Seção Parte 1 -->

<button type="button" class="collapsible">+ Seção - Cases de Sucesso</button>
<div id='secao2_content1' class="content">
<fieldset style='display: inline;margin-right:4%;width:97%;'>
<label for="secao2_section_title" style='display:inline;'>Título Seção:</label> <input type="text" name="secao2_section_title" value="<?php echo get_option('secao2_section_title')?>" placeholder="Titulo da Seção Parte 1" style='width:38%;'>
<label for="secao2_call_action_cases" style='display:inline;'>Chamada para Ação - Cases:</label> <input type="text" name="secao2_call_action_cases" value="<?php echo get_option('secao2_call_action_cases')?>" placeholder="Chamada para Ação - Cases" style='width:38%;'>
</fieldset>
</div>
<br>
<!-- ------------------------------------- Fim Seção Config. Seção -  Cases de Sucesso ------------------------------------------>

<!-- ------------------------------------- Início Seção Cards Cases de Sucesso ----------------------------------------------->
<!-- Card Primeira Parte -->
<button type="button" class="collapsible">+ Cases de Sucesso - Cards</button>
<!-- Case 1 -->
<div id='secao2_content2' class="content">
<fieldset style='display: inline;margin-right:4%;width:29%;'>
<legend><span class="number">1</span>Card 1</legend>
<label for="secao2_title_card_case1">Título:</label><input type="text" name="secao2_title_card_case1" value="<?php echo get_option('secao2_title_card_case1')?>" placeholder="Titulo do Card 1">
<label for="secao2_subtitle_card_case1">Objetivo:</label><input type="text" name="secao2_subtitle_card_case1" value="<?php echo get_option('secao2_subtitle_card_case1')?>" placeholder="SubTitulo do Card 1">
<label for="secao2_text_footer_card_case1">Número Impacto:</label><input type="text" name="secao2_text_footer_card_case1" value="<?php echo get_option('secao2_text_footer_card_case1')?>" placeholder="Texto Card Footer 1">
<label for="secao2_subtext_footer_card_case1">Descrição:</label><input type="text" name="secao2_subtext_footer_card_case1" value="<?php echo get_option('secao2_subtext_footer_card_case1')?>" placeholder="SubTexto Card Footer 1">
<label for="secao2_card1_link">Link:</label><input type="text" name="secao2_card1_link" value="<?php echo get_option('secao2_card1_link')?>" placeholder="Link">
<legend>Imagem de Fundo</legend>
<?php echo $this->d1_upload->get_image_options('secao2_img_bg_case1'); ?>
</fieldset>

<!-- Case 2 -->
<fieldset style='display: inline;margin-right:4%;width:29%;'>
<legend><span class="number">2</span>Card 2</legend>
<label for="secao2_title_card_case2">Título:</label><input type="text" name="secao2_title_card_case2" value="<?php echo get_option('secao2_title_card_case2')?>" placeholder="Titulo do Card 2">
<label for="secao2_subtitle_card_case2">Objetivo:</label><input type="text" name="secao2_subtitle_card_case2" value="<?php echo get_option('secao2_subtitle_card_case2')?>" placeholder="SubTitulo do Card 2">
<label for="secao2_text_footer_card_case2">Número Impacto:</label><input type="text" name="secao2_text_footer_card_case2" value="<?php echo get_option('secao2_text_footer_card_case2')?>" placeholder="Texto Card Footer 2">
<label for="secao2_subtext_footer_card_case2">Descrição:</label><input type="text" name="secao2_subtext_footer_card_case2" value="<?php echo get_option('secao2_subtext_footer_card_case2')?>" placeholder="SubTexto Card Footer 2">
<label for="secao2_card2_link">Link:</label> <input type="text" name="secao2_card2_link" value="<?php echo get_option('secao2_card2_link')?>" placeholder="Link">
<legend>Imagem de Fundo</legend>
<?php echo $this->d1_upload->get_image_options('secao2_img_bg_case2'); ?>
</fieldset>

<!-- Case 3 -->
<fieldset style='display: inline;margin-right:4%;width:29%;'>
<legend><span class="number">3</span>Card 3</legend>
<label for="secao2_title_card_case3">Título:</label><input type="text" name="secao2_title_card_case3" value="<?php echo get_option('secao2_title_card_case3')?>" placeholder="Titulo do Card 3">
<label for="secao2_subtitle_card_case3">Objetivo:</label><input type="text" name="secao2_subtitle_card_case3" value="<?php echo get_option('secao2_subtitle_card_case3')?>" placeholder="SubTitulo do Card 3">
<label for="secao2_text_footer_card_case3">Número Impacto:</label><input type="text" name="secao2_text_footer_card_case3" value="<?php echo get_option('secao2_text_footer_card_case3')?>" placeholder="Texto Card Footer 3">
<label for="secao2_subtext_footer_card_case3">Descrição:</label><input type="text" name="secao2_subtext_footer_card_case3" value="<?php echo get_option('secao2_subtext_footer_card_case3')?>" placeholder="SubTexto Card Footer 3">
<label for="secao2_card3_link">Link:</label><input type="text" name="secao2_card3_link" value="<?php echo get_option('secao2_card3_link')?>" placeholder="Link">
<legend>Imagem de Fundo</legend>
<?php echo $this->d1_upload->get_image_options('secao2_img_bg_case3'); ?>
</fieldset>
</div>
<!-- ------------------------------------- Fim Seção Cards Cases de Sucesso ----------------------------------------------->

<!-- ------------------------------------- Início Seção Clientes de Sucesso ----------------------------------------------->
<!-- Card Primeira Parte -->
<button type="button" class="collapsible">+ Clientes de Sucesso</button>
<div id='secao2_content3' class="content">
<label for="secao2_empresas_title">Titulo da Seção Empresas de Sucesso:</label><input type="text" name="secao2_empresas_title" value="<?php echo get_option('secao2_empresas_title')?>" placeholder="Titulo da Seção Empresas de Sucesso">

<!-- Empresa 1 -->
<fieldset style='display: inline;margin-right:4%;width:20%;'>
<legend><span class="number">1</span>Empresa 1</legend>
<legend>Logo do Empresa</legend> <?php echo $this->d1_upload->get_image_options('secao2_img_empresa1'); ?>
</fieldset>

<!-- Empresa 2 -->
<fieldset style='display: inline;margin-right:4%;width:20%;'>
<legend><span class="number">2</span>Empresa 2</legend>
<legend>Logo do Empresa</legend> <?php echo $this->d1_upload->get_image_options('secao2_img_empresa2'); ?>
</fieldset>

<!-- Empresa 3 -->
<fieldset style='display: inline;margin-right:4%;width:20%;'>
<legend><span class="number">3</span>Empresa 3</legend>
<legend>Logo do Empresa</legend> <?php echo $this->d1_upload->get_image_options('secao2_img_empresa3'); ?>
</fieldset>

<!-- Empresa 4 -->
<fieldset style='display: inline;margin-right:4%;width:20%;'>
<legend><span class="number">4</span>Empresa 4</legend>
<legend>Logo do Empresa</legend> <?php echo $this->d1_upload->get_image_options('secao2_img_empresa4'); ?>
</fieldset>
<br><br>
<br><br>
<!-- Empresa 5 -->
<fieldset style='display: inline;margin-right:4%;width:20%;'>
<legend><span class="number">5</span>Empresa 5</legend>
<legend>Logo do Empresa</legend> <?php echo $this->d1_upload->get_image_options('secao2_img_empresa5'); ?>
</fieldset>

<!-- Empresa 6 -->
<fieldset style='display: inline;margin-right:4%;width:20%;'>
<legend><span class="number">6</span>Empresa 6</legend>
<legend>Logo do Empresa</legend> <?php echo $this->d1_upload->get_image_options('secao2_img_empresa6'); ?>
</fieldset>

<!-- Empresa 7 -->
<fieldset style='display: inline;margin-right:4%;width:20%;'>
<legend><span class="number">7</span>Empresa 7</legend>
<legend>Logo do Empresa</legend> <?php echo $this->d1_upload->get_image_options('secao2_img_empresa7'); ?>
</fieldset>

<!-- Empresa 8 -->
<fieldset style='display: inline;margin-right:4%;width:20%;'>
<legend><span class="number">8</span>Empresa 8</legend>
<legend>Logo do Empresa</legend> <?php echo $this->d1_upload->get_image_options('secao2_img_empresa8'); ?>
</fieldset>
</div>
<!-- ------------------------------------- Fim Seção Clientes de Sucesso ----------------------------------------------->

<!-- ------------------------------------- Início Seção Config. Seção - Desafios --------------------------------------->
<!-- Titulo Seção Parte 2 -->
<button type="button" class="collapsible">+ Desafios</button>
<div id='secao2_content4' class="content">
<fieldset style='display: inline;margin-right:4%;width:97%;'>
<label for="secao2_section_title_part2">Titulo da Seção Parte 2:</label> <input type="text" name="secao2_section_title_part2" value="<?php echo get_option('secao2_section_title_part2')?>" placeholder="Titulo da Seção Parte 2">
</fieldset>
<br>

<!-- Titulo Seção Parte 3 -->
<br><br>
<h1>Seção - Desafio</h1>
<fieldset style='display: inline;margin-right:4%;width:97%;'>
<label for="secao2_section_title_part3">Titulo da Seção Parte 3:</label> <input type="text" name="secao2_section_title_part3" value="<?php echo get_option('secao2_section_title_part3')?>" placeholder="Titulo da Seção Parte 2">
</fieldset>
<br>

<!-- Card Terceira Parte -->
<!-- Card 1 -->
<fieldset style='display: inline;margin-right:4%;width:29%;'>
<legend><span class="number">1</span>Card 1</legend>
<input type="text" name="secao2_title_card2_case1'" value="<?php echo get_option('secao2_title_card2_case1')?>" placeholder="Titulo Card 2 Case 1">
<input type="text" name="secao2_subtitle_card2_case1" value="<?php echo get_option('secao2_subtitle_card2_case1')?>" placeholder="SubTitulo Card 2 Case 1">
<legend>Imagem de Fundo</legend>
<?php echo $this->d1_upload->get_image_options('secao2_img_bg_card2_case1'); ?>
</fieldset>

<!-- Card 2 -->
<fieldset style='display: inline;margin-right:4%;width:29%;'>
<legend><span class="number">1</span>Card 2</legend>
<input type="text" name="secao2_title_card2_case2'" value="<?php echo get_option('secao2_title_card2_case2')?>" placeholder="Titulo Card 2 Case 1">
<input type="text" name="secao2_subtitle_card2_case2" value="<?php echo get_option('secao2_subtitle_card2_case2')?>" placeholder="SubTitulo Card 2 Case 1">
<legend>Imagem de Fundo</legend>
<?php echo $this->d1_upload->get_image_options('secao2_img_bg_card2_case2'); ?>
</fieldset>

<!-- Card 3 -->
<fieldset style='display: inline;margin-right:4%;width:29%;'>
<legend><span class="number">1</span>Card 2</legend>
<input type="text" name="secao2_title_card2_case3'" value="<?php echo get_option('secao2_title_card2_case3')?>" placeholder="Titulo Card 2 Case 1">
<input type="text" name="secao2_subtitle_card2_case3" value="<?php echo get_option('secao2_subtitle_card2_case3')?>" placeholder="SubTitulo Card 2 Case 1">
<legend>Imagem de Fundo</legend>
<?php echo $this->d1_upload->get_image_options('secao2_img_bg_card2_case3'); ?>
</fieldset>
</div>

</div>
</body>
</html>

<script>
//JS para expandir e reduzir conteudo
var coll = document.getElementsByClassName("collapsible");
var i;
for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.display === "block") {
      content.style.display = "none";
    } else {
      content.style.display = "block";
    }
  });
}
</script>