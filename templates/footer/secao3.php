<?php
?>
<!DOCTYPE HTML>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col form-style-5">

                <!----------------------------------------------------------------------- Seção 3 - Inicio Seção Pré-CTA ----------------------------------------------------------------------->
                <fieldset>
                    <legend><span class="number">1</span>Titulo da Seção</legend>
                    <input type="text" name="secao3_title" value="<?php echo get_option_esc('secao3_title') ?>" placeholder="Titulo da Seção">
                    <div style='display:flex;align-items:center;margin-bottom:25px;'><input type="checkbox" name="secao3_title_degrade"> Para Inserir Degradê, Selecione o Texto e Marque Esta Opção </div>
                    <!----------------------------------------------------------------------- Seção 3 - Fim Seção Pré-CTA -------------------------------------------------------------------------->
            </div>
        </div>
        <div class="row">
            <div class="col form-style-5">
                <!----------------------------------------------------------------------- Seção 3 - Inicio Info D1 ----------------------------------------------------------------------->
                <fieldset>
                    <legend><span class="number">2</span>Info D1</legend>
                    <textarea name="secao3_info_d1" placeholder="Info D1" rows=10><?php echo get_option_esc('secao3_info_d1') ?></textarea>
                </fieldset>
            </div>
        </div>
        <div class="row">
            <div class="col form-style-5">
                <fieldset>
                <legend><span class="number">3</span>Imagem Logo</legend><?php echo $this->d1_upload->get_image_options('secao3_info_d1_logo'); ?>
                </fieldset>
                <!----------------------------------------------------------------------- Seção 3 - Fim Info D1 -------------------------------------------------------------------------->
            </div>
        </div>
    </div>
</body>

</html>