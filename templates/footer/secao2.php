<?php
?>

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

                <!-- ------------------------------------- Início Blog ----------------------------------------------->
                <!-- Card Primeira Parte -->
                <fieldset>
                    <legend><span class="number">0</span>Informações da Seção</legend>
                    <div id='secao2_content1' class="content" style='display:block;'>
                        <label for="secao2_title">Titulo da Seção:</label><input type="text" name="secao2_title" value="<?php echo get_option('secao2_title') ?>" placeholder="Titulo da Seção">
                        <label for="secao2_descricao">Descrição da Seção:</label> <textarea name="secao2_descricao" placeholder="Descrição da Seção Se Torne um Expert"><?php echo get_option('secao2_descricao') ?></textarea>
                </fieldset>
            </div>
        </div>
        <div class="row">
            <div class="col form-style-5">

                <!-- Card 1 -->
                <fieldset>
                    <legend><span class="number">1</span>Blog Card</legend>
                    <label for="secao2_card1_title">Titulo da Seção:</label><input type="text" name="secao2_card1_title" value="<?php echo get_option('secao2_card1_title') ?>" placeholder="Titulo">
                    <label for="secao2_card1_descricao">Descrição:</label> <textarea name="secao2_card1_descricao" placeholder="Descrição" rows='4'><?php echo get_option('secao2_card1_descricao') ?></textarea>
                    <label for="secao2_card1_artigo_link">Link Artigo:</label> <textarea name="secao2_card1_artigo_link" placeholder="Link Artigo" rows='1'><?php echo get_option('secao2_card1_artigo_link') ?></textarea>
                    <legend>Imagem Background</legend><?php echo $this->d1_upload->get_image_options('secao2_card1_img_bg'); ?>
                </fieldset>
            </div>
            <div class="col form-style-5">
                <!-- Card 2 -->
                <fieldset style='flex: 0 33%; padding: 0 2%;'>
                    <legend><span class="number">2</span>Blog Card</legend>
                    <label for="secao2_card2_title">Titulo da Seção:</label><input type="text" name="secao2_card2_title" value="<?php echo get_option('secao2_card2_title') ?>" placeholder="Titulo">
                    <label for="secao2_card2_descricao">Descrição:</label> <textarea name="secao2_card2_descricao" placeholder="Descrição" rows='4'><?php echo get_option('secao2_card2_descricao') ?></textarea>
                    <label for="secao2_card2_artigo_link">Link Artigo:</label> <textarea name="secao2_card2_artigo_link" placeholder="Link Artigo" rows='1'><?php echo get_option('secao2_card2_artigo_link') ?></textarea>
                    <legend>Imagem Background</legend><?php echo $this->d1_upload->get_image_options('secao2_card2_img_bg'); ?>
                </fieldset>
            </div>
            <div class="col form-style-5">
                <!-- Card 3 -->
                <fieldset style='flex: 0 33%; padding: 0 2%;;'>
                    <legend><span class="number">3</span>Blog Card</legend>
                    <label for="secao2_card3_title">Titulo da Seção:</label><input type="text" name="secao2_card3_title" value="<?php echo get_option('secao2_card3_title') ?>" placeholder="Titulo">
                    <label for="secao2_card3_descricao">Descrição:</label> <textarea name="secao2_card3_descricao" placeholder="Descrição" rows='4'><?php echo get_option('secao2_card3_descricao') ?></textarea>
                    <label for="secao2_card3_artigo_link">Link Artigo:</label> <textarea name="secao2_card3_artigo_link" placeholder="Link Artigo" rows='1'><?php echo get_option('secao2_card3_artigo_link') ?></textarea>
                    <legend>Imagem Background</legend><?php echo $this->d1_upload->get_image_options('secao2_card3_img_bg'); ?>
                </fieldset>
            </div>
        </div>
        <!-------------------------------------- Fim Seção Blog ----------------------------------------------->
    </div>
</body>