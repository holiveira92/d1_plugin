<?php
?>
<!DOCTYPE HTML>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col form-style-5">
                <fieldset>
                    <legend><span class="number">1</span>Equipe</legend>
                    <label for="jornada_secao3_equipe1_main_title">Titulo:</label><input type="text" name="jornada_secao3_equipe1_main_title<?php echo D1Plugin::$language; ?>" value="<?php echo get_option_esc('jornada_secao3_equipe1_main_title'); ?>">
                    <label for="jornada_secao3_equipe1_title">Destaque:</label><input type="text" name="jornada_secao3_equipe1_title<?php echo D1Plugin::$language; ?>" value="<?php echo get_option_esc('jornada_secao3_equipe1_title'); ?>">
                    <label for="jornada_secao3_equipe1_descricao">Descrição:</label> <textarea name="jornada_secao3_equipe1_descricao<?php echo D1Plugin::$language; ?>" rows='5'><?php echo get_option_esc('jornada_secao3_equipe1_descricao'); ?></textarea>
                     <label for="jornada_secao2_img">Imagem do fundo:</label><?php echo $this->d1_upload->get_image_options('jornada_secao3_equipe1_img'); ?>
                </fieldset>
            </div>

            <div class="col form-style-5">
                <fieldset>
                    <legend><span class="number">2</span>Como Criamos</legend>
                    <label for="jornada_secao3_equipe2_main_title">Titulo:</label><input type="text" name="jornada_secao3_equipe2_main_title<?php echo D1Plugin::$language; ?>" value="<?php echo get_option_esc('jornada_secao3_equipe2_main_title'); ?>">
                    <label for="jornada_secao3_equipe2_title">Destaque:</label><input type="text" name="jornada_secao3_equipe2_title<?php echo D1Plugin::$language; ?>" value="<?php echo get_option_esc('jornada_secao3_equipe2_title'); ?>">
                    <label for="jornada_secao3_equipe2_link">Link de redirecionamento:</label><input type="text" name="jornada_secao3_equipe2_link<?php echo D1Plugin::$language; ?>" value="<?php echo get_option_esc('jornada_secao3_equipe2_link'); ?>">
                    <label for="jornada_secao3_equipe2_descricao">Descrição:</label> <textarea name="jornada_secao3_equipe2_descricao<?php echo D1Plugin::$language; ?>" rows='5'><?php echo get_option_esc('jornada_secao3_equipe2_descricao'); ?></textarea>
                </fieldset>
            </div>

        </div>
    </div>
</body>