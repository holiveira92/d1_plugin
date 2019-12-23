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
                <!-- ------------------------------------- Início Seção Config. Seção - Desafios --------------------------------------->
                <!-- Titulo Seção Parte 3 -->
                <legend><span class="number">1</span>Informações da Seção</legend>
                <fieldset>
                    <label for="secao4_section_title_part3">Titulo:</label> <input type="text" name="secao4_section_title_part3<?php echo D1Plugin::$language; ?>" value="<?php echo get_option_esc('secao4_section_title_part3') ?>">
                </fieldset>
            </div>
        </div>
        <div class="row">
            <div class="col form-style-5">
                <!-- Card Terceira Parte -->
                <!-- Card 1 -->
                <fieldset>
                    <legend><span class="number">2</span>Desafio 1</legend>
                    <label for="secao4_title_card2_case1">Titulo do Card:</label> <textarea name="secao4_title_card2_case1<?php echo D1Plugin::$language; ?>"><?php echo get_option_esc('secao4_title_card2_case1') ?> </textarea>
                    <label for="secao4_subtitle_card2_case1">Sub-Titulo do Card:</label> <textarea name="secao4_subtitle_card2_case1<?php echo D1Plugin::$language; ?>"> <?php echo get_option_esc('secao4_subtitle_card2_case1') ?> </textarea>
                    <label for="secao4_link_card2_case1">Link de redirecionamento:</label> <input type="text" name="secao4_link_card2_case1<?php echo D1Plugin::$language; ?>" value="<?php echo get_option_esc('secao4_link_card2_case1') ?>">
                </fieldset>
            </div>
            <div class="col form-style-5">
                <!-- Card 2 -->
                <fieldset>
                    <legend><span class="number">3</span>Desafio 2</legend>
                    <label for="secao4_title_card2_case2">Titulo do Card:</label> <textarea name="secao4_title_card2_case2<?php echo D1Plugin::$language; ?>"><?php echo get_option_esc('secao4_title_card2_case2') ?> </textarea>
                    <label for="secao4_subtitle_card2_case2">Sub-Titulo do Card:</label> <textarea name="secao4_subtitle_card2_case2<?php echo D1Plugin::$language; ?>"> <?php echo get_option_esc('secao4_subtitle_card2_case2') ?> </textarea>
                    <label for="secao4_link_card2_case2">Link de redirecionamento:</label> <input type="text" name="secao4_link_card2_case2<?php echo D1Plugin::$language; ?>" value="<?php echo get_option_esc('secao4_link_card2_case2') ?>">
                </fieldset>
            </div>
            <div class="col form-style-5">
                <!-- Card 3 -->
                <fieldset>
                    <legend><span class="number">4</span>Desafio 3</legend>
                    <label for="secao4_title_card2_case3">Titulo do Card:</label> <textarea name="secao4_title_card2_case3<?php echo D1Plugin::$language; ?>"><?php echo get_option_esc('secao4_title_card2_case3') ?> </textarea>
                    <label for="secao4_subtitle_card2_case3">Sub-Titulo do Card:</label> <textarea name="secao4_subtitle_card2_case3<?php echo D1Plugin::$language; ?>"> <?php echo get_option_esc('secao4_subtitle_card2_case3') ?> </textarea>
                    <label for="secao4_link_card2_case3">Link de redirecionamento:</label> <input type="text" name="secao4_link_card2_case3<?php echo D1Plugin::$language; ?>" value="<?php echo get_option_esc('secao4_link_card2_case3') ?>">
                </fieldset>
            </div>
        </div>
    </div>
    <!-- ------------------------------------- Fim Seção Config. Seção - Desafios ----------------------------------------------->

</body>

</html>