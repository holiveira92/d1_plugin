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

<!-- Seção 1 - Configs Gerais -->
<button type="button" class="collapsible">+ Config Seção</button>
<div id='secao1_content1' class="content">
<fieldset style='display: inline;margin-right:4%;width:97%;'>
<label for="secao6_title">Nome:</label> <input type="text" name="secao6_title" value="<?php echo get_option_esc('secao6_title')?>" placeholder="Titulo">
</fieldset>
</div>

<!-------------------------------------------------------------------------- Seção 2 - Inicio Modulo 1 --------------------------------------------------------------------->
<button type="button" class="collapsible">+ Modulo 1</button>
<div id='secao1_content2' class="content">
<label for="secao6_modulo1_nome">Nome do Módulo:</label> <input type="text" name="secao6_modulo1_nome" value="<?php echo get_option_esc('secao6_modulo1_nome')?>" placeholder="Nome do Módulo">

<!-- Seção 2 - Modulo 1 - Subitem 1 -->
<fieldset style='display: inline;margin-right:4%;width:29%;'>
<legend><span class="number">1</span>Subitem 1</legend>
<label for="secao6_modulo1_subitem1">Nome do SubItem 1:</label> <input type="text" name="secao6_modulo1_subitem1" value="<?php echo get_option_esc('secao6_modulo1_subitem1')?>" placeholder="Nome do SubItem 1:">
<label for="secao6_modulo1_subitem1_descricao">Descrição SubItem 1:</label> <textarea name="secao6_modulo1_subitem1_descricao" placeholder="Descrição" rows=5><?php echo get_option_esc('secao6_modulo1_subitem1_descricao')?></textarea>
<label for="secao6_modulo1_subitem1_link">Link Leia Mais SubItem 1:</label> <input type="text" name="secao6_modulo1_subitem1_link" value="<?php echo get_option_esc('secao6_modulo1_subitem1_link')?>" placeholder="Link Leia Mais SubItem 1">
<label for="secao6_modulo1_subitem1_image">Imagem de Background :</label> <?php echo $this->d1_upload->get_image_options('secao6_modulo1_subitem1_image'); ?>
</fieldset>
<!-- Seção 2 - Modulo 1 - Subitem 2 -->
<fieldset style='display: inline;margin-right:4%;width:29%;'>
<legend><span class="number">2</span>Subitem 2</legend>
<label for="secao6_modulo1_subitem2">Nome do SubItem 2:</label> <input type="text" name="secao6_modulo1_subitem2" value="<?php echo get_option_esc('secao6_modulo1_subitem2')?>" placeholder="Nome do SubItem 2:">
<label for="secao6_modulo1_subitem2_descricao">Descrição SubItem 2:</label> <textarea name="secao6_modulo1_subitem2_descricao" placeholder="Descrição" rows=5><?php echo get_option_esc('secao6_modulo1_subitem2_descricao')?></textarea>
<label for="secao6_modulo1_subitem2_link">Link Leia Mais SubItem 2:</label> <input type="text" name="secao6_modulo1_subitem2_link" value="<?php echo get_option_esc('secao6_modulo1_subitem2_link')?>" placeholder="Link Leia Mais SubItem 2">
<label for="secao6_modulo1_subitem2_image">Imagem de Background :</label> <?php echo $this->d1_upload->get_image_options('secao6_modulo1_subitem2_image'); ?>
</fieldset>
<!-- Seção 2 - Modulo 1 - Subitem 3 -->
<fieldset style='display: inline;margin-right:4%;width:29%;'>
<legend><span class="number">3</span>Subitem 3</legend>
<label for="secao6_modulo1_subitem3">Nome do SubItem 3:</label> <input type="text" name="secao6_modulo1_subitem3" value="<?php echo get_option_esc('secao6_modulo1_subitem3')?>" placeholder="Nome do SubItem 3:">
<label for="secao6_modulo1_subitem3_descricao">Descrição SubItem 3:</label> <textarea name="secao6_modulo1_subitem3_descricao" placeholder="Descrição" rows=5><?php echo get_option_esc('secao6_modulo1_subitem3_descricao')?></textarea>
<label for="secao6_modulo1_subitem3_link">Link Leia Mais SubItem 3:</label> <input type="text" name="secao6_modulo1_subitem3_link" value="<?php echo get_option_esc('secao6_modulo1_subitem3_link')?>" placeholder="Link Leia Mais SubItem 3">
<label for="secao6_modulo1_subitem3_image">Imagem de Background :</label> <?php echo $this->d1_upload->get_image_options('secao6_modulo1_subitem3_image'); ?>
</fieldset>
</div>
<!---------------------------------------------------------------------- Seção 2 - Fim Modulo 1 ----------------------------------------------------------------------------------->

