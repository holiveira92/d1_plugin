<?php
global $wpdb;
$id_seg            = !empty($_REQUEST["id_seg"]) ? $_REQUEST["id_seg"] : false;
$data_bd            = !empty($id_seg) ? json_decode(json_encode($wpdb->get_results("SELECT * FROM " . $wpdb->prefix . "d1_segmentos WHERE id = '$id_seg'")), true) : array();
$param              = array('path_wp' => ABSPATH, 'id_seg' => $id_seg, 'url_location' => "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
$query_string       = http_build_query($param);
$delete_url         = plugins_url('d1_plugin/templates/segmentos/segmentos_delete.php?', 'd1_plugin') . $query_string;
$voltar_url         = "?page=d1_plugin_segmentos&tab=secao1&" . $query_string;
$url_action         = plugins_url('d1_plugin/templates/segmentos/segmentos_ajax.php', 'd1_plugin'); 
$data = array(
    'id'            => !empty($data_bd[0]["id"]) ? $data_bd[0]["id"] : '',
    'main_title'    => !empty($data_bd[0]["main_title"]) ? $data_bd[0]["main_title"] : '',
    'title'         => !empty($data_bd[0]["title"]) ? $data_bd[0]["title"] : '',
    'description'   => !empty($data_bd[0]["description"]) ? $data_bd[0]["description"] : '',
    'url_img_bg'    => !empty($data_bd[0]["url_img_bg"]) ? $data_bd[0]["url_img_bg"] : '',
    'challenge_title'=> !empty($data_bd[0]["challenge_title"]) ? $data_bd[0]["challenge_title"] : '',
    'img_customer1' => !empty($data_bd[0]["img_customer1"]) ? $data_bd[0]["img_customer1"] : '',
    'img_customer2' => !empty($data_bd[0]["img_customer2"]) ? $data_bd[0]["img_customer2"] : '',
    'img_customer3' => !empty($data_bd[0]["img_customer3"]) ? $data_bd[0]["img_customer3"] : '',
    'customers_title' => !empty($data_bd[0]["customers_title"]) ? $data_bd[0]["customers_title"] : '',
);

$data_challenge = array(
    'challenge1' => !empty($data_bd[0]["challenge1"]) ? json_decode($data_bd[0]["challenge1"],true) : array(),
    'challenge2' => !empty($data_bd[0]["challenge2"]) ? json_decode($data_bd[0]["challenge2"],true) : array(),
    'challenge3' => !empty($data_bd[0]["challenge3"]) ? json_decode($data_bd[0]["challenge3"],true) : array()
);

$challenge[1] = array(
    'title'         => !empty($data_challenge['challenge1']['title']) ? $data_challenge['challenge1']['title'] : "",
    'description'   => !empty($data_challenge['challenge1']['description']) ? $data_challenge['challenge1']['description'] : "",
);

$challenge[2] = array(
    'title'         => !empty($data_challenge['challenge2']['title']) ? $data_challenge['challenge2']['title'] : "",
    'description'   => !empty($data_challenge['challenge2']['description']) ? $data_challenge['challenge2']['description'] : "",
);

$challenge[3] = array(
    'title'         => !empty($data_challenge['challenge3']['title']) ? $data_challenge['challenge3']['title'] : "",
    'description'   => !empty($data_challenge['challenge3']['description']) ? $data_challenge['challenge3']['description'] : "",
);

$data_clientes = array(
    'img_customer1' => !empty($data_bd[0]["img_customer1"]) ? $data_bd[0]["img_customer1"] : "",
    'img_customer2' => !empty($data_bd[0]["img_customer2"]) ? $data_bd[0]["img_customer2"] : "",
    'img_customer3' => !empty($data_bd[0]["img_customer3"]) ? $data_bd[0]["img_customer3"] : ""
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
                    <div class="row">
                    <div class="col form-style-5 middle">
                    <fieldset>
                        <legend><span class="number">1</span>Infos Segmento</legend>
                        <input type="hidden" name="id" id="id" value="<?php echo $data['id']; ?>">
                        <label for="main_title">Titulo:</label><input type="text" name="main_title" value="<?php echo $data['main_title']; ?>" placeholder="Titulo Principal">
                        <label for="title">Titulo:</label><input type="text" name="title" value="<?php echo $data['title']; ?>" placeholder="Titulo">
                        <label for="description">Descricao:</label> <textarea name="description" placeholder="Descrição" rows='7'><?php echo $data['description']; ?></textarea>
                    </fieldset>
                    </div>
                    <div class="col form-style-5 middle">
                        <label for="title">Imagem Background:</label>
                        <?php echo $this->d1_upload->get_image_options_common("url_img_bg",$data['url_img_bg'],$data['id']); ?>
                    </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col form-style-5" id='secao1_content1' style="padding-bottom:0px!important">
                    <div class="row">
                        <label for="challenge_title">Titulo:</label><input type="text" name="challenge_title" value="<?php echo $data["challenge_title"]; ?>" placeholder="Titulo Principal">
                        <?php for($i=1;$i<=3;$i++): ?>
                        <div class="col form-style-5 middle">
                        <fieldset>
                            <legend><span class="number"><?php echo $i;?></span>Desafio <?php echo $i;?></legend>
                            <label for="challenge<?php echo $i;?>_title">Titulo:</label><input type="text" name="challenge<?php echo $i;?>_title" value="<?php echo $challenge[$i]["title"]; ?>" placeholder="Titulo">
                            <label for="challenge<?php echo $i;?>_description">Descricao:</label> <textarea name="challenge<?php echo $i;?>_description" placeholder="Descrição" rows='7'><?php echo $challenge[$i]["description"]; ?></textarea>
                        </fieldset>
                        </div>
                        <?php endfor; ?>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col form-style-5" id='secao1_content1' style="padding-bottom:0px!important">
                    <div class="row">
                    <label for="customers_title">Titulo Clientes:</label><input type="text" name="customers_title" value="<?php echo $data["customers_title"]; ?>" placeholder="Titulo Clientes">
                        <?php for($i=1;$i<=3;$i++): ?>
                        <div class="col form-style-5 middle">
                        <fieldset>
                            <legend><span class="number"><?php echo $i;?></span>Cliente <?php echo $i;?></legend>
                            <label for="title">Imagem Logo:</label>
                            <?php echo $this->d1_upload->get_image_options_common("img_customer$i",$data_clientes["img_customer$i"]); ?>
                        </fieldset>
                        </div>
                        <?php endfor; ?>
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