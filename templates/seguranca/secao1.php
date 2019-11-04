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
                    <legend><span class="number">1</span>Informações da Seção</legend>
                    <div class="row">
                        <div class="col form-style-5 middle">
                            <label for="seguranca_secao1_title">Titulo:</label><input type="text" name="seguranca_secao1_title" value="<?php echo get_option_esc('seguranca_secao1_title'); ?>" placeholder="Titulo">
                            <label for="seguranca_secao1_descricao">Descricao:</label> <textarea name="seguranca_secao1_descricao" placeholder="Descrição"><?php echo get_option_esc('seguranca_secao1_descricao'); ?></textarea>
                        </div>
                        <div class="col form-style-5 middle">
                            <label for="seguranca_secao1_img">Imagem Background:</label>
                            <?php echo $this->d1_upload->get_image_options('seguranca_secao1_img'); ?>
                        </div>
                    </div>
                </fieldset>

                <fieldset>
                    <legend><span class="number">2</span>Itens Segurança</legend>
                    <div class="row">
                <?php
                    for($i=1;$i<=3;$i++):
                ?>  
                    <div class="col form-style-5 middle">
                        <label for="seguranca_secao1_item<?php echo $i;?>_title">Titulo:</label><input type="text" name="seguranca_secao1_item<?php echo $i;?>_title" value="<?php echo get_option_esc("seguranca_secao1_item".$i."_title") ?>" placeholder="Titulo">
                        <label for="seguranca_secao1_item<?php echo $i;?>_subtitle">SubTitulo:</label><input type="text" name="seguranca_secao1_item<?php echo $i;?>_subtitle" value="<?php echo get_option_esc("seguranca_secao1_item".$i."_subtitle") ?>" placeholder="SubTitulo">
                        <label for="seguranca_secao1_item<?php echo $i;?>_desc">Descricao:</label> <textarea name="seguranca_secao1_item<?php echo $i;?>_desc" placeholder="Descrição"><?php echo get_option_esc("seguranca_secao1_item".$i."_desc") ?></textarea>
                    </div>
                <?php endfor; ?>
                    </div>
                </fieldset>

            </div>
        </div>
    </div>

</body>