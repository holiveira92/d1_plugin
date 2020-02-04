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
                    <legend><span class="number">1</span>Configurações da Seção</legend>
                    <div class="row">
                        <div class="col form-style-5 middle">
                            <label for="plataforma_secao1_title">Titulo:</label><input type="text" name="plataforma_secao1_title<?php echo D1Plugin::$language; ?>" value="<?php echo get_option_esc('plataforma_secao1_title'); ?>">
                            <label for="plataforma_secao1_descricao">Descrição:</label> <textarea name="plataforma_secao1_descricao<?php echo D1Plugin::$language; ?>"><?php echo get_option_esc('plataforma_secao1_descricao'); ?></textarea>
                            <label for="plataforma_secao1_chamada_modulo">Chamada Módulos:</label><input type="text" name="plataforma_secao1_chamada_modulo<?php echo D1Plugin::$language; ?>" value="<?php echo get_option_esc('plataforma_secao1_chamada_modulo'); ?>">
                            <!-- Início de Select para CTA -->
                            <label for="plataforma_secao1_cta">Selecione CTA:</label><span class="margin-bottom"> Verifique o cadastro de CTA <a href="?page=d1_plugin_cta&tab=secao1">clicando aqui</a></span>
                            <select name="plataforma_secao1_cta<?php echo D1Plugin::$language; ?>">
                                <option value="0"> Selecione </option>
                                <?php
                                //obtendo opções salvas no BD
                                global $wpdb;
                                $result = json_decode(json_encode($wpdb->get_results('SELECT * FROM ' . $wpdb->prefix . D1_LANG . 'd1_call_to_action')), true);
                                foreach ($result as $key => &$value) :
                                    $id_selected = get_option_esc('plataforma_secao1_cta');
                                    if ($value['id'] == $id_selected) $value['selected'] = 'selected';
                                    else $value['selected'] = '';
                                ?>
                                    <option value="<?php echo $value['id']; ?>" <?php echo $value['selected']; ?>> <?php echo $value['title']; ?> </option>
                                <?php endforeach; ?>
                            </select>
                            <!-- Fim de Select para CTA -->
                        </div>
                        <div class="col form-style-5 middle">
                            <label for="plataforma_secao1_img">Imagem do fundo:</label>
                            <?php echo $this->d1_upload->get_image_options('plataforma_secao1_img'); ?>
                        </div>
                    </div>
                </fieldset>
                <div class="row">
                <div class="col-12 form-style-5">
                    <fieldset>
                        <legend><span class="number">2</span>Cards de Desafio</legend>
                        <label for="plataforma_secao1_desafio_title">Titulo:</label><input type="text" name="plataforma_secao1_desafio_title<?php echo D1Plugin::$language; ?>" value="<?php echo get_option_esc('plataforma_secao1_desafio_title'); ?>">
                    </fieldset>
                </div>
                <?php
                    for($i=1;$i<=3;$i++):
                ?>  
                <div class="col-4 form-style-5 middle">
                    <fieldset>
                        <label for="plataforma_secao1_card<?php echo $i;?>_title">Titulo:</label><input type="text" name="plataforma_secao1_card<?php echo $i;?>_title<?php echo D1Plugin::$language; ?>" value="<?php echo get_option_esc("plataforma_secao1_card".$i."_title") ?>">
                        <label for="plataforma_secao1_card<?php echo $i;?>_desc">Descrição:</label> <textarea name="plataforma_secao1_card<?php echo $i;?>_desc<?php echo D1Plugin::$language; ?>"><?php echo get_option_esc("plataforma_secao1_card".$i."_desc") ?></textarea>
                    </fieldset>
                </div>
                <?php endfor; ?>
                </div>
            </div>
        </div>
    </div>

</body>