<!----------------------------------------------------------------------- Seção 2 - Inicio Modulo 2 ----------------------------------------------------------------------------->
<button type="button" class="collapsible">+ Modulo 2</button>
<div id='secao1_content2' class="content">
<label for="secao6_modulo2_nome">Nome do Módulo:</label> <input type="text" name="secao6_modulo2_nome" value="<?php echo get_option_esc('secao6_modulo2_nome')?>" placeholder="Nome do Módulo">

<!-- Seção 2 - Modulo 2 - Subitem 1 -->
<fieldset style='display: inline;margin-right:4%;width:29%;'>
<legend><span class="number">1</span>Subitem 1</legend>
<label for="secao6_modulo2_subitem1">Nome do SubItem 1:</label> <input type="text" name="secao6_modulo2_subitem1" value="<?php echo get_option_esc('secao6_modulo2_subitem1')?>" placeholder="Nome do SubItem 1:">
<label for="secao6_modulo2_subitem1_descricao">Descrição SubItem 1:</label> <textarea name="secao6_modulo2_subitem1_descricao" placeholder="Descrição" rows=5><?php echo get_option_esc('secao6_modulo2_subitem1_descricao')?></textarea>
<label for="secao6_modulo2_subitem1_link">Link Leia Mais SubItem 1:</label> <input type="text" name="secao6_modulo2_subitem1_link" value="<?php echo get_option_esc('secao6_modulo2_subitem1_link')?>" placeholder="Link Leia Mais SubItem 1">
<label for="secao6_modulo2_subitem1_image">Imagem de Background :</label> <?php echo $this->d1_upload->get_image_options('secao6_modulo2_subitem1_image'); ?>
</fieldset>
<!-- Seção 2 - Modulo 2 - Subitem 2 -->
<fieldset style='display: inline;margin-right:4%;width:29%;'>
<legend><span class="number">2</span>Subitem 2</legend>
<label for="secao6_modulo2_subitem2">Nome do SubItem 2:</label> <input type="text" name="secao6_modulo2_subitem2" value="<?php echo get_option_esc('secao6_modulo2_subitem2')?>" placeholder="Nome do SubItem 2:">
<label for="secao6_modulo2_subitem2_descricao">Descrição SubItem 2:</label> <textarea name="secao6_modulo2_subitem2_descricao" placeholder="Descrição" rows=5><?php echo get_option_esc('secao6_modulo2_subitem2_descricao')?></textarea>
<label for="secao6_modulo2_subitem2_link">Link Leia Mais SubItem 2:</label> <input type="text" name="secao6_modulo2_subitem2_link" value="<?php echo get_option_esc('secao6_modulo2_subitem2_link')?>" placeholder="Link Leia Mais SubItem 2">
<label for="secao6_modulo2_subitem2_image">Imagem de Background :</label> <?php echo $this->d1_upload->get_image_options('secao6_modulo2_subitem2_image'); ?>
</fieldset>
<!-- Seção 2 - Modulo 2 - Subitem 3 -->
<fieldset style='display: inline;margin-right:4%;width:29%;'>
<legend><span class="number">3</span>Subitem 3</legend>
<label for="secao6_modulo2_subitem3">Nome do SubItem 3:</label> <input type="text" name="secao6_modulo2_subitem3" value="<?php echo get_option_esc('secao6_modulo2_subitem3')?>" placeholder="Nome do SubItem 3:">
<label for="secao6_modulo2_subitem3_descricao">Descrição SubItem 3:</label> <textarea name="secao6_modulo2_subitem3_descricao" placeholder="Descrição" rows=5><?php echo get_option_esc('secao6_modulo2_subitem3_descricao')?></textarea>
<label for="secao6_modulo2_subitem3_link">Link Leia Mais SubItem 3:</label> <input type="text" name="secao6_modulo2_subitem3_link" value="<?php echo get_option_esc('secao6_modulo2_subitem3_link')?>" placeholder="Link Leia Mais SubItem 3">
<label for="secao6_modulo2_subitem3_image">Imagem de Background :</label> <?php echo $this->d1_upload->get_image_options('secao6_modulo2_subitem3_image'); ?>
</fieldset>
</div>
<!-------------------------------------------------------------------------- Seção 2 - Fim Modulo 2 ------------------------------------------------------------------------------->

