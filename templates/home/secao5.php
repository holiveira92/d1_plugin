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
                <!-- ------------------------------------- Início Seção Config. Seção - Lead Generator --------------------------------------->
                <legend><span class="number">1</span>Informações da Seção</legend>
                <fieldset>

                    <label for="secao5_section_title">Titulo:</label> <input type="text" name="secao5_section_title" value="<?php echo get_option('secao5_section_title') ?>">
                    <div class="checkbox-degrade"> <input type="checkbox" name="secao5_section_title_degrade"> <span>Para Inserir Degradê, Selecione o Texto e Marque Esta Opção</span> </div>

                    <!-- todo - aplicar para os proximos degrades-->

                    <label for="secao5_section_descricao">Descrição:</label> <textarea name="secao5_section_descricao" rows=5><?php echo get_option('secao5_section_descricao') ?></textarea>
                    <div class="checkbox-degrade"> <input type="checkbox" name="secao5_section_descricao_degrade"> Para Inserir Degradê, Selecione o Texto e Marque Esta Opção </div>
                </fieldset>
                <!-- ------------------------------------- Início Seção Config. Seção - Lead Generator ----------------------------------------------->
            </div>
        </div>
    </div>
</body>

</html>