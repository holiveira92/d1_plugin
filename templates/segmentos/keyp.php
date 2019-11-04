<?php
global $wpdb;
$id_keyp            = !empty($_REQUEST["id_keyp"]) ? $_REQUEST["id_keyp"] : false;
$data_bd            = !empty($id_keyp) ? json_decode(json_encode($wpdb->get_results("SELECT * FROM " . $wpdb->prefix . "d1_key_points WHERE id = '$id_keyp'")), true) : array();
$param              = array('path_wp' => ABSPATH, 'id_keyp' => $id_keyp, 'url_location' => "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
$query_string       = http_build_query($param);
$delete_url         = plugins_url('d1_plugin/templates/segmentos/keyp_delete.php?', 'd1_plugin') . $query_string;
$voltar_url         = "?page=d1_plugin_segmentos&tab=secao2&" . $query_string;
$url_action         = plugins_url('d1_plugin/templates/segmentos/keyp_ajax.php', 'd1_plugin'); 
$data = array(
    'id'            => !empty($data_bd[0]["id"]) ? $data_bd[0]["id"] : '',
    'title'         => !empty($data_bd[0]["title"]) ? $data_bd[0]["title"] : '',
    'description'   => !empty($data_bd[0]["description"]) ? $data_bd[0]["description"] : '',
    'url_img'       => !empty($data_bd[0]["url_img"]) ? $data_bd[0]["url_img"] : '',
    'page'          => !empty($data_bd[0]["page"]) ? $data_bd[0]["page"] : 'segmentos',
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

<body class="animsition">
    <form id="keypoints_fields" action="<?php echo $url_action; ?>">
        <div class="container">
            <div class="row">
                <div class="col form-style-5" id='secao1_content1' style="padding-bottom:0px!important">
                    <input type="hidden" name="admin_url" id="admin_url" value="<?php echo admin_url(); ?>">
                    <input type="hidden" name="url_location" id="url_location" value="<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>">
                    <input type="hidden" name="path_wp" id="path_wp" value="<?php echo ABSPATH; ?> ">
                    <div class="col form-style-5 middle">
                        <input type="hidden" name="id" id="id" value="<?php echo $data['id']; ?>">
                        <input type="hidden" name="page" id="page" value="<?php echo $data['page']; ?>">
                        <label for="title">Titulo:</label><input type="text" name="title" value="<?php echo $data['title']; ?>" placeholder="Titulo">
                        <label for="description">Descricao:</label> <textarea name="description" placeholder="Descrição" rows='7'><?php echo $data['description']; ?></textarea>
                        <?php echo $this->d1_upload->get_image_options_common("url_img",$data['url_img']); ?>
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
            var action = $('#keypoints_fields').attr('action');
            $('#keypoints_fields').attr('action', action + "?" + $('#keypoints_fields').serialize());
        });
    });
</script>
</body>