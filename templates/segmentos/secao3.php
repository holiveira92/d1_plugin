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
                    <legend><span class="number">1</span>Cases</legend>
                    <div class="row">
                        <div class="col form-style-5 middle">
                            <?php
                                //obtendo opções salvas no BD
                                global $wpdb;
                                $result = json_decode(json_encode($wpdb->get_results('SELECT * FROM ' . $wpdb->prefix . D1_LANG . 'd1_cases')), true);
                            ?>
                            <!-- Início de Select para Card -->
                            <span class="margin-bottom"> Verifique o cadastro de cases de sucesso <a href="?page=d1_plugin_cases&tab=config_cards">clicando aqui</a></span>
                            <label for="segmentos_secao3_card_select">Selecione Opção:</label> <select name="segmentos_secao3_card_select<?php echo D1Plugin::$language; ?>">
                                <option value="0"> Selecione </option>
                                <?php
                                foreach ($result as $key => &$value) :
                                    $id_selected = get_option_esc('segmentos_secao3_card_select');
                                    if ($value['id_card'] == $id_selected) {
                                        $value['selected'] = 'selected';
                                    } else {
                                        $value['selected'] = '';
                                    }
                                    ?>
                                    <option value="<?php echo $value['id_card']; ?>" <?php echo $value['selected']; ?>> <?php echo $value['title_card']; ?> </option>
                                <?php endforeach; ?>
                            </select>
                            <!-- Fim de Select para Card -->
                        <div>
                    </div>
                </fieldset>

            </div>
        </div>
    </div>

</body>