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
                    <legend><span class="number">1</span>Informações da Seção</legend>
                    <div class="row">
                        <div class="col form-style-5 middle">
                            <label for="contato_secao1_main_title">Titulo Primário:</label><input type="text" name="contato_secao1_main_title<?php echo D1Plugin::$language; ?>" value="<?php echo get_option_esc('contato_secao1_main_title'); ?>" placeholder="Titulo Principal">
                            <label for="contato_secao1_title">Titulo Secundário:</label><input type="text" name="contato_secao1_title<?php echo D1Plugin::$language; ?>" value="<?php echo get_option_esc('contato_secao1_title'); ?>" placeholder="Titulo Secundário">
                            <label for="contato_secao1_desc_rodape">Descrição Rodapé:</label><input type="text" name="contato_secao1_desc_rodape<?php echo D1Plugin::$language; ?>" value="<?php echo get_option_esc('contato_secao1_desc_rodape'); ?>" placeholder="Descrição Rodapé">
                            <div class="checkbox-degrade"><input type="checkbox" name="contato_secao1_desc_rodape_degrade<?php echo D1Plugin::$language; ?>"> Para Inserir Degradê, Selecione o Texto e Marque Esta Opção </div>
                        </div>
                    </div>
                </fieldset>

                <div class="row">
                <?php
                    for($i=1;$i<=3;$i++):
                ?>  
                <div class="col form-style-5 middle">
                <fieldset>
                    <legend><span class="number"><?php echo $i;?></span>Itens Especialidade <?php echo $i;?></legend>
                        <label for="contato_secao1_item<?php echo $i;?>_desc">Descricao:</label> <textarea name="contato_secao1_item<?php echo $i;?>_desc<?php echo D1Plugin::$language; ?>" placeholder="Descrição"><?php echo get_option_esc("contato_secao1_item".$i."_desc") ?></textarea>
                        <label for="contato_secao1_item<?php echo $i;?>_button_title">Titulo Botão:</label><input type="text" name="contato_secao1_item<?php echo $i;?>_button_title<?php echo D1Plugin::$language; ?>" value="<?php echo get_option_esc("contato_secao1_item".$i."_button_title") ?>" placeholder="Titulo Botão">
                        <label for="contato_secao1_item<?php echo $i;?>_link">Link Botão:</label><input type="text" name="contato_secao1_item<?php echo $i;?>_link<?php echo D1Plugin::$language; ?>" value="<?php echo get_option_esc("contato_secao1_item".$i."_link") ?>" placeholder="Link Botão">
                        <label for="contato_secao1_img_icon">Ícone:</label>
                        <?php echo $this->d1_upload->get_image_options("contato_secao1_img_icon$i"); ?>
                </fieldset>
                </div>
                <?php endfor; ?>
                </div>
            </div>
        </div>
    </div>

</body>