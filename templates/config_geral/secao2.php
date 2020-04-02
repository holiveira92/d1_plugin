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
                    <legend><span class="number">1</span>Linguagem para Configuração</legend>
                    <?php $lang_option = get_option_esc('d1_lang_option');?>
                    <label for="d1_lang_option">Escolha a Linguagem para Editar:</label>
                    <select name="d1_lang_option">
                        <option value="PT" <?php echo ($lang_option == "PT") ? "selected" : "";?>>PT</option>
                        <option value="EN" <?php echo ($lang_option == "EN") ? "selected" : "";?>>EN</option>
                        <option value="ES" <?php echo ($lang_option == "ES") ? "selected" : "";?>>ES</option>
                    </select>
                </fieldset>
                <fieldset>
                    <legend><span class="number">2</span>Linguagem Disponíveis Site</legend>
                    <input type="hidden" id="site_lang_options" name="site_lang_options" value="<?php echo get_option_esc('site_lang_options'); ?>">
                    <?php $site_lang_options = "";?>
                    <label>Escolha as Opções de Linguagem:</label>
                    <input type="checkbox" name="site_lang_pt" value="1" checked disabled/>PT
                    <input type="checkbox" name="site_lang_en" value="1" <?php echo (get_option_esc('site_lang_en')==1) ? 'checked' : '';?>/>EN
                    <input type="checkbox" name="site_lang_es" value="1" <?php echo (get_option_esc('site_lang_es')==1) ? 'checked' : '';?>/>ES
                </fieldset>
            </div>
        </div>
    </div>
</body>

</html>