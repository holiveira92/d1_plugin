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
                    <legend><span class="number">1</span>Slide</legend>
                    <label for="jornada_secao4_slide_title">Titulo:</label><input type="text" name="jornada_secao4_slide_title<?php echo D1Plugin::$language; ?>" value="<?php echo get_option_esc('jornada_secao4_slide_title'); ?>">
                    <label for="jornada_secao4_slide_code">Código iframe do Slideshare:</label> <textarea name="jornada_secao4_slide_code<?php echo D1Plugin::$language; ?>" rows='7'><?php echo get_option_esc('jornada_secao4_slide_code'); ?></textarea>
                    <label for="jornada_secao4_slide_link_chamada">Chamda - Download Slides:</label><input type="text" name="jornada_secao4_slide_link_chamada<?php echo D1Plugin::$language; ?>" value="<?php echo get_option_esc('jornada_secao4_slide_link_chamada'); ?>" placeholder="Chamda - Download Slides">
                    <label for="jornada_secao4_slide_link">Link de download:</label><input type="text" name="jornada_secao4_slide_link<?php echo D1Plugin::$language; ?>" value="<?php echo get_option_esc('jornada_secao4_slide_link'); ?>" >
                </fieldset>

                <fieldset>
                    <legend><span class="number">2</span>Inovação</legend>
                    <label for="jornada_secao4_inovacao_main_title">Titulo:</label><input type="text" name="jornada_secao4_inovacao_main_title<?php echo D1Plugin::$language; ?>" value="<?php echo get_option_esc('jornada_secao4_inovacao_main_title'); ?>">
                    <label for="jornada_secao4_inovacao_title">Destaque:</label><input type="text" name="jornada_secao4_inovacao_title<?php echo D1Plugin::$language; ?>" value="<?php echo get_option_esc('jornada_secao4_inovacao_title'); ?>">
                    <label for="jornada_secao4_inovacao_desc">Descrição:</label> <textarea name="jornada_secao4_inovacao_desc<?php echo D1Plugin::$language; ?>"><?php echo get_option_esc('jornada_secao4_inovacao_desc'); ?></textarea>
                    <label for="jornada_secao4_inovacao_desc_pre_cta">Descricao Pré-CTA:</label> <textarea name="jornada_secao4_inovacao_desc_pre_cta<?php echo D1Plugin::$language; ?>"><?php echo get_option_esc('jornada_secao4_inovacao_desc_pre_cta'); ?></textarea>
                    <div class="checkbox-degrade"> <input type="checkbox" name="jornada_secao4_inovacao_desc_pre_cta_degrade<?php echo D1Plugin::$language; ?>"> Para Inserir Degradê, Selecione o Texto e Marque Esta Opção </div>

                    <?php
                        //obtendo opções salvas no BD
                        global $wpdb;
                        $cta = json_decode(json_encode($wpdb->get_results('SELECT * FROM ' . $wpdb->prefix . D1_LANG . 'd1_call_to_action')), true);
                    ?>
                    <!-- Início de Select para CTA -->
                    <span class="margin-bottom"> Verifique o cadastro de call to action <a href="?page=d1_plugin_cta&tab=secao1">clicando aqui</a></span>
                    <label for="jornada_secao4_inovacao_cta">Selecione o Call to Action:</label> <select name="jornada_secao4_inovacao_cta<?php echo D1Plugin::$language; ?>">
                        <option value="0"> Selecione </option>
                        <?php
                        foreach ($cta as $key => &$value) :
                            $id_selected = get_option_esc('jornada_secao4_inovacao_cta');
                            if ($value['id'] == $id_selected) {
                                $value['selected'] = 'selected';
                            } else {
                                $value['selected'] = '';
                            }
                            ?>
                            <option value="<?php echo $value['id']; ?>" <?php echo $value['selected']; ?>> <?php echo $value['title']; ?> </option>
                        <?php endforeach; ?>
                    </select>
                    <!-- Fim de Select para CTA -->

                </fieldset>
            </div>
        </div>
    </div>
</body>