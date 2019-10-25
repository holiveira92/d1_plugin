<?php
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style type="text/css"> .form-style-5{display: flex; flex-wrap: wrap; padding: 20px; background: #f4f7f8; border-radius: 8px; font-family: Georgia,"Times New Roman",Times,serif;}.form-style-5 fieldset{border:none}.form-style-5 legend{font-size:1.4em;margin-bottom:10px}.form-style-5 label{display:block;margin-bottom:8px}.form-style-5 input[type="text"],.form-style-5 input[type="date"],.form-style-5 input[type="datetime"],.form-style-5 input[type="email"],.form-style-5 input[type="number"],.form-style-5 input[type="search"],.form-style-5 input[type="time"],.form-style-5 input[type="url"],.form-style-5 textarea,.form-style-5 select{font-family:Georgia,"Times New Roman",Times,serif;background:rgba(255,255,255,.1);border:none;border-radius:4px;font-size:16px;margin:0;outline:0;padding:7px;width:100%;box-sizing:border-box;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;background-color:#e8eeef;color:#8a97a0;-webkit-box-shadow:0 1px 0 rgba(0,0,0,.03) inset;box-shadow:0 1px 0 rgba(0,0,0,.03) inset;}.form-style-5 input[type="text"]:focus,.form-style-5 input[type="date"]:focus,.form-style-5 input[type="datetime"]:focus,.form-style-5 input[type="email"]:focus,.form-style-5 input[type="number"]:focus,.form-style-5 input[type="search"]:focus,.form-style-5 input[type="time"]:focus,.form-style-5 input[type="url"]:focus,.form-style-5 textarea:focus,.form-style-5 select:focus{background:#d2d9dd}.form-style-5 select{-webkit-appearance:menulist-button;height:35px}.form-style-5 .number{display:inline-block;background:#1abc9c;color:#fff;height:30px;width:30px;display:inline-block;font-size:.8em;margin-right:4px;line-height:30px;text-align:center;text-shadow:0 1px 0 rgba(255,255,255,.2);border-radius:15px 15px 15px 0}.collapsible{background-color:#777;color:white;cursor:pointer;padding:18px;width:100%;border:none;text-align:left;outline:none;font-size:15px}.active,.collapsible:hover{background-color:#555}.content{padding:0 18px;display:none;overflow:hidden;background-color:#f1f1f1} </style>
</head>
<body>
<div class="form-style-5">

<fieldset style='flex: 0 45%; padding: 0 2%;'>
<legend><span class="number">1</span>Informações Hero</legend>
<label for="secao1_hero_name">Nome:</label> <input type="text" name="secao1_hero_name" value="<?php echo get_option_esc('secao1_hero_name')?>" placeholder="Nome">
<label for="secao1_hero_cargo">Cargo:</label> <input type="text" name="secao1_hero_cargo" value="<?php echo get_option_esc('secao1_hero_cargo')?>" placeholder="Cargo">
<label for="secao1_hero_descricao">Mensagem :</label> <textarea name="secao1_hero_descricao" placeholder="Mensagem"><?php echo get_option_esc('secao1_hero_descricao')?></textarea>
<legend>Empresa Hero</legend><?php echo $this->d1_upload->get_image_options('secao1_hero_company'); ?>
</fieldset>

<fieldset style='flex: 0 45%; padding: 0 2%;'>
<legend><span class="number">2</span>Chamada</legend>
<label for="secao1_hero_title">Chamada Principal:</label> <textarea name="secao1_hero_title" placeholder="Chamada Principal"> <?php echo get_option_esc('secao1_hero_title')?> </textarea>
<div style='display:flex;align-items:center;margin-bottom:25px;'> <input type="checkbox" name="secao1_hero_title_degrade"> Para Inserir Degradê, Selecione o Texto e Marque Esta Opção </div>
<label for="secao1_descricao_primaria">Benefícios:</label> <textarea name="secao1_descricao_primaria" placeholder="Benefícios" rows=10> <?php echo get_option_esc('secao1_descricao_primaria')?> </textarea>
<label for="secao1_descricao_secundaria">Chamada Pré CTA:</label> <textarea name="secao1_descricao_secundaria" placeholder="Chamada Pré CTA"> <?php echo get_option_esc('secao1_descricao_secundaria')?> </textarea>
</fieldset>

<fieldset style='flex: 0 45%; padding: 0 2%;'>
<!-- CTA SERÁ EM UMA PAGINA SEPARADA - CRIAR PAGE --> 
<legend><span class="number">3</span>Image</legend>
<legend>Imagem Hero Background</legend>
<?php echo $this->d1_upload->get_image_options('secao1_hero_img_bg'); ?>
</fieldset>

</div>
</body>
</html>