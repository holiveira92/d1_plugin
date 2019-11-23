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
                    <legend><span class="number">1</span>Hero</legend>
                    <label for="secao1_hero_title">Chamada Principal:</label> <textarea name="secao1_hero_title"> <?php echo get_option_esc('secao1_hero_title') ?> </textarea>
                    <div style='display:flex;align-items:center;margin-bottom:25px;'> <input type="checkbox" name="secao1_hero_title_degrade"> Para Inserir Degradê, Selecione o Texto e Marque Esta Opção </div>
                    <label for="secao1_descricao_primaria">Benefícios:</label> <textarea name="secao1_descricao_primaria" rows=6> <?php echo get_option_esc('secao1_descricao_primaria') ?> </textarea>
                    <label for="secao1_descricao_secundaria">Chamada Pré CTA:</label> <textarea name="secao1_descricao_secundaria"> <?php echo get_option_esc('secao1_descricao_secundaria') ?> </textarea>
                    <div style='display:flex;align-items:center;margin-bottom:25px;'> <input type="checkbox" name="secao1_descricao_secundaria_degrade"> Para Inserir Degradê, Selecione o Texto e Marque Esta Opção </div>
                </fieldset>
            </div>
            <div class="col form-style-5">
                <fieldset>
                    <legend><span class="number">2</span>Depoimento</legend>
                    <label for="secao1_hero_name">Nome:</label> <input type="text" name="secao1_hero_name" value="<?php echo get_option_esc('secao1_hero_name') ?>">
                    <label for="secao1_hero_cargo">Cargo:</label> <input type="text" name="secao1_hero_cargo" value="<?php echo get_option_esc('secao1_hero_cargo') ?>">
                    <label for="secao1_hero_descricao">Mensagem:</label> <textarea name="secao1_hero_descricao"><?php echo get_option_esc('secao1_hero_descricao') ?></textarea>
                    <legend>Logotipo da empresa</legend><?php echo $this->d1_upload->get_image_options('secao1_hero_company'); ?>
                </fieldset>
            </div>
        </div>
        <div class="row">
            <div class="col form-style-5">
                <fieldset>
                    <legend><span class="number">3</span>Imagem</legend>
                    <legend>Imagem de Fundo</legend>
                    <?php echo $this->d1_upload->get_image_options('secao1_hero_img_bg'); ?>
                </fieldset>
            </div>
        </div>

        <div class="row">
            <div class="col form-style-5">
            <!-- Início de Select para CTA -->
            <label for="secao1_cta">Selecione CTA:</label><span class="margin-bottom"> Verifique o cadastro de CTA <a href="?page=d1_plugin_cta&tab=secao1">clicando aqui</a></span>
            <select name="secao1_cta">
                <option value="0"> Selecione </option>
                <?php
                //obtendo opções salvas no BD
				global $wpdb;
				$result = json_decode(json_encode($wpdb->get_results('SELECT * FROM ' . $wpdb->prefix . 'd1_call_to_action')), true);
                foreach ($result as $key => &$value) :
                    $id_selected = get_option_esc('secao1_cta');
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