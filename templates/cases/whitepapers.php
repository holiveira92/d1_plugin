<?php
global $wpdb;
$id_wp              = !empty($_REQUEST["id_wp"]) ? $_REQUEST["id_wp"] : false;
$data_bd            = !empty($id_wp) ? json_decode(json_encode($wpdb->get_results("SELECT * FROM " . $wpdb->prefix . "d1_cases WHERE id_card = $id_wp")), true) : array();
$param              = array('path_wp' => ABSPATH, 'id_wp' => $id_wp, 'url_location' => "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
$query_string       = http_build_query($param);
$voltar_url         = "?page=d1_plugin_cases&tab=secao4&" . $query_string;
$data = array(
    'id_card'               => !empty($data_bd[0]["id_card"]) ? $data_bd[0]["id_card"] : '',
    'title_card'            => !empty($data_bd[0]["title_card"]) ? $data_bd[0]["title_card"] : '',
    'subtitle_card'         => !empty($data_bd[0]["subtitle_card"]) ? $data_bd[0]["subtitle_card"] : '',
    'text_footer_card'      => !empty($data_bd[0]["text_footer_card"]) ? $data_bd[0]["text_footer_card"] : '',
    'subtext_footer_card'   => !empty($data_bd[0]["subtext_footer_card"]) ? $data_bd[0]["subtext_footer_card"] : '',
    'card_link'             => !empty($data_bd[0]["card_link"]) ? $data_bd[0]["card_link"] : '',
    'img_bg_url'            => !empty($data_bd[0]["img_bg_url"]) ? urldecode($data_bd[0]["img_bg_url"]) : '',
);
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

<?php $url_action = plugins_url('d1_plugin/templates/cases/whitepapers_ajax.php', 'd1_plugin'); ?>

<body class="animsition">
<a href="<?php echo $voltar_url . $query_string ;?>"><button type="button" class="button button-primary"><-- Voltar para Whitepapers</button></a>
    <form id="whitepapers_fields" action="<?php echo $url_action; ?>">
        <div class="container">
            <div class="row">
                <div class="col form-style-5" id='secao1_content1' style="padding-bottom:0px!important">
                    <input type="hidden" name="admin_url" id="admin_url" value="<?php echo admin_url(); ?>">
                    <input type="hidden" name="url_location" id="url_location" value="<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>">
                    <input type="hidden" name="path_wp" id="path_wp" value="<?php echo ABSPATH; ?> ">
                    <input type="hidden" name="id_card" value="<?php echo $data['id_card']; ?>">
                    <input type="hidden" name="id_wp" value="<?php echo $data['id_card']; ?>">
                    <fieldset>
                        <label>Título:</label><input type="text" name="title_card" value="<?php echo $data['title_card']; ?>" required>
                        <label>Objetivo:</label><input type="text" name="subtitle_card" value="<?php echo $data['subtitle_card']; ?>">
                        <label>Nº Impacto:</label><input type="text" name="text_footer_card" value="<?php echo $data['text_footer_card']; ?>">
                        <label>Descrição Secundária:</label><input type="text" name="subtext_footer_card" value="<?php echo $data['subtext_footer_card']; ?>">
                        <label>Link:</label><input type="text" name="card_link" value="<?php echo $data['card_link']; ?>">
                        <label>Imagem de Fundo</label><?php echo $this->d1_upload->get_image_options_cases("img_bg_url", $data['id_card']); ?>
                    </fieldset>
                </div>
            </div>
        </div>
        <p class="submit">
            <input type="submit" id="cases_submit" class="button button-primary" value="Salvar Alterações" />
        </p>
    </form>

<script>
    $(document).ready(function() {
        $('#cases_submit').click(function() {
            $('#url_location').val(window.location.href);
            var action = $('#whitepapers_fields').attr('action');
            $('#whitepapers_fields').attr('action', action + "?" + $('#whitepapers_fields').serialize());
        });

    });
</script>
</body>