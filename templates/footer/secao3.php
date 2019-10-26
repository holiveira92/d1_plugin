<?php
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style type="text/css"> .form-style-5{display: flex; flex-wrap: wrap; padding: 20px; background: #f4f7f8; border-radius: 8px; font-family: Georgia,"Times New Roman",Times,serif;}.form-style-5 fieldset{border:none}.form-style-5 legend{font-size:1.4em;margin-bottom:10px}.form-style-5 label{display:block;margin-bottom:8px}.form-style-5 input[type="text"],.form-style-5 input[type="date"],.form-style-5 input[type="datetime"],.form-style-5 input[type="email"],.form-style-5 input[type="number"],.form-style-5 input[type="search"],.form-style-5 input[type="time"],.form-style-5 input[type="url"],.form-style-5 textarea,.form-style-5 select{font-family:Georgia,"Times New Roman",Times,serif;background:rgba(255,255,255,.1);border:none;border-radius:4px;font-size:16px;margin:0;outline:0;padding:7px;width:100%;box-sizing:border-box;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;background-color:#e8eeef;color:#8a97a0;-webkit-box-shadow:0 1px 0 rgba(0,0,0,.03) inset;box-shadow:0 1px 0 rgba(0,0,0,.03) inset;}.form-style-5 input[type="text"]:focus,.form-style-5 input[type="date"]:focus,.form-style-5 input[type="datetime"]:focus,.form-style-5 input[type="email"]:focus,.form-style-5 input[type="number"]:focus,.form-style-5 input[type="search"]:focus,.form-style-5 input[type="time"]:focus,.form-style-5 input[type="url"]:focus,.form-style-5 textarea:focus,.form-style-5 select:focus{background:#d2d9dd}.form-style-5 select{-webkit-appearance:menulist-button;height:35px}.form-style-5 .number{background:#1abc9c;color:#fff;height:30px;width:30px;display:inline-block;font-size:.8em;margin-right:4px;line-height:30px;text-align:center;text-shadow:0 1px 0 rgba(255,255,255,.2);border-radius:15px 15px 15px 0} </style>
</head>
<body>
<div class="form-style-5">

<!----------------------------------------------------------------------- Seção 3 - Inicio Seção Pré-CTA ----------------------------------------------------------------------->
<fieldset style='display: inline;margin-right:4%;width:99%;'>
<legend><span class="number">1</span>Titulo da Seção</legend>
<input type="text" name="secao3_title" value="<?php echo get_option_esc('secao3_title')?>" placeholder="Titulo da Seção">
<div style='display:flex;align-items:center;margin-bottom:25px;'><input type="checkbox" name="secao3_title_degrade"> Para Inserir Degradê, Selecione o Texto e Marque Esta Opção </div>
<!----------------------------------------------------------------------- Seção 3 - Fim Seção Pré-CTA -------------------------------------------------------------------------->

<!----------------------------------------------------------------------- Seção 3 - Inicio Info D1 ----------------------------------------------------------------------->
<fieldset style='display: inline;margin-right:4%;width:99%;'>
<legend><span class="number">2</span>Info D1</legend>
<textarea name="secao3_info_d1" placeholder="Info D1" rows=10><?php echo get_option_esc('secao3_info_d1')?></textarea>
<legend>Imagem Logo</legend><?php echo $this->d1_upload->get_image_options('secao3_info_d1_logo'); ?>
<fieldset>
<!----------------------------------------------------------------------- Seção 3 - Fim Info D1 -------------------------------------------------------------------------->
</div>