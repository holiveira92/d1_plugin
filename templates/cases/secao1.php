<?php
global $wpdb;
$id_card            = !empty($_REQUEST["id_card"]) ? $_REQUEST["id_card"]: false;
$data_bd            = json_decode(json_encode($wpdb->get_results("SELECT * FROM " . $wpdb->prefix . "d1_cases WHERE id_card = $id_card")),true);
$param              = array('path_wp' => ABSPATH, 'id_card' => $id_card, 'url_location' => "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
$query_string       = http_build_query($param);
$delete_url         = plugins_url('d1_plugin/templates/cases/delete.php?','d1_plugin') . $query_string ;
$voltar_url         = "?page=d1_plugin_cases&tab=config_cards&" . $query_string ;
$data = array(
    'id_card'               => !empty($data_bd[0]["id_card"]) ? $data_bd[0]["id_card"] : '',
    'title_card'            => !empty($data_bd[0]["title_card"]) ? $data_bd[0]["title_card"] : '',
    'desc_card'             => !empty($data_bd[0]["desc_card"]) ? $data_bd[0]["desc_card"] : '',
    'subtitle_card'         => !empty($data_bd[0]["subtitle_card"]) ? $data_bd[0]["subtitle_card"] : '',
    'text_footer_card'      => !empty($data_bd[0]["text_footer_card"]) ? $data_bd[0]["text_footer_card"] : '',
    'subtext_footer_card'   => !empty($data_bd[0]["subtext_footer_card"]) ? $data_bd[0]["subtext_footer_card"] : '',
    'card_link'             => !empty($data_bd[0]["card_link"]) ? $data_bd[0]["card_link"] : '',
    'img_bg_url'            => !empty($data_bd[0]["img_bg_url"]) ? urldecode($data_bd[0]["img_bg_url"]) : '',
    'detach_card'           => !empty($data_bd[0]["detach_card_hidden"]) ? $data_bd[0]["detach_card_hidden"] : 0,
    'destaque'              => !empty($data_bd[0]["detach_card_hidden"]) && $data_bd[0]['detach_card'] == 1 ? 'checked' : '',
    'desc_completa_primaria'=> !empty($data_bd[0]["desc_completa_primaria"]) ? $data_bd[0]["desc_completa_primaria"] : '',
    'desc_completa_secundaria'=> !empty($data_bd[0]["desc_completa_secundaria"]) ? $data_bd[0]["desc_completa_secundaria"] : '',
    'objetivos_title'       => !empty($data_bd[0]["objetivos_title"]) ? $data_bd[0]["objetivos_title"] : '',
    'objetivos_desc_completa'=> !empty($data_bd[0]["objetivos_desc_completa"]) ? $data_bd[0]["objetivos_desc_completa"] : '',
);

$impactos              = !empty($data_bd[0]["impactos"]) ? json_decode($data_bd[0]["impactos"],true) : array();
$impactos_data = array(
    'impacto_title'     => !empty($impactos['impacto_title']) ? $impactos['impacto_title'] : '',
    'impacto1_title'    => !empty($impactos['impacto1_title']) ? $impactos['impacto1_title'] : '',
    'impacto1_total'    => !empty($impactos['impacto1_total']) ? $impactos['impacto1_total'] : '',
    'impacto1_desc'     => !empty($impactos['impacto1_desc']) ? $impactos['impacto1_desc'] : '',
    'impacto2_title'    => !empty($impactos['impacto2_title']) ? $impactos['impacto2_title'] : '',
    'impacto2_total'    => !empty($impactos['impacto2_total']) ? $impactos['impacto2_total'] : '',
    'impacto2_desc'     => !empty($impactos['impacto2_desc']) ? $impactos['impacto2_desc'] : '',
    'impacto3_title'    => !empty($impactos['impacto3_title']) ? $impactos['impacto3_title'] : '',
    'impacto3_total'    => !empty($impactos['impacto3_total']) ? $impactos['impacto3_total'] : '',
    'impacto3_desc'     => !empty($impactos['impacto3_desc']) ? $impactos['impacto3_desc'] : '',
);

$desafios              = !empty($data_bd[0]["desafios"]) ? json_decode($data_bd[0]["desafios"],true) : array();
$desafios_data = array(
    'desafios_title'            => !empty($desafios['desafios_title']) ? $desafios['desafios_title'] : '',
    'desafio1_desc_completa'    => !empty($desafios['desafio1_desc_completa']) ? $desafios['desafio1_desc_completa'] : '',
    'desafio2_desc_completa'    => !empty($desafios['desafio2_desc_completa']) ? $desafios['desafio2_desc_completa'] : '',
    'desafio3_desc_completa'    => !empty($desafios['desafio3_desc_completa']) ? $desafios['desafio3_desc_completa'] : '',
);

$implantacao                    = !empty($data_bd[0]["implantacao"]) ? json_decode($data_bd[0]["implantacao"],true) : array();
$implantacao_data = array(
    'implantacao_title'             => !empty($implantacao['implantacao_title']) ? $implantacao['implantacao_title'] : '',
    'implantacao_desc_primaria'     => !empty($implantacao['implantacao_desc_primaria']) ? $implantacao['implantacao_desc_primaria'] : '',
    'implantacao_desc_secundaria'   => !empty($implantacao['implantacao_desc_secundaria']) ? $implantacao['implantacao_desc_secundaria'] : '',
    'implantacao_resultado1_title'  => !empty($implantacao['implantacao_resultado1_title']) ? $implantacao['implantacao_resultado1_title'] : '',
    'implantacao_resultado1_valor'  => !empty($implantacao['implantacao_resultado1_valor']) ? $implantacao['implantacao_resultado1_valor'] : '',
    'implantacao_resultado1_desc'   => !empty($implantacao['implantacao_resultado1_desc']) ? $implantacao['implantacao_resultado1_desc'] : '',
    'implantacao_resultado2_title'  => !empty($implantacao['implantacao_resultado2_title']) ? $implantacao['implantacao_resultado2_title'] : '',
    'implantacao_resultado2_valor'  => !empty($implantacao['implantacao_resultado2_valor']) ? $implantacao['implantacao_resultado2_valor'] : '',
    'implantacao_resultado2_desc'   => !empty($implantacao['implantacao_resultado2_desc']) ? $implantacao['implantacao_resultado2_desc'] : '',
);
?>

<link rel="stylesheet" href="<?php echo plugins_url('d1_plugin/resources/css/bootstrap.min.css','d1_plugin');?>" />
<script src="<?php echo plugins_url('d1_plugin/resources/js/bootstrap.min.js','d1_plugin');?>"></script>
<script src="<?php echo plugins_url('d1_plugin/resources/js/jquery.min.js','d1_plugin');?>"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style type="text/css"> .form-style-5{display: flex; flex-wrap: wrap; padding: 20px; background: #f4f7f8; border-radius: 8px; font-family: Georgia,"Times New Roman",Times,serif;}.form-style-5 fieldset{border:none}.form-style-5 legend{font-size:1.4em;margin-bottom:10px}.form-style-5 label{display:block;margin-bottom:8px}.form-style-5 input[type="text"],.form-style-5 input[type="date"],.form-style-5 input[type="datetime"],.form-style-5 input[type="email"],.form-style-5 input[type="number"],.form-style-5 input[type="search"],.form-style-5 input[type="time"],.form-style-5 input[type="url"],.form-style-5 textarea,.form-style-5 select{font-family:Georgia,"Times New Roman",Times,serif;background:rgba(255,255,255,.1);border:none;border-radius:4px;font-size:16px;margin:0;outline:0;padding:7px;width:100%;box-sizing:border-box;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;background-color:#e8eeef;color:#8a97a0;-webkit-box-shadow:0 1px 0 rgba(0,0,0,.03) inset;box-shadow:0 1px 0 rgba(0,0,0,.03) inset;margin-bottom:30px}.form-style-5 input[type="text"]:focus,.form-style-5 input[type="date"]:focus,.form-style-5 input[type="datetime"]:focus,.form-style-5 input[type="email"]:focus,.form-style-5 input[type="number"]:focus,.form-style-5 input[type="search"]:focus,.form-style-5 input[type="time"]:focus,.form-style-5 input[type="url"]:focus,.form-style-5 textarea:focus,.form-style-5 select:focus{background:#d2d9dd}.form-style-5 select{-webkit-appearance:menulist-button;height:35px}.form-style-5 .number{display:inline-block;background:#1abc9c;color:#fff;height:30px;width:30px;display:inline-block;font-size:.8em;margin-right:4px;line-height:30px;text-align:center;text-shadow:0 1px 0 rgba(255,255,255,.2);border-radius:15px 15px 15px 0}.collapsible{background-color:#777;color:white;cursor:pointer;padding:18px;width:100%;border:none;text-align:left;outline:none;font-size:15px}.active,.collapsible:hover{background-color:#555}.content{overflow: hidden; flex: 0 45%; padding: 0 2%;} </style>

<?php $url_action = plugins_url('d1_plugin/templates/cases/create_edit.php','d1_plugin'); ?>
<form id="cases_fields" action="<?php echo $url_action; ?>">
<div class="form-style-5">

<div id='secao1_content1' class="content">
<input type="hidden" name="admin_url" id="admin_url" value="<?php echo admin_url();?>">
<input type="hidden" name="url_location" id="url_location" value="<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";?>">
<input type="hidden" name="path_wp" id="path_wp" value="<?php echo ABSPATH;?> ">
<input type="hidden" name="img_default" id="img_default" value="<?php echo get_template_directory_uri() . "/images/img_default.jpg";?> ">

<!-- Seção 1 -->
<fieldset style='flex: 0 40%; padding: 0 2%;'>
    <input type="hidden" name="id_card" value="<?php echo $data['id_card'];?>">
    <legend><span class="number">1</span>Info Case</legend>
    Destaque: <input type="checkbox" name="detach_card" <?php echo $data['destaque'];?> style='margin-top:-2px;'>
    <input type="hidden" name="detach_card_hidden" value="<?php echo $data['detach_card'];?>"/>
    <label>Título:</label><input type="text" name="title_card" placeholder="Titulo do Card " value="<?php echo $data['title_card'];?>" required>
    <!-- <div style='display:flex;align-items:center;margin-bottom:25px;'> <input type="checkbox" name="secao1_hero_title_degrade"> Para Inserir Degradê, Selecione o Texto e Marque Esta Opção </div> -->
    <label>Descrição:</label><input type="text" name="desc_card" placeholder="Descrição do Card " value="<?php echo $data['desc_card'];?>" required>
    <label>Objetivo:</label><input type="text" name="subtitle_card" placeholder="SubTitulo do Card" value="<?php echo $data['subtitle_card'];?>">
    <label>Número Impacto:</label><input type="text" name="text_footer_card" placeholder="Texto Card Footer" value="<?php echo $data['text_footer_card'];?>">
    <label>Descrição Secundária:</label><input type="text" name="subtext_footer_card" placeholder="SubTexto Card Footer" value="<?php echo $data['subtext_footer_card'];?>">
    <label>Link:</label><input type="text" name="card_link" placeholder="Link" value="<?php echo $data['card_link'];?>">
    <legend>Imagem de Fundo</legend><?php echo $this->d1_upload->get_image_options_cases("img_bg_url",$data['id_card']); ?>
</fieldset>
</div>

<!-- Seção 2 -->
<div id='secao1_content2' class="content">
<fieldset style='flex: 0 40%; padding: 0 2%;'>
<legend><span class="number">2</span>Impacto</legend>
<label>Titulo:</label><input type="text" name="impacto_title" placeholder="Titulo" value="<?php echo $impactos_data['impacto_title'];?>">

<!-- Impacto 1 -->
<legend>Impacto 1</legend>
<label>Impacto Titulo:</label><input type="text" name="impacto1_title" placeholder="Impacto Titulo" value="<?php echo $impactos_data['impacto1_title'];?>">
<label>Impacto Total:</label><input type="text" name="impacto1_total" placeholder="Impacto Total" value="<?php echo $impactos_data['impacto1_total'];?>">
<label>Impacto Descrição:</label><input type="text" name="impacto1_desc" placeholder="Impacto Descrição" value="<?php echo $impactos_data['impacto1_desc'];?>">

<!-- Impacto 2 -->
<legend>Impacto 2</legend>
<label>Impacto Titulo:</label><input type="text" name="impacto2_title" placeholder="Impacto Titulo" value="<?php echo $impactos_data['impacto2_title'];?>">
<label>Impacto Total:</label><input type="text" name="impacto2_total" placeholder="Impacto Total" value="<?php echo $impactos_data['impacto2_total'];?>">
<label>Impacto Descrição:</label><input type="text" name="impacto2_desc" placeholder="Impacto Descrição" value="<?php echo $impactos_data['impacto2_desc'];?>">

<!-- Impacto 3 -->
<legend>Impacto 3</legend>
<label>Impacto Titulo:</label><input type="text" name="impacto3_title" placeholder="Impacto Titulo" value="<?php echo $impactos_data['impacto3_title'];?>">
<label>Impacto Total:</label><input type="text" name="impacto3_total" placeholder="Impacto Total" value="<?php echo $impactos_data['impacto3_total'];?>">
<label>Impacto Descrição:</label><input type="text" name="impacto3_desc" placeholder="Impacto Descrição" value="<?php echo $impactos_data['impacto3_desc'];?>">
</fieldset>
</div>
<br><br>

<!-- Seção 3 -->
<div id='secao1_content3' class="content">
<fieldset style='flex: 0 40%; padding: 0 2%;'>
<legend><span class="number">3</span>Descrição Completa</legend>
<label for="desc_completa_primaria">Primária</label> <textarea name="desc_completa_primaria" rows='10'><?php echo $data['desc_completa_primaria'];?> </textarea>
<label for="desc_completa_secundaria">Secundária</label> <textarea name="desc_completa_secundaria" rows='10'><?php echo $data['desc_completa_secundaria'];?> </textarea>
</fieldset>
</div>
<br><br>

<!-- Seção 4 -->
<div id='secao1_content4' class="content">
<fieldset style='flex: 0 40%; padding: 0 2%;'>
<legend><span class="number">4</span>Objetivos</legend>
<label>Titulo:</label><input type="text" name="objetivos_title" placeholder="Titulo" value="<?php echo $data['objetivos_title'];?>">
<label for="objetivos_desc_completa">Descrição Completa</label> <textarea name="objetivos_desc_completa" rows='10'><?php echo $data['objetivos_desc_completa'];?> </textarea>
</fieldset>
</div>
<br><br>

<!-- Seção 5 -->
<div id='secao1_content5' class="content">
<fieldset style='flex: 0 40%; padding: 0 2%;'>
<legend><span class="number">5</span>Desafios</legend>
<label>Titulo:</label><input type="text" name="desafios_title" placeholder="Titulo" value="<?php echo $desafios_data['desafios_title'];?>">
<!-- Desafio 1 -->
<label for="desafio1_desc_completa">Desafio 1 Descrição</label> <textarea name="desafio1_desc_completa" rows='10'><?php echo $desafios_data['desafio1_desc_completa'];?> </textarea>

<!-- Desafio 2 -->
<label for="desafio2_desc_completa">Desafio 2 Descrição</label> <textarea name="desafio2_desc_completa" rows='10'><?php echo $desafios_data['desafio2_desc_completa'];?> </textarea>

<!-- Desafio 3 -->
<label for="desafio3_desc_completa">Desafio 3 Descrição</label> <textarea name="desafio3_desc_completa" rows='10'><?php echo $desafios_data['desafio3_desc_completa'];?> </textarea>
</fieldset>
</div>
<br><br>

<!-- Seção 6 -->
<div id='secao1_content6' class="content">
<fieldset style='flex: 0 40%; padding: 0 2%;'>
<legend><span class="number">6</span>Etapas Implantação</legend>
<label>Titulo:</label><input type="text" name="implantacao_title" placeholder="Titulo" value="<?php echo $implantacao_data['implantacao_title'];?>">
<label for="implantacao_desc_primaria">Descrição Primária</label> <textarea name="implantacao_desc_primaria" rows='10'><?php echo $implantacao_data['implantacao_desc_primaria'];?> </textarea>
<label for="implantacao_desc_secundaria">Descrição Secundária</label> <textarea name="implantacao_desc_secundaria" rows='10'><?php echo $implantacao_data['implantacao_desc_secundaria'];?> </textarea>
<label>Resultado 1 Titulo:</label><input type="text" name="implantacao_resultado1_title" placeholder="Titulo" value="<?php echo $implantacao_data['implantacao_resultado1_title'];?>">
<label>Valor:</label><input type="text" name="implantacao_resultado1_valor" placeholder="Titulo" value="<?php echo $implantacao_data['implantacao_resultado1_valor'];?>">
<label>Descricao:</label><input type="text" name="implantacao_resultado1_desc" placeholder="Titulo" value="<?php echo $implantacao_data['implantacao_resultado1_desc'];?>">
<label>Resultado 2:</label><input type="text" name="implantacao_resultado2_title" placeholder="Titulo" value="<?php echo $implantacao_data['implantacao_resultado2_title'];?>">
<label>Valor:</label><input type="text" name="implantacao_resultado2_valor" placeholder="Titulo" value="<?php echo $implantacao_data['implantacao_resultado2_valor'];?>">
<label>Descricao:</label><input type="text" name="implantacao_resultado2_desc" placeholder="Titulo" value="<?php echo $implantacao_data['implantacao_resultado2_desc'];?>">
</fieldset>
</div>
<br><br>

<div id="dinamic_buttons" style='float:right;'>
<a href="<?php echo $voltar_url;?>"><button type="button" name="remove" class="btn btn-info">Voltar</button></a>
<a href="<?php echo $delete_url;?>"><button type="button" name="remove" class="btn btn-danger btn_remove">Excluir</button></a>
<input type="submit" id="cases_submit" class="btn btn-success" value="Salvar Alterações"/>
</div>
</form>

<script>
    $(document).ready(function(){
        //botão deletar
        $(document).on('click', '.btn_remove', function(){
            if(!confirm('Tem certeza que deseja apagar este card?')){
                return false;
            }
        });
    });
</script>