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
                    <textarea name="secao3_title<?php echo D1Plugin::$language; ?>" rows='6'><?php echo get_option_esc('secao3_title') ?></textarea>
                    <div style='display:flex;align-items:center;margin-bottom:25px;'><input type="checkbox" name="secao3_title_degrade<?php echo D1Plugin::$language; ?>"> Para Inserir Degradê, Selecione o Texto e Marque Esta Opção </div>
                <fieldset>
                <!----------------------------------------------------------------------- Seção 3 - Fim Seção Pré-CTA -------------------------------------------------------------------------->
            </div>
            
            <div class="col form-style-5">
            <fieldset>
            <legend><span class="number">2</span>CTA</legend>
            <?php
                //obtendo opções salvas no BD
				global $wpdb;
				$result = json_decode(json_encode($wpdb->get_results('SELECT * FROM ' . $wpdb->prefix . 'd1_call_to_action')), true);
            ?>
            
            <!-- Início de Select para CTA 1-->
            <span class="margin-bottom"> Verifique o cadastro de CTA <a href="?page=d1_plugin_cta&tab=secao1">clicando aqui</a></span>
            <label for="secao3_footer_cta1">Selecione CTA 1:</label>
            <select name="secao3_footer_cta1<?php echo D1Plugin::$language; ?>">
                <option value="0"> Selecione </option>
                <?php
                foreach ($result as $key => &$value) :
                    $id_selected = get_option_esc('secao3_footer_cta1');
                    if ($value['id'] == $id_selected) $value['selected'] = 'selected';
                    else $value['selected'] = '';
                ?>
                    <option value="<?php echo $value['id']; ?>" <?php echo $value['selected']; ?>> <?php echo $value['title']; ?> </option>
                <?php endforeach; ?>
            </select>
            <!-- Fim de Select para CTA1 -->

            <!-- Início de Select para CTA2-->
            <label for="secao3_footer_cta2">Selecione CTA 2:</label>
            <select name="secao3_footer_cta2<?php echo D1Plugin::$language; ?>">
                <option value="0"> Selecione </option>
                <?php
                foreach ($result as $key => &$value) :
                    $id_selected = get_option_esc('secao3_footer_cta2');
                    if ($value['id'] == $id_selected) $value['selected'] = 'selected';
                    else $value['selected'] = '';
                ?>
                    <option value="<?php echo $value['id']; ?>" <?php echo $value['selected']; ?>> <?php echo $value['title']; ?> </option>
                <?php endforeach; ?>
            </select>
            <!-- Fim de Select para CTA2 -->

            <!-- Início de Select para CTA3-->
            <label for="secao3_footer_cta3">Selecione CTA 3:</label>
            <select name="secao3_footer_cta3<?php echo D1Plugin::$language; ?>">
                <option value="0"> Selecione </option>
                <?php
                foreach ($result as $key => &$value) :
                    $id_selected = get_option_esc('secao3_footer_cta3');
                    if ($value['id'] == $id_selected) $value['selected'] = 'selected';
                    else $value['selected'] = '';
                ?>
                    <option value="<?php echo $value['id']; ?>" <?php echo $value['selected']; ?>> <?php echo $value['title']; ?> </option>
                <?php endforeach; ?>
            </select>
            <!-- Fim de Select para CTA2 -->

            <fieldset>
            </div>
        </div>

        <div class="row">
            <div class="col form-style-5">
                <!----------------------------------------------------------------------- Seção 3 - Inicio Info D1 ----------------------------------------------------------------------->
                <fieldset>
                    <legend><span class="number">3</span>Info D1</legend>
                    <textarea name="secao3_info_d1<?php echo D1Plugin::$language; ?>" rows=10><?php echo get_option_esc('secao3_info_d1') ?></textarea>
                </fieldset>
            </div>
        </div>
        <div class="row">
            <div class="col form-style-5">
                <fieldset>
                <legend><span class="number">4</span>Imagem Logo</legend><?php echo $this->d1_upload->get_image_options('secao3_info_d1_logo'); ?>
                </fieldset>
                <!----------------------------------------------------------------------- Seção 3 - Fim Info D1 -------------------------------------------------------------------------->
            </div>
        </div>
    </div>
</body>

</html>