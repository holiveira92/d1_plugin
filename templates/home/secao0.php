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
                    <legend><span class="number">1</span>Conteúdo</legend>
                    <label for="d1_web_title">Título da Página:</label> <input type="text" name="d1_web_title<?php echo D1Plugin::$language; ?>" value="<?php echo get_option_esc('d1_web_title') ?>">
                </fieldset>
            </div>

            <div class="col form-style-5">
                <fieldset>
                    <legend><span class="number">2</span>CTA Menu</legend>
                    <?php
                        //obtendo opções salvas no BD
                        global $wpdb;
                        $cta = json_decode(json_encode($wpdb->get_results('SELECT * FROM ' . $wpdb->prefix . D1_LANG . 'd1_call_to_action')), true);
                    ?>
                    <!-- Início de Select para CTA -->
                    <span class="margin-bottom"> Verifique o cadastro de call to action <a href="?page=d1_plugin_cta&tab=secao1">clicando aqui</a></span>
                    <label for="d1_menu_cta">Selecione o Call to Action:</label> <select name="d1_menu_cta<?php echo D1Plugin::$language; ?>">
                        <option value="0"> Selecione </option>
                        <?php
                        foreach ($cta as $key => &$value) :
                            $id_selected = get_option_esc('d1_menu_cta');
                            if ($value['id'] == $id_selected) {
                                $value['selected'] = 'selected';
                            } else {
                                $value['selected'] = '';
                            }
                            ?>
                            <option value="<?php echo $value['id']; ?>" <?php echo $value['selected']; ?>> <?php echo $value['title']; ?> </option>
                        <?php endforeach; ?>
                    </select>
                    </fieldset>
                    <!-- Fim de Select para CTA -->
            </div>
        </div>
        
        <div class="row">
            <div class="col form-style-5">
                <fieldset>
                    <legend><span class="number">3</span>Logo Principal</legend><?php echo $this->d1_upload->get_image_options('d1_main_logo'); ?>
                </fieldset>
            </div>
            <div class="col form-style-5">
                <fieldset>
                    <legend><span class="number">4</span>Favicon</legend>
                    <?php echo $this->d1_upload->get_image_options('d1_favicon'); ?>
                </fieldset>
            </div>
        </div>

        <div class="row">
            <div class="col form-style-5">
            <fieldset>
                    <legend><span class="number">5</span>Top Bar</legend>
                        <label for="top_bar_desc">Descricao:</label> <textarea name="top_bar_desc<?php echo D1Plugin::$language; ?>" rows="6"><?php echo get_option_esc('top_bar_desc') ?></textarea>
                        <label for="top_bar_text_link">Texto Link:</label> <input type="text" name="top_bar_text_link<?php echo D1Plugin::$language; ?>" value="<?php echo get_option_esc('top_bar_text_link') ?>">
                        <label for="top_bar_link">URL Link:</label> <input type="text" name="top_bar_link<?php echo D1Plugin::$language; ?>" value="<?php echo get_option_esc('top_bar_link') ?>">
                        <label for="top_bar_text_login_link">Texto Login Link:</label> <input type="text" name="top_bar_text_login_link<?php echo D1Plugin::$language; ?>" value="<?php echo get_option_esc('top_bar_text_login_link') ?>">
                        <label for="top_bar_login_link">URL Login Link:</label> <input type="text" name="top_bar_login_link<?php echo D1Plugin::$language; ?>" value="<?php echo get_option_esc('top_bar_login_link') ?>">
                </fieldset>
            </div>
        </div>
    </div>
</body>

</html>