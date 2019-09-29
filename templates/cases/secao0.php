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
<!-- ------------------------------------- Início Seção Cards Cases de Sucesso ----------------------------------------------->
<!-- Card Primeira Parte -->
<button type="button" class="collapsible">+ Cases de Sucesso - Cards</button>
<!-- Case 1 -->
<div id='secao1_content1' class="content">
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

<!-- ------------------------------------- Início Falar com Especialista ----------------------------------------------->
<!-- Card Primeira Parte -->
<button type="button" class="collapsible">+ Falar Com Especialista?</button>
<div id='secao2_content1' class="content">
<label for="secao2_title">Titulo Falar Com Especialista:</label><input type="text" name="secao2_title" value="<?php echo get_option('secao2_title')?>" placeholder="Titulo da Seção Falar Com Especialista">
<label for="secao2_link_botao">Link Botão:</label><input type="text" name="secao2_link_botao" value="<?php echo get_option('secao2_link_botao')?>" placeholder="Link Botão">

<!-- Especialista 1 -->
<fieldset style='display: inline;margin-right:4%;width:45%;'>
<legend><span class="number">1</span>Processo</legend>
<label for="secao2_minicard1_title">Titulo MiniCard 1:</label> <textarea name="secao2_minicard1_title" placeholder="Titulo MiniCard 1"><?php echo get_option('secao2_minicard1_title')?></textarea>
<label for="secao2_minicard1_descricao">Descrição MiniCard 1:</label> <textarea name="secao2_minicard1_descricao" placeholder="Descrição MiniCard 1"><?php echo get_option('secao2_minicard1_descricao')?></textarea>
</fieldset>

<!-- Especialista 2 -->
<fieldset style='display: inline;margin-right:4%;width:45%;'>
<legend><span class="number">2</span>Processo</legend>
<label for="secao2_minicard2_title">Titulo MiniCard 2:</label> <textarea name="secao2_minicard2_title" placeholder="Titulo MiniCard 2"><?php echo get_option('secao2_minicard2_title')?></textarea>
<label for="secao2_minicard2_descricao">Descrição MiniCard 2:</label> <textarea name="secao2_minicard2_descricao" placeholder="Descrição MiniCard 2"><?php echo get_option('secao2_minicard2_descricao')?></textarea>
</fieldset>

<!-- Especialista 3 -->
<fieldset style='display: inline;margin-right:4%;width:45%;'>
<legend><span class="number">3</span>Processo</legend>
<label for="secao2_minicard3_title">Titulo MiniCard 3:</label> <textarea name="secao2_minicard3_title" placeholder="Titulo MiniCard 3"><?php echo get_option('secao2_minicard3_title')?></textarea>
<label for="secao2_minicard3_descricao">Descrição MiniCard 3:</label> <textarea name="secao2_minicard3_descricao" placeholder="Descrição MiniCard 3"><?php echo get_option('secao2_minicard3_descricao')?></textarea>
</fieldset>

<!-- Especialista 4 -->
<fieldset style='display: inline;margin-right:4%;width:45%;'>
<legend><span class="number">4</span>Processo</legend>
<label for="secao2_minicard4_title">Titulo MiniCard 4:</label> <textarea name="secao2_minicard4_title" placeholder="Titulo MiniCard 4"><?php echo get_option('secao2_minicard4_title')?></textarea>
<label for="secao2_minicard4_descricao">Descrição MiniCard 4:</label> <textarea name="secao2_minicard4_descricao" placeholder="Descrição MiniCard 4"><?php echo get_option('secao2_minicard4_descricao')?></textarea>
</fieldset>
</div>
<!-------------------------------------- Fim Falar com Especialista ----------------------------------------------->

<!-- ------------------------------------- Início Seção Conteúdo Expert --------------------------------------->
<!-- Titulo Seção Parte 2 -->
<button type="button" class="collapsible">+ Conteúdo Expert</button>
<div id='secao3_content1' class="content">

</div>
<!-- ------------------------------------- Início Seção Conteúdo Expert ----------------------------------------------->

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