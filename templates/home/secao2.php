<?php
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style type="text/css"> .form-style-5{display: flex; flex-wrap: wrap; padding: 20px; background: #f4f7f8; border-radius: 8px; font-family: Georgia,"Times New Roman",Times,serif;}.form-style-5 fieldset{border:none}.form-style-5 legend{font-size:1.4em;margin-bottom:10px}.form-style-5 label{display:block;margin-bottom:8px}.form-style-5 input[type="text"],.form-style-5 input[type="date"],.form-style-5 input[type="datetime"],.form-style-5 input[type="email"],.form-style-5 input[type="number"],.form-style-5 input[type="search"],.form-style-5 input[type="time"],.form-style-5 input[type="url"],.form-style-5 textarea,.form-style-5 select{font-family:Georgia,"Times New Roman",Times,serif;background:rgba(255,255,255,.1);border:none;border-radius:4px;font-size:16px;margin:0;outline:0;padding:7px;width:100%;box-sizing:border-box;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;background-color:#e8eeef;color:#8a97a0;-webkit-box-shadow:0 1px 0 rgba(0,0,0,.03) inset;box-shadow:0 1px 0 rgba(0,0,0,.03) inset;margin-bottom:30px}.form-style-5 input[type="text"]:focus,.form-style-5 input[type="date"]:focus,.form-style-5 input[type="datetime"]:focus,.form-style-5 input[type="email"]:focus,.form-style-5 input[type="number"]:focus,.form-style-5 input[type="search"]:focus,.form-style-5 input[type="time"]:focus,.form-style-5 input[type="url"]:focus,.form-style-5 textarea:focus,.form-style-5 select:focus{background:#d2d9dd}.form-style-5 select{-webkit-appearance:menulist-button;height:35px}.form-style-5 .number{display:inline-block;background:#1abc9c;color:#fff;height:30px;width:30px;display:inline-block;font-size:.8em;margin-right:4px;line-height:30px;text-align:center;text-shadow:0 1px 0 rgba(255,255,255,.2);border-radius:15px 15px 15px 0}.collapsible{background-color:#777;color:white;cursor:pointer;padding:18px;width:100%;border:none;text-align:left;outline:none;font-size:15px}.active,.collapsible:hover{background-color:#555}.content{overflow: hidden; flex: 0 45%; padding: 0 2%;} </style>
</head>
<body>
<div class="form-style-5">
<!-- ------------------------------------- Início Seção Config. Seção -  Cases de Sucesso --------------------------------------->
<!-- Titulo Seção Parte 1 -->

<div id='secao2_content1' class="content">
<fieldset style='flex: 0 100%; padding: 0 2%;'>
<legend><span class="number">1</span>Informações da Seção</legend>
<label for="secao2_section_title" >Título Seção:</label> <input type="text" name="secao2_section_title" value="<?php echo get_option_esc('secao2_section_title')?>" placeholder="Titulo da Seção Parte 1">
<label for="secao2_call_action_cases" >Chamada para Ação - Cases:</label> <input type="text" name="secao2_call_action_cases" value="<?php echo get_option_esc('secao2_call_action_cases')?>" placeholder="Chamada para Ação - Cases">
</fieldset>
</div>
<br>
<!-- ------------------------------------- Fim Seção Config. Seção -  Cases de Sucesso ------------------------------------------>

<!-- ------------------------------------- Início Seção Cards Cases de Sucesso ----------------------------------------------->
<?php
//obtendo opções salvas no BD
global $wpdb;
$result = json_decode(json_encode($wpdb->get_results('SELECT * FROM ' . $wpdb->prefix . 'd1_cases')),true);
?>

<!-- Card Primeira Parte -->
<!-- Lista de Cards Disponíveis -->
<div id='secao2_content2' class="content">
<fieldset style='flex: 0 100%; padding: 0 2%;'>
<legend><span class="number">1</span>Selecione os Cases</legend>
<span> Verifique o cadastro de cases de sucesso <a href="?page=d1_plugin_cases&tab=config_cards">clicando aqui</a></span>
<br><br>
<!-- Início de Select para Card 1 -->
<label for="secao2_select_card_cases1">Selecione Opção 1:</label> <select name="secao2_select_card_cases1">
<option value="0"> Selecione </option>
<?php 
foreach($result as $key=>&$value):
	$id_selected = get_option_esc('secao2_select_card_cases1');
	if($value['id_card'] == $id_selected){
		$value['selected'] = 'selected';
	}else{
		$value['selected'] = '';
	}
?>
<option value="<?php echo $value['id_card'];?>" <?php echo $value['selected'];?> > <?php echo $value['title_card'];?> </option>
<?php endforeach; ?>
</select>
<!-- Fim de Select para Card 1 -->

<!-- Início de Select para Card 2 -->
<label for="secao2_select_card_cases2">Selecione Opção 2:</label> <select name="secao2_select_card_cases2">
<option value="0"> Selecione </option>
<?php 
foreach($result as $key=>&$value):
	$id_selected = get_option_esc('secao2_select_card_cases2');
	if($value['id_card'] == $id_selected){
		$value['selected'] = 'selected';
	}else{
		$value['selected'] = '';
	}
?>
<option value="<?php echo $value['id_card'];?>" <?php echo $value['selected'];?> > <?php echo $value['title_card'];?> </option>
<?php endforeach; ?>
</select>
<!-- Fim de Select para Card 2 -->

<!-- Início de Select para Card 3 -->
<label for="secao2_select_card_cases3">Selecione Opção 3:</label> <select name="secao2_select_card_cases3">
<option value="0"> Selecione </option>
<?php 
foreach($result as $key=>&$value):
	$id_selected = get_option_esc('secao2_select_card_cases3');
	if($value['id_card'] == $id_selected){
		$value['selected'] = 'selected';
	}else{
		$value['selected'] = '';
	}
?>
<option value="<?php echo $value['id_card'];?>" <?php echo $value['selected'];?> > <?php echo $value['title_card'];?> </option>
<?php endforeach; ?>
</select>
<!-- Fim de Select para Card 3 -->

</fieldset>
</div>
<!-- ------------------------------------- Fim Seção Cards Cases de Sucesso ----------------------------------------------->

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
      //content.style.display = "none";
    } else {
      //content.style.display = "block";
    }
  });
}
</script>