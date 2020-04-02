<?php
global $wpdb;require_once dirname_safe(__FILE__,3) . 'includes/base/d1_constants.php';
$id_midia            = !empty($_REQUEST["id_midia"]) ? $_REQUEST["id_midia"] : false;
$data_bd            = !empty($id_midia) ? json_decode(json_encode($wpdb->get_results("SELECT * FROM " . $wpdb->prefix . D1_LANG . "d1_midia WHERE id = '$id_midia'")), true) : array();
$param              = array('path_wp' => ABSPATH, 'id_midia' => $id_midia, 'url_location' => "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
$query_string       = http_build_query($param);
$delete_url         = plugins_url('d1_plugin/templates/d1_midia/midia_delete.php?', 'd1_plugin') . $query_string;
$voltar_url         = "?page=d1_plugin_d1_midia&tab=secao1&" . $query_string;
$url_action         = plugins_url('d1_plugin/templates/d1_midia/midia_ajax.php', 'd1_plugin'); 
$data = array(
    'id'            => !empty($data_bd[0]["id"]) ? $data_bd[0]["id"] : '',
    'title'         => !empty($data_bd[0]["title"]) ? $data_bd[0]["title"] : '',
    'content'       => !empty($data_bd[0]["content"]) ? $data_bd[0]["content"] : '',
    'vehicle'       => !empty($data_bd[0]["vehicle"]) ? $data_bd[0]["vehicle"] : '',
    'publication_date'=> !empty($data_bd[0]["publication_date"]) ? $data_bd[0]["publication_date"] : '',
    'link'          => !empty($data_bd[0]["link"]) ? $data_bd[0]["link"] : '',
    'url_img_bg'    => !empty($data_bd[0]["url_img_bg"]) ? $data_bd[0]["url_img_bg"] : '',
);

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
    <form id="midia_fields" action="<?php echo $url_action; ?>">
        <div class="container">
            <div class="row">
                <div class="col form-style-5" id='secao1_content1' style="padding-bottom:0px!important">
                    <input type="hidden" name="admin_url" id="admin_url" value="<?php echo admin_url(); ?>">
                    <input type="hidden" name="url_location" id="url_location" value="<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>">
                    <input type="hidden" name="path_wp" id="path_wp" value="<?php echo ABSPATH; ?> ">
                    <div class="row">
                    <div class="col form-style-5 middle">
                    <fieldset>
                        <legend><span class="number">1</span>Infos Midia</legend>
                        <input type="hidden" name="id" id="id" value="<?php echo $data['id']; ?>">
                        <label for="title">Titulo:</label><input type="text" name="title" value="<?php echo $data['title']; ?>" placeholder="Titulo">
                        <label for="vehicle">Veículo:</label><input type="text" name="vehicle" value="<?php echo $data['vehicle']; ?>" placeholder="Veículo">
                        <label for="publication_date">Data Publicação:</label><input type="date" name="publication_date" value="<?php echo $data['publication_date']; ?>" placeholder="Data Publicação">
                        <label for="link">Link:</label><input type="text" name="link" value="<?php echo $data['link']; ?>" placeholder="Link">
                        <label for="content">Descrição:</label> <textarea name="content" placeholder="Descrição" rows='7'><?php echo $data['content']; ?></textarea>
                    </fieldset>
                    </div>
                    <div class="col form-style-5 middle">
                        <label for="title">Imagem Background:</label>
                        <?php echo $this->d1_upload->get_image_options_common("url_img_bg",$data['url_img_bg'],$data['id']); ?>
                    </div>
                    </div>
                </div>
            </div>
            
        </div>
        <p class="submit">
            <input type="submit" id="keyp_submit" class="button button-primary" value="Salvar Alterações" />
        </p>
    </form>

<script>
    $(document).ready(function() {
        $('#keyp_submit').click(function() {
            $('#url_location').val(window.location.href);
            var action = $('#midia_fields').attr('action');
            $('#midia_fields').attr('action', action + "?" + $('#midia_fields').serialize());
        });
    });
</script>
</body>