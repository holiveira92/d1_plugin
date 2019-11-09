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
                <fieldset>
                    <legend><span class="number">1</span>Missão</legend>
                    <div class="row">
                        <div class="col form-style-5">
                            <label for="jornada_secao1_main_title">Titulo:</label><input type="text" name="jornada_secao1_main_title" value="<?php echo get_option_esc('jornada_secao1_main_title'); ?>">
                            <label for="jornada_secao1_title">Missão:</label><input type="text" name="jornada_secao1_title" value="<?php echo get_option_esc('jornada_secao1_title'); ?>">
                            <div class="checkbox-degrade"> <input type="checkbox" name="jornada_secao1_title_degrade"> <span>Para Inserir Degradê, Selecione o Texto e Marque Esta Opção</span> </div>
                            <label for="jornada_secao1_desc">Pergunta:</label><input type="text" name="jornada_secao1_desc" value="<?php echo get_option_esc('jornada_secao1_desc'); ?>">

                            <!-- Início de Select para CTA -->
                            <label for="jornada_secao1_cta">Selecione CTA:</label><span class="margin-bottom"> Verifique o cadastro de CTA <a href="?page=d1_plugin_cta&tab=secao1">clicando aqui</a></span>
                            <select name="jornada_secao1_cta">
                                <option value="0"> Selecione </option>
                                <?php
                                //obtendo opções salvas no BD
                                global $wpdb;
                                $result = json_decode(json_encode($wpdb->get_results('SELECT * FROM ' . $wpdb->prefix . 'd1_call_to_action')), true);
                                foreach ($result as $key => &$value) :
                                    $id_selected = get_option_esc('jornada_secao1_cta');
                                    if ($value['id'] == $id_selected) $value['selected'] = 'selected';
                                    else $value['selected'] = '';
                                ?>
                                    <option value="<?php echo $value['id']; ?>" <?php echo $value['selected']; ?>> <?php echo $value['title']; ?> </option>
                                <?php endforeach; ?>
                            </select>
                            <!-- Fim de Select para CTA -->

                        </div>
                        <div class="col form-style-5">
                        <legend>Imagem de fundo</legend><?php echo $this->d1_upload->get_image_options('jornada_secao1_img'); ?>
                        </div>
                    </div>
                </fieldset>

                <fieldset>
                    <legend><span class="number">2</span>Sobre Nós</legend>
                    <div class="row">
                    
                    <div class="col form-style-5 middle">
                        <label for="jornada_secao1_about">Título:</label><input type="text" name="jornada_secao1_about" value="<?php echo get_option_esc('jornada_secao1_about'); ?>">
                        <label for="jornada_secao1_about_descricao">Descrição:</label> <textarea name="jornada_secao1_about_descricao" rows='5'><?php echo get_option_esc("jornada_secao1_about_descricao") ?></textarea>
                        <label for="jornada_secao1_about_text_link">Texto do Link:</label><input type="text" name="jornada_secao1_about_text_link" value="<?php echo get_option_esc('jornada_secao1_about_text_link'); ?>">
                        <label for="jornada_secao1_about_link">Link de redirecionamento:</label><input type="text" name="jornada_secao1_about_link" value="<?php echo get_option_esc('jornada_secao1_about_link'); ?>">
                    </div>

                    <div class="col form-style-5 middle">
                        <label for="jornada_secao1_about_descricao_secundaria">Destaque:</label> <textarea name="jornada_secao1_about_descricao_secundaria" rows='10'><?php echo get_option_esc("jornada_secao1_about_descricao_secundaria") ?></textarea>
                    </div>
                    
                    </div>
                </fieldset>

            </div>
        </div>
    </div>

</body>