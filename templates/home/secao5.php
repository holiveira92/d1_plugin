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

                    <label for="secao5_section_title">Titulo:</label> <input type="text" name="secao5_section_title<?php echo D1Plugin::$language; ?>" value="<?php echo get_option_esc('secao5_section_title') ?>">
                    <div class="checkbox-degrade"> <input type="checkbox" name="secao5_section_title_degrade<?php echo D1Plugin::$language; ?>"> <span>Para Inserir Degradê, Selecione o Texto e Marque Esta Opção</span> </div>

                    <!-- todo - aplicar para os proximos degrades-->

                    <label for="secao5_section_descricao">Descrição:</label> <textarea name="secao5_section_descricao<?php echo D1Plugin::$language; ?>" rows=5><?php echo get_option_esc('secao5_section_descricao') ?></textarea>
                    <div class="checkbox-degrade"> <input type="checkbox" name="secao5_section_descricao_degrade<?php echo D1Plugin::$language; ?>"> Para Inserir Degradê, Selecione o Texto e Marque Esta Opção </div>
                </fieldset>
                <!-- ------------------------------------- Início Seção Config. Seção - Lead Generator ----------------------------------------------->
            </div>
        </div>

        <div class="row">
            <div class="col form-style-5">
            <!-- Início de Select para CTA -->
            <label for="secao5_cta">Selecione CTA:</label><span class="margin-bottom"> Verifique o cadastro de CTA <a href="?page=d1_plugin_cta&tab=secao1">clicando aqui</a></span>
            <select name="secao5_cta<?php echo D1Plugin::$language; ?>">
                <option value="0"> Selecione </option>
                <?php
                //obtendo opções salvas no BD
				global $wpdb;
				$result = json_decode(json_encode($wpdb->get_results('SELECT * FROM ' . $wpdb->prefix . 'd1_call_to_action')), true);
                foreach ($result as $key => &$value) :
                    $id_selected = get_option_esc('secao5_cta');
                    if ($value['id'] == $id_selected) $value['selected'] = 'selected';
                    else $value['selected'] = '';
                ?>
                    <option value="<?php echo $value['id']; ?>" <?php echo $value['selected']; ?>> <?php echo $value['title']; ?> </option>
                <?php endforeach; ?>
            </select>
            <!-- Fim de Select para CTA -->
            </div>
        </div>

    </div>
</body>

</html>