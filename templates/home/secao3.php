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
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col form-style-5">

                <!-- ------------------------------------- Início Seção Clientes de Sucesso ----------------------------------------------->
                <!-- Card Primeira Parte -->
                <legend><span class="number">1</span>Informações da Seção</legend>
                <label for="secao3_empresas_title">Titulo:</label><input type="text" name="secao3_empresas_title" value="<?php echo get_option('secao3_empresas_title') ?>">

            </div>
        </div>
        <div class="row">
            <div class="col form-style-5">
                <!-- Empresa 1 -->
                <fieldset>
                    <legend><span class="number">1</span>Logo do Cliente 1</legend>
                    <?php echo $this->d1_upload->get_image_options('secao3_img_empresa1'); ?>
                </fieldset>
            </div>
            <div class="col form-style-5">
                <!-- Empresa 2 -->
                <fieldset>
                    <legend><span class="number">2</span>Logo do Cliente 2</legend>
                    <?php echo $this->d1_upload->get_image_options('secao3_img_empresa2'); ?>
                </fieldset>
            </div>
            <div class="col form-style-5">
                <!-- Empresa 3 -->
                <fieldset>
                    <legend><span class="number">3</span>Logo do Cliente 3</legend>
                    <?php echo $this->d1_upload->get_image_options('secao3_img_empresa3'); ?>
                </fieldset>
            </div>
            <div class="col form-style-5">
                <!-- Empresa 4 -->
                <fieldset>
                    <legend><span class="number">4</span>Logo do Cliente 4</legend>
                    <?php echo $this->d1_upload->get_image_options('secao3_img_empresa4'); ?>
                </fieldset>
            </div>
        </div>
        <div class="row">
            <div class="col form-style-5">
                <!-- Empresa 5 -->
                <fieldset>
                    <legend><span class="number">5</span>Logo do Cliente 5</legend>
                    <?php echo $this->d1_upload->get_image_options('secao3_img_empresa5'); ?>
                </fieldset>
            </div>
            <div class="col form-style-5">
                <!-- Empresa 6 -->
                <fieldset>
                    <legend><span class="number">6</span>Logo do Cliente 6</legend>
                    <?php echo $this->d1_upload->get_image_options('secao3_img_empresa6'); ?>
                </fieldset>
            </div>
            <div class="col form-style-5">
                <!-- Empresa 7 -->
                <fieldset>
                    <legend><span class="number">7</span>Logo do Cliente 7</legend>
                    <?php echo $this->d1_upload->get_image_options('secao3_img_empresa7'); ?>
                </fieldset>
            </div>
            <div class="col form-style-5">
                <!-- Empresa 8 -->
                <fieldset>
                    <legend><span class="number">8</span>Logo do Cliente 8</legend>
                    <?php echo $this->d1_upload->get_image_options('secao3_img_empresa8'); ?>
                </fieldset>
            </div>
        </div>
        <!-- ------------------------------------- Fim Seção Clientes de Sucesso ----------------------------------------------->

    </div>
</body>

</html>