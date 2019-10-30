<?php
?>
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
    <form id="footer_fields" action="<?php echo $url_action; ?>">
        <div class="container">
            <div class="row">
                <div class="col form-style-5">

                    <!----------------------------------------------------------------------- Seção 5 - Inicio Regulamentação,Parceiros e Prêmios ----------------------------------------------------------------------->
                    <!-- Área de Regulamentação -->
                    <legend>Regulamentação</legend>
                </div>
            </div>
            <!-- Regulamentação 1 -->
            <div class="row">
                <div class="col form-style-5">
                    <fieldset>
                        <legend><span class="number">1</span>Imagem</legend>
                        <?php echo $this->d1_upload->get_image_options('secao5_regulamentacao1_img'); ?>
                    </fieldset>
                </div>
                <div class="col form-style-5">
                    <!-- Regulamentação 2 -->
                    <fieldset>
                        <legend><span class="number">2</span>Imagem</legend>
                        <?php echo $this->d1_upload->get_image_options('secao5_regulamentacao2_img'); ?>
                    </fieldset>
                </div>
                <div class="col form-style-5">
                    <!-- Regulamentação 3 -->
                    <fieldset>
                        <legend><span class="number">3</span>Imagem</legend>
                        <?php echo $this->d1_upload->get_image_options('secao5_regulamentacao3_img'); ?>
                    </fieldset>
                </div>
            </div>
            <div class="row">
                <div class="col form-style-5">
                    <!-- Área de Parceiros -->
                    <legend>Parceiros</legend>
                </div>
            </div>
            <div class="row">
                <div class="col form-style-5">
                    <!-- Parceiros 1 -->
                    <fieldset>
                        <legend><span class="number">1</span>Imagem</legend>
                        <?php echo $this->d1_upload->get_image_options('secao5_parceiros1_img'); ?>
                    </fieldset>
                </div>
                <div class="col form-style-5">
                    <!-- Parceiros 2 -->
                    <fieldset>
                        <legend><span class="number">2</span>Imagem</legend>
                        <?php echo $this->d1_upload->get_image_options('secao5_parceiros2_img'); ?>
                    </fieldset>
                </div>
                <div class="col form-style-5">
                    <!-- Parceiros 3 -->
                    <fieldset>
                        <legend><span class="number">3</span>Imagem</legend>
                        <?php echo $this->d1_upload->get_image_options('secao5_parceiros3_img'); ?>
                    </fieldset>
                </div>
            </div>

            <div class="row">
                <div class="col form-style-5">
                    <!-- Área de Prêmios -->
                    <legend>Prêmios</legend>
                </div>
            </div>
            <div class="row">
                <div class="col form-style-5">
                    <!-- Prêmios 1 -->
                    <fieldset>
                        <legend><span class="number">1</span>Imagem</legend>
                        <?php echo $this->d1_upload->get_image_options('secao5_premios1_img'); ?>
                    </fieldset>
                </div>
                <div class="col form-style-5">
                    <!-- Prêmios 2 -->
                    <fieldset>
                        <legend><span class="number">2</span>Imagem</legend>
                        <?php echo $this->d1_upload->get_image_options('secao5_premios2_img'); ?>
                    </fieldset>
                </div>
                <div class="col form-style-5">
                    <!-- Prêmios 3 -->
                    <fieldset>
                        <legend><span class="number">3</span>Imagem</legend>
                        <?php echo $this->d1_upload->get_image_options('secao5_premios3_img'); ?>
                    </fieldset>
                </div>
            </div>
            <!----------------------------------------------------------------------- Seção 5 - Fim Regulamentação,Parceiros e Prêmios -------------------------------------------------------------------------->


        </div>
    </form>
</body>