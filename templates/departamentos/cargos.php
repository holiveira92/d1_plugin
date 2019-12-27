<?php
global $wpdb;require_once dirname_safe(__FILE__,3) . 'includes/base/d1_constants.php';
$id_cargo           = !empty($_REQUEST["id_cargo"]) ? $_REQUEST["id_cargo"] : false;
$id_departamento    = !empty($_REQUEST["id_modulo"]) ? $_REQUEST["id_modulo"] : ''; //aproveitando tabela de segmentos - ID do modulo será salvo como do segmento
$data_bd            = !empty($id_cargo) ? json_decode(json_encode($wpdb->get_results("SELECT * FROM " . $wpdb->prefix . D1_LANG . "d1_cargos WHERE id = '$id_cargo'")), true) : array();
$param              = array('path_wp' => ABSPATH, 'id_cargo' => $id_cargo, 'url_location' => "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
$query_string       = http_build_query($param);
$delete_url         = plugins_url('d1_plugin/templates/departamentos/cargos_delete.php?', 'd1_plugin') . $query_string;
$voltar_url         = "?page=d1_plugin_departamentos&tab=secao2&" . $query_string;
$url_action         = plugins_url('d1_plugin/templates/departamentos/cargos_ajax.php', 'd1_plugin'); 
$data = array(
    'id'            => !empty($data_bd[0]["id"]) ? $data_bd[0]["id"] : '',
    'title'         => !empty($data_bd[0]["title"]) ? $data_bd[0]["title"] : '',
    'subtitle'      => !empty($data_bd[0]["subtitle"]) ? $data_bd[0]["subtitle"] : '',
    'description1'  => !empty($data_bd[0]["description1"]) ? $data_bd[0]["description1"] : '',
    'description2'  => !empty($data_bd[0]["description2"]) ? $data_bd[0]["description2"] : '',
    'description3'  => !empty($data_bd[0]["description3"]) ? $data_bd[0]["description3"] : '',
    'id_departamento'=> !empty($data_bd[0]["id_departamento"]) ? $data_bd[0]["id_departamento"] : $id_departamento,
);
$id_departamento        = !empty($data["id_departamento"]) ? $data["id_departamento"] : '';
?>

<head>
    <!-- Fontfaces CSS--><?php require_once dirname_safe(__FILE__,3) . 'includes/base/d1_constants.php'; ?>
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
    <form id="cargos_fields" action="<?php echo $url_action; ?>">
    <div class="table-data__tool">
        <div class="table-data__tool-right">
            <?php   
                    $return_url = "?page=d1_plugin_departamentos&tab=mod&";
                    $param = array('path_wp' => ABSPATH, 'id_mod' => $id_departamento, 'url_location' => "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
                    $query_string = http_build_query($param);
            ?>
            <a href="<?php echo $return_url . $query_string ;?>"><button type="button" class="button button-primary">
                <-- Voltar para Departamento</button></a>
        </div>
    </div>
        <div class="container">
            <div class="row">
                <div class="col form-style-5" id='secao1_content1' style="padding-bottom:0px!important">
                    <input type="hidden" name="admin_url" id="admin_url" value="<?php echo admin_url(); ?>">
                    <input type="hidden" name="url_location" id="url_location" value="<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>">
                    <input type="hidden" name="path_wp" id="path_wp" value="<?php echo ABSPATH; ?> ">
                    <div class="col form-style-5 middle">
                        <input type="hidden" name="id" id="id" value="<?php echo $data['id']; ?>">
                        <input type="hidden" name="id_departamento" id="id_departamento" value="<?php echo $data['id_departamento']; ?>">
                        <label for="title">Titulo:</label><input type="text" name="title" value="<?php echo $data['title']; ?>" placeholder="Titulo">
                        <label for="subtitle">SubTitulo:</label><input type="text" name="subtitle" value="<?php echo $data['subtitle']; ?>" placeholder="Titulo">
                        <label for="description1">Descricao 1:</label> <textarea name="description1" placeholder="Descrição 1" rows='7'><?php echo $data['description1']; ?></textarea>
                        <div class="checkbox-degrade"><input type="checkbox" name="description1_degrade"> Para Inserir Degradê, Selecione o Texto e Marque Esta Opção </div>
                        <label for="description2">Descricao 2:</label> <textarea name="description2" placeholder="Descrição 2" rows='7'><?php echo $data['description2']; ?></textarea>
                        <div class="checkbox-degrade"><input type="checkbox" name="description2_degrade"> Para Inserir Degradê, Selecione o Texto e Marque Esta Opção </div>
                        <label for="description3">Descricao 3:</label> <textarea name="description3" placeholder="Descrição 3" rows='7'><?php echo $data['description3']; ?></textarea>
                        <div class="checkbox-degrade"><input type="checkbox" name="description3_degrade"> Para Inserir Degradê, Selecione o Texto e Marque Esta Opção </div>
                    </div>
                </div>
            </div>
        </div>
        <p class="submit">
            <input type="submit" id="cargos_submit" class="button button-primary" value="Salvar Alterações" />
        </p>
    </form>

<script>
    $(document).ready(function() {
        $('#cargos_submit').click(function() {
            $('#url_location').val(window.location.href);
            var action = $('#cargos_fields').attr('action');
            $('#cargos_fields').attr('action', action + "?" + $('#cargos_fields').serialize());
        });
    });
</script>
</body>