<?php
global $wpdb;
$id_hero            = !empty($_REQUEST["id_hero"]) ? $_REQUEST["id_hero"] : false;
$data_bd            = !empty($id_hero) ? json_decode(json_encode($wpdb->get_results("SELECT * FROM " . $wpdb->prefix . "d1_home_hero WHERE id = '$id_hero'")), true) : array();
$param              = array('path_wp' => ABSPATH, 'id_hero' => $id_hero, 'url_location' => "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
$query_string       = http_build_query($param);
$delete_url         = plugins_url('d1_plugin/templates/home/hero_delete.php?', 'd1_plugin') . $query_string;
$voltar_url         = "?page=d1_plugin&tab=secao1&" . $query_string;
$url_action         = plugins_url('d1_plugin/templates/home/hero_ajax.php', 'd1_plugin'); 
$data = array(
    'id'                    => !empty($data_bd[0]["id"]) ? $data_bd[0]["id"] : '',
    'chamada_principal'     => !empty($data_bd[0]["chamada_principal"]) ? $data_bd[0]["chamada_principal"] : '',
    'descricao_primaria'    => !empty($data_bd[0]["descricao_primaria"]) ? $data_bd[0]["descricao_primaria"] : '',
    'descricao_secundaria'  => !empty($data_bd[0]["descricao_secundaria"]) ? $data_bd[0]["descricao_secundaria"] : '',
    'hero_name'             => !empty($data_bd[0]["hero_name"]) ? $data_bd[0]["hero_name"] : '',
    'hero_cargo'            => !empty($data_bd[0]["hero_cargo"]) ? $data_bd[0]["hero_cargo"] : '',
    'hero_descricao'        => !empty($data_bd[0]["hero_descricao"]) ? $data_bd[0]["hero_descricao"] : '',
    'img_url_logo_hero_company'=> !empty($data_bd[0]["img_url_logo_hero_company"]) ? $data_bd[0]["img_url_logo_hero_company"] : '',
    'img_url_bg_hero'       => !empty($data_bd[0]["img_url_bg_hero"]) ? $data_bd[0]["img_url_bg_hero"] : '',
    'id_cta'                => !empty($data_bd[0]["id_cta"]) ? $data_bd[0]["id_cta"] : '',
);
$id_hero            = !empty($data['id']) ? $data['id'] : 0;
?>

<head>
    <!-- Fontfaces CSS-->
    <link href="<?php echo plugins_url('d1_plugin/resources/css/font-face.css', 'd1_plugin'); ?>" rel="stylesheet" media="all">
    <link href="<?php echo plugins_url('d1_plugin/resources/vendor/font-awesome-4.7/css/font-awesome.min.css', 'd1_plugin'); ?>" rel="stylesheet" media="all">
    <link href="<?php echo plugins_url('d1_plugin/resources/vendor/font-awesome-5/css/fontawesome-all.min.css', 'd1_plugin'); ?>" rel="stylesheet" media="all">
    <link href="<?php echo plugins_url('d1_plugin/resources/vendor/mdi-font/css/material-design-iconic-font.min.css', 'd1_plugin'); ?>" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="<?php echo plugins_url('d1_plugin/resources/vendor/bootstrap-4.1/bootstrap.min.css', 'd1_plugin'); ?>" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="<?php echo plugins_url('d1_plugin/resources/vendor/animsition/animsition.min.css', 'd1_plugin'); ?>" rel="stylesheet" media="all">
    <link href="<?php echo plugins_url('d1_plugin/resources/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css', 'd1_plugin'); ?>" rel="stylesheet" media="all">
    <link href="<?php echo plugins_url('d1_plugin/resources/vendor/wow/animate.css', 'd1_plugin'); ?>" rel="stylesheet" media="all">
    <link href="<?php echo plugins_url('d1_plugin/resources/vendor/css-hamburgers/hamburgers.min.css', 'd1_plugin'); ?>" rel="stylesheet" media="all">
    <link href="<?php echo plugins_url('d1_plugin/resources/vendor/slick/slick.css', 'd1_plugin'); ?>" rel="stylesheet" media="all">
    <link href="<?php echo plugins_url('d1_plugin/resources/vendor/select2/select2.min.css', 'd1_plugin'); ?>" rel="stylesheet" media="all">
    <link href="<?php echo plugins_url('d1_plugin/resources/vendor/perfect-scrollbar/perfect-scrollbar.css', 'd1_plugin'); ?>" rel="stylesheet" media="all">
    <!-- Main CSS-->
    <link href="<?php echo plugins_url('d1_plugin/resources/css/theme.css', 'd1_plugin'); ?>" rel="stylesheet" media="all">

    <script src="<?php echo plugins_url('d1_plugin/resources/js/bootstrap.min.js', 'd1_plugin'); ?>"></script>
    <script src="<?php echo plugins_url('d1_plugin/resources/js/jquery.min.js', 'd1_plugin'); ?>"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>

<body class="animsition">
    <a href="<?php echo $voltar_url . $query_string ;?>"><button type="button" class="button button-primary"><-- Voltar para Lista de Heroes</button></a>
    <form id="hero_fields" action="<?php echo $url_action; ?>">
    <input type="hidden" name="admin_url" id="admin_url" value="<?php echo admin_url(); ?>">
    <input type="hidden" name="url_location" id="url_location" value="<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>">
    <input type="hidden" name="path_wp" id="path_wp" value="<?php echo ABSPATH; ?> ">
    <div class="container">
        <div class="row">
            <div class="col form-style-5">
                <fieldset>
                    <input type="hidden" name="id" id="id" value="<?php echo $data['id']; ?>">
                    <legend><span class="number">1</span>Hero</legend>
                    <label for="chamada_principal">Chamada Principal:</label> <textarea name="chamada_principal"><?php echo $data['chamada_principal']; ?></textarea>
                    <div style='display:flex;align-items:center;margin-bottom:25px;'> <input type="checkbox" name="chamada_principal_degrade"> Para Inserir Degradê, Selecione o Texto e Marque Esta Opção </div>
                    <label for="descricao_primaria">Benefícios:</label> <textarea name="descricao_primaria" rows=6><?php echo $data['descricao_primaria']; ?></textarea>
                    <label for="descricao_secundaria">Chamada Pré CTA:</label> <textarea name="descricao_secundaria"><?php echo $data['descricao_secundaria']; ?></textarea>
                    <div style='display:flex;align-items:center;margin-bottom:25px;'> <input type="checkbox" name="descricao_secundaria_degrade"> Para Inserir Degradê, Selecione o Texto e Marque Esta Opção </div>
                </fieldset>
            </div>
            <div class="col form-style-5">
                <fieldset>
                    <legend><span class="number">2</span>Depoimento</legend>
                    <label for="hero_name">Nome:</label> <input type="text" name="hero_name" value="<?php echo $data['hero_name']; ?>">
                    <label for="hero_cargo">Cargo:</label> <input type="text" name="hero_cargo" value="<?php echo $data['hero_cargo']; ?>">
                    <label for="hero_descricao">Mensagem:</label> <textarea name="hero_descricao"><?php echo $data['hero_descricao']; ?></textarea>
                    <legend>Logotipo da empresa</legend><?php echo $this->d1_upload->get_image_options_common("img_url_logo_hero_company",$data['img_url_logo_hero_company'],$data['id']); ?>
                </fieldset>
            </div>
        </div>
        <div class="row">
            <div class="col form-style-5">
                <fieldset>
                    <legend><span class="number">3</span>Imagem</legend>
                    <legend>Imagem de Fundo</legend>
                    <?php echo $this->d1_upload->get_image_options_common("img_url_bg_hero",$data['img_url_bg_hero'],$data['id']); ?>
                </fieldset>
            </div>
        </div>

        <div class="row">
            <div class="col form-style-5">
            <!-- Início de Select para CTA -->
            <label for="id_cta">Selecione CTA:</label><span class="margin-bottom"> Verifique o cadastro de CTA <a href="?page=d1_plugin_cta&tab=secao1">clicando aqui</a></span>
            <select name="id_cta">
                <option value="0"> Selecione </option>
                <?php
                //obtendo opções salvas no BD
				global $wpdb;
				$result = json_decode(json_encode($wpdb->get_results('SELECT * FROM ' . $wpdb->prefix . 'd1_call_to_action')), true);
                foreach ($result as $key => &$value) :
                    $id_selected = $data['id_cta'];
                    if ($value['id'] == $id_selected) $value['selected'] = 'selected';
                    else $value['selected'] = '';
                ?>
                    <option value="<?php echo $value['id']; ?>" <?php echo $value['selected']; ?>> <?php echo $value['title']; ?> </option>
                <?php endforeach; ?>
            </select>
            <!-- Fim de Select para CTA -->
            </div>
        </div>
    </div>

        <p class="submit">
            <input type="submit" id="keyp_submit" class="button button-primary" value="Salvar Alterações" />
        </p>
    </form>

</body>