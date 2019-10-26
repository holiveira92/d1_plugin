<?php
?>
<link rel="stylesheet" href="<?php echo plugins_url('d1_plugin/resources/css/bootstrap.min.css','d1_plugin');?>" />
<script src="<?php echo plugins_url('d1_plugin/resources/js/bootstrap.min.js','d1_plugin');?>"></script>
<script src="<?php echo plugins_url('d1_plugin/resources/js/jquery.min.js','d1_plugin');?>"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style type="text/css"> .form-style-5{display: flex; flex-wrap: wrap; padding: 20px; background: #f4f7f8; border-radius: 8px; font-family: Georgia,"Times New Roman",Times,serif;}.form-style-5 fieldset{border:none}.form-style-5 legend{font-size:1.4em;margin-bottom:10px}.form-style-5 label{display:block;margin-bottom:8px}.form-style-5 input[type="text"],.form-style-5 input[type="date"],.form-style-5 input[type="datetime"],.form-style-5 input[type="email"],.form-style-5 input[type="number"],.form-style-5 input[type="search"],.form-style-5 input[type="time"],.form-style-5 input[type="url"],.form-style-5 textarea,.form-style-5 select{font-family:Georgia,"Times New Roman",Times,serif;background:rgba(255,255,255,.1);border:none;border-radius:4px;font-size:16px;margin:0;outline:0;padding:7px;width:100%;box-sizing:border-box;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;background-color:#e8eeef;color:#8a97a0;-webkit-box-shadow:0 1px 0 rgba(0,0,0,.03) inset;box-shadow:0 1px 0 rgba(0,0,0,.03) inset;}.form-style-5 input[type="text"]:focus,.form-style-5 input[type="date"]:focus,.form-style-5 input[type="datetime"]:focus,.form-style-5 input[type="email"]:focus,.form-style-5 input[type="number"]:focus,.form-style-5 input[type="search"]:focus,.form-style-5 input[type="time"]:focus,.form-style-5 input[type="url"]:focus,.form-style-5 textarea:focus,.form-style-5 select:focus{background:#d2d9dd}.form-style-5 select{-webkit-appearance:menulist-button;height:35px}.form-style-5 .number{background:#1abc9c;color:#fff;height:30px;width:30px;display:inline-block;font-size:.8em;margin-right:4px;line-height:30px;text-align:center;text-shadow:0 1px 0 rgba(255,255,255,.2);border-radius:15px 15px 15px 0} </style>
<div class="form-style-5">

<!-- ------------------------------------- Início Pré-Footer - Etapas de Contratação  ----------------------------------------------->
<!-- Card Primeira Parte -->
<fieldset style='flex: 0 100%; padding: 0 2%;'>
<legend><span class="number">0</span>Informações da Seção</legend>
<label for="secao1_title">Titulo Etapas de Contratação:</label><input type="text" name="secao1_title" value="<?php echo get_option_esc('secao1_title')?>" placeholder="Titulo Etapas de Contratação">
</fieldset>

<!-- Passo 1 -->
<fieldset style='flex: 0 45%; padding: 0 2%;'>
<legend><span class="number">1</span>Passo 1</legend>
<label for="secao1_passo1_title">Titulo:</label> <textarea name="secao1_passo1_title" placeholder="Titulo"><?php echo get_option_esc('secao1_passo1_title')?></textarea>
<label for="secao1_passo1_descricao">Descrição:</label> <textarea name="secao1_passo1_descricao" placeholder="Descrição passo 1"><?php echo get_option_esc('secao1_passo1_descricao')?></textarea>
</fieldset>

<!-- Passo 2 -->
<fieldset style='flex: 0 45%; padding: 0 2%;'>
<legend><span class="number">2</span>Passo 2</legend>
<label for="secao1_passo2_title">Titulo:</label> <textarea name="secao1_passo2_title" placeholder="Titulo"><?php echo get_option_esc('secao1_passo2_title')?></textarea>
<label for="secao1_passo2_descricao">Descrição:</label> <textarea name="secao1_passo2_descricao" placeholder="Descrição passo 2"><?php echo get_option_esc('secao1_passo2_descricao')?></textarea>
</fieldset>

<!-- Passo 3 -->
<fieldset style='flex: 0 45%; padding: 0 2%;'>
<legend><span class="number">3</span>Passo 3</legend>
<label for="secao1_passo3_title">Titulo:</label> <textarea name="secao1_passo3_title" placeholder="Titulo"><?php echo get_option_esc('secao1_passo3_title')?></textarea>
<label for="secao1_passo3_descricao">Descrição:</label> <textarea name="secao1_passo3_descricao" placeholder="Descrição passo 3"><?php echo get_option_esc('secao1_passo3_descricao')?></textarea>
</fieldset>

<!-- Passo 4 -->
<fieldset style='flex: 0 45%; padding: 0 2%;'>
<legend><span class="number">4</span>Passo 4</legend>
<label for="secao1_passo4_title">Titulo:</label> <textarea name="secao1_passo4_title" placeholder="Titulo"><?php echo get_option_esc('secao1_passo4_title')?></textarea>
<label for="secao1_passo4_descricao">Descrição:</label> <textarea name="secao1_passo4_descricao" placeholder="Descrição passo 4"><?php echo get_option_esc('secao1_passo4_descricao')?></textarea>
</fieldset>

<fieldset style='flex: 0 100%; padding: 0 2%;'>
<label for="secao1_desc_pre_cta">Descrição Pré CTA:</label> <input type="text" name="secao1_desc_pre_cta" value="<?php echo get_option_esc('secao1_desc_pre_cta')?>" placeholder="Descrição Pré CTA">
<div style='display:flex;align-items:center;margin-bottom:25px;'><input type="checkbox" name="secao1_desc_pre_cta_degrade"> Para Inserir Degradê, Selecione o Texto e Marque Esta Opção </div>
</fieldset>

<!-------------------------------------- Fim Pré-Footer - Etapas de Contratação ----------------------------------------------->

</div>
<script>var coll=document.getElementsByClassName("collapsible");var i;for(i=0;i<coll.length;i++){coll[i].addEventListener("click",function(){this.classList.toggle("active");var content=this.nextElementSibling;if(content.style.display==="block"){content.style.display="none"}else{content.style.display="block"}})}</script>