<!----------------------------------------------------------------------- Seção 2 - Inicio Modulo 3 ----------------------------------------------------------------------------->
<button type="button" class="collapsible">+ Modulo 3</button>
<div id='secao1_content2' class="content">
<label for="secao6_modulo3_nome">Nome do Módulo:</label> <input type="text" name="secao6_modulo3_nome" value="<?php echo get_option_esc('secao6_modulo3_nome')?>" placeholder="Nome do Módulo">

<!-- Seção 2 - Modulo 3 - Subitem 1 -->
<fieldset style='display: inline;margin-right:4%;width:29%;'>
<legend><span class="number">1</span>Subitem 1</legend>
<label for="secao6_modulo3_subitem1">Nome do SubItem 1:</label> <input type="text" name="secao6_modulo3_subitem1" value="<?php echo get_option_esc('secao6_modulo3_subitem1')?>" placeholder="Nome do SubItem 1:">
<label for="secao6_modulo3_subitem1_descricao">Descrição SubItem 1:</label> <textarea name="secao6_modulo3_subitem1_descricao" placeholder="Descrição" rows=5><?php echo get_option_esc('secao6_modulo3_subitem1_descricao')?></textarea>
<label for="secao6_modulo3_subitem1_link">Link Leia Mais SubItem 1:</label> <input type="text" name="secao6_modulo3_subitem1_link" value="<?php echo get_option_esc('secao6_modulo3_subitem1_link')?>" placeholder="Link Leia Mais SubItem 1">
<label for="secao6_modulo3_subitem1_image">Imagem de Background :</label> <?php echo $this->d1_upload->get_image_options('secao6_modulo3_subitem1_image'); ?>
</fieldset>
<!-- Seção 2 - Modulo 3 - Subitem 2 -->
<fieldset style='display: inline;margin-right:4%;width:29%;'>
<legend><span class="number">2</span>Subitem 2</legend>
<label for="secao6_modulo3_subitem2">Nome do SubItem 2:</label> <input type="text" name="secao6_modulo3_subitem2" value="<?php echo get_option_esc('secao6_modulo3_subitem2')?>" placeholder="Nome do SubItem 2:">
<label for="secao6_modulo3_subitem2_descricao">Descrição SubItem 2:</label> <textarea name="secao6_modulo3_subitem2_descricao" placeholder="Descrição" rows=5><?php echo get_option_esc('secao6_modulo3_subitem2_descricao')?></textarea>
<label for="secao6_modulo3_subitem2_link">Link Leia Mais SubItem 2:</label> <input type="text" name="secao6_modulo3_subitem2_link" value="<?php echo get_option_esc('secao6_modulo3_subitem2_link')?>" placeholder="Link Leia Mais SubItem 2">
<label for="secao6_modulo3_subitem2_image">Imagem de Background :</label> <?php echo $this->d1_upload->get_image_options('secao6_modulo3_subitem2_image'); ?>
</fieldset>
<!-- Seção 2 - Modulo 3 - Subitem 3 -->
<fieldset style='display: inline;margin-right:4%;width:29%;'>
<legend><span class="number">3</span>Subitem 3</legend>
<label for="secao6_modulo3_subitem3">Nome do SubItem 3:</label> <input type="text" name="secao6_modulo3_subitem3" value="<?php echo get_option_esc('secao6_modulo3_subitem3')?>" placeholder="Nome do SubItem 3:">
<label for="secao6_modulo3_subitem3_descricao">Descrição SubItem 3:</label> <textarea name="secao6_modulo3_subitem3_descricao" placeholder="Descrição" rows=5><?php echo get_option_esc('secao6_modulo3_subitem3_descricao')?></textarea>
<label for="secao6_modulo3_subitem3_link">Link Leia Mais SubItem 3:</label> <input type="text" name="secao6_modulo3_subitem3_link" value="<?php echo get_option_esc('secao6_modulo3_subitem3_link')?>" placeholder="Link Leia Mais SubItem 3">
<label for="secao6_modulo3_subitem3_image">Imagem de Background :</label> <?php echo $this->d1_upload->get_image_options('secao6_modulo3_subitem3_image'); ?>
</fieldset>
</div>
<!-------------------------------------------------------------------------- Seção 2 - Fim Modulo 3 ------------------------------------------------------------------------------->

<!----------------------------------------------------------------------- Seção 2 - Inicio Modulo 4 ----------------------------------------------------------------------------->
<button type="button" class="collapsible">+ Modulo 4</button>
<div id='secao1_content2' class="content">
<label for="secao6_modulo4_nome">Nome do Módulo:</label> <input type="text" name="secao6_modulo4_nome" value="<?php echo get_option_esc('secao6_modulo4_nome')?>" placeholder="Nome do Módulo">

<!-- Seção 2 - Modulo 4 - Subitem 1 -->
<fieldset style='display: inline;margin-right:4%;width:29%;'>
<legend><span class="number">1</span>Subitem 1</legend>
<label for="secao6_modulo4_subitem1">Nome do SubItem 1:</label> <input type="text" name="secao6_modulo4_subitem1" value="<?php echo get_option_esc('secao6_modulo4_subitem1')?>" placeholder="Nome do SubItem 1:">
<label for="secao6_modulo4_subitem1_descricao">Descrição SubItem 1:</label> <textarea name="secao6_modulo4_subitem1_descricao" placeholder="Descrição" rows=5><?php echo get_option_esc('secao6_modulo4_subitem1_descricao')?></textarea>
<label for="secao6_modulo4_subitem1_link">Link Leia Mais SubItem 1:</label> <input type="text" name="secao6_modulo4_subitem1_link" value="<?php echo get_option_esc('secao6_modulo4_subitem1_link')?>" placeholder="Link Leia Mais SubItem 1">
<label for="secao6_modulo4_subitem1_image">Imagem de Background :</label> <?php echo $this->d1_upload->get_image_options('secao6_modulo4_subitem1_image'); ?>
</fieldset>
<!-- Seção 2 - Modulo 4 - Subitem 2 -->
<fieldset style='display: inline;margin-right:4%;width:29%;'>
<legend><span class="number">2</span>Subitem 2</legend>
<label for="secao6_modulo4_subitem2">Nome do SubItem 2:</label> <input type="text" name="secao6_modulo4_subitem2" value="<?php echo get_option_esc('secao6_modulo4_subitem2')?>" placeholder="Nome do SubItem 2:">
<label for="secao6_modulo4_subitem2_descricao">Descrição SubItem 2:</label> <textarea name="secao6_modulo4_subitem2_descricao" placeholder="Descrição" rows=5><?php echo get_option_esc('secao6_modulo4_subitem2_descricao')?></textarea>
<label for="secao6_modulo4_subitem2_link">Link Leia Mais SubItem 2:</label> <input type="text" name="secao6_modulo4_subitem2_link" value="<?php echo get_option_esc('secao6_modulo4_subitem2_link')?>" placeholder="Link Leia Mais SubItem 2">
<label for="secao6_modulo4_subitem2_image">Imagem de Background :</label> <?php echo $this->d1_upload->get_image_options('secao6_modulo4_subitem2_image'); ?>
</fieldset>
<!-- Seção 2 - Modulo 4 - Subitem 3 -->
<fieldset style='display: inline;margin-right:4%;width:29%;'>
<legend><span class="number">3</span>Subitem 3</legend>
<label for="secao6_modulo4_subitem3">Nome do SubItem 3:</label> <input type="text" name="secao6_modulo4_subitem3" value="<?php echo get_option_esc('secao6_modulo4_subitem3')?>" placeholder="Nome do SubItem 3:">
<label for="secao6_modulo4_subitem3_descricao">Descrição SubItem 3:</label> <textarea name="secao6_modulo4_subitem3_descricao" placeholder="Descrição" rows=5><?php echo get_option_esc('secao6_modulo4_subitem3_descricao')?></textarea>
<label for="secao6_modulo4_subitem3_link">Link Leia Mais SubItem 3:</label> <input type="text" name="secao6_modulo4_subitem3_link" value="<?php echo get_option_esc('secao6_modulo4_subitem3_link')?>" placeholder="Link Leia Mais SubItem 3">
<label for="secao6_modulo4_subitem3_image">Imagem de Background :</label> <?php echo $this->d1_upload->get_image_options('secao6_modulo4_subitem3_image'); ?>
</fieldset>
</div>
<!-------------------------------------------------------------------------- Seção 2 - Fim Modulo 4 ------------------------------------------------------------------------------->

<!----------------------------------------------------------------------- Seção 2 - Inicio Modulo 5 ----------------------------------------------------------------------------->
<button type="button" class="collapsible">+ Modulo 5</button>
<div id='secao1_content2' class="content">
<label for="secao6_modulo5_nome">Nome do Módulo:</label> <input type="text" name="secao6_modulo5_nome" value="<?php echo get_option_esc('secao6_modulo5_nome')?>" placeholder="Nome do Módulo">

<!-- Seção 2 - Modulo 5 - Subitem 1 -->
<fieldset style='display: inline;margin-right:4%;width:29%;'>
<legend><span class="number">1</span>Subitem 1</legend>
<label for="secao6_modulo5_subitem1">Nome do SubItem 1:</label> <input type="text" name="secao6_modulo5_subitem1" value="<?php echo get_option_esc('secao6_modulo5_subitem1')?>" placeholder="Nome do SubItem 1:">
<label for="secao6_modulo5_subitem1_descricao">Descrição SubItem 1:</label> <textarea name="secao6_modulo5_subitem1_descricao" placeholder="Descrição" rows=5><?php echo get_option_esc('secao6_modulo5_subitem1_descricao')?></textarea>
<label for="secao6_modulo5_subitem1_link">Link Leia Mais SubItem 1:</label> <input type="text" name="secao6_modulo5_subitem1_link" value="<?php echo get_option_esc('secao6_modulo5_subitem1_link')?>" placeholder="Link Leia Mais SubItem 1">
<label for="secao6_modulo5_subitem1_image">Imagem de Background :</label> <?php echo $this->d1_upload->get_image_options('secao6_modulo5_subitem1_image'); ?>
</fieldset>
<!-- Seção 2 - Modulo 5 - Subitem 2 -->
<fieldset style='display: inline;margin-right:4%;width:29%;'>
<legend><span class="number">2</span>Subitem 2</legend>
<label for="secao6_modulo5_subitem2">Nome do SubItem 2:</label> <input type="text" name="secao6_modulo5_subitem2" value="<?php echo get_option_esc('secao6_modulo5_subitem2')?>" placeholder="Nome do SubItem 2:">
<label for="secao6_modulo5_subitem2_descricao">Descrição SubItem 2:</label> <textarea name="secao6_modulo5_subitem2_descricao" placeholder="Descrição" rows=5><?php echo get_option_esc('secao6_modulo5_subitem2_descricao')?></textarea>
<label for="secao6_modulo5_subitem2_link">Link Leia Mais SubItem 2:</label> <input type="text" name="secao6_modulo5_subitem2_link" value="<?php echo get_option_esc('secao6_modulo5_subitem2_link')?>" placeholder="Link Leia Mais SubItem 2">
<label for="secao6_modulo5_subitem2_image">Imagem de Background :</label> <?php echo $this->d1_upload->get_image_options('secao6_modulo5_subitem2_image'); ?>
</fieldset>
<!-- Seção 2 - Modulo 5 - Subitem 3 -->
<fieldset style='display: inline;margin-right:4%;width:29%;'>
<legend><span class="number">3</span>Subitem 3</legend>
<label for="secao6_modulo5_subitem3">Nome do SubItem 3:</label> <input type="text" name="secao6_modulo5_subitem3" value="<?php echo get_option_esc('secao6_modulo5_subitem3')?>" placeholder="Nome do SubItem 3:">
<label for="secao6_modulo5_subitem3_descricao">Descrição SubItem 3:</label> <textarea name="secao6_modulo5_subitem3_descricao" placeholder="Descrição" rows=5><?php echo get_option_esc('secao6_modulo5_subitem3_descricao')?></textarea>
<label for="secao6_modulo5_subitem3_link">Link Leia Mais SubItem 3:</label> <input type="text" name="secao6_modulo5_subitem3_link" value="<?php echo get_option_esc('secao6_modulo5_subitem3_link')?>" placeholder="Link Leia Mais SubItem 3">
<label for="secao6_modulo5_subitem3_image">Imagem de Background :</label> <?php echo $this->d1_upload->get_image_options('secao6_modulo5_subitem3_image'); ?>
</fieldset>
</div>
<!-------------------------------------------------------------------------- Seção 2 - Fim Modulo 5 ------------------------------------------------------------------------------->


</div>
</body>
</html>

<script>var coll=document.getElementsByClassName("collapsible");var i;for(i=0;i<coll.length;i++){coll[i].addEventListener("click",function(){this.classList.toggle("active");var content=this.nextElementSibling;if(content.style.display==="block"){content.style.display="none"}else{content.style.display="block"}})}</script>