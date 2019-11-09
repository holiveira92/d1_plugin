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
                <!-- ------------------------------------- Início Pré-Footer - Etapas de Contratação  ----------------------------------------------->
                <!-- Card Primeira Parte -->
                <fieldset>
                    <legend><span class="number">1</span>Informações da Seção</legend>
                    <label for="secao1_title">Titulo:</label><input type="text" name="secao1_title" value="<?php echo get_option_esc('secao1_title') ?>">
                </fieldset>
            </div>
        </div>
        <div class="row">
            <div class="col form-style-5">

                <!-- Passo 1 -->
                <fieldset>
                    <legend><span class="number">2</span>Passo 1</legend>
                    <label for="secao1_passo1_title">Titulo:</label> <textarea name="secao1_passo1_title"><?php echo get_option_esc('secao1_passo1_title') ?></textarea>
                    <label for="secao1_passo1_descricao">Descrição:</label> <textarea name="secao1_passo1_descricao"><?php echo get_option_esc('secao1_passo1_descricao') ?></textarea>
                </fieldset>
            </div>
            <div class="col form-style-5">
                <!-- Passo 2 -->
                <fieldset>
                    <legend><span class="number">3</span>Passo 2</legend>
                    <label for="secao1_passo2_title">Titulo:</label> <textarea name="secao1_passo2_title"><?php echo get_option_esc('secao1_passo2_title') ?></textarea>
                    <label for="secao1_passo2_descricao">Descrição:</label> <textarea name="secao1_passo2_descricao"><?php echo get_option_esc('secao1_passo2_descricao') ?></textarea>
                </fieldset>
            </div>
        </div>
        <div class="row">
            <div class="col form-style-5">
                <!-- Passo 3 -->
                <fieldset>
                    <legend><span class="number">4</span>Passo 3</legend>
                    <label for="secao1_passo3_title">Titulo:</label> <textarea name="secao1_passo3_title"><?php echo get_option_esc('secao1_passo3_title') ?></textarea>
                    <label for="secao1_passo3_descricao">Descrição:</label> <textarea name="secao1_passo3_descricao"><?php echo get_option_esc('secao1_passo3_descricao') ?></textarea>
                </fieldset>
            </div>
            <div class="col form-style-5">
                <!-- Passo 4 -->
                <fieldset>
                    <legend><span class="number">5</span>Passo 4</legend>
                    <label for="secao1_passo4_title">Titulo:</label> <textarea name="secao1_passo4_title"><?php echo get_option_esc('secao1_passo4_title') ?></textarea>
                    <label for="secao1_passo4_descricao">Descrição:</label> <textarea name="secao1_passo4_descricao"><?php echo get_option_esc('secao1_passo4_descricao') ?></textarea>
                </fieldset>
            </div>
        </div>
        <div class="row">
            <div class="col form-style-5">
                <fieldset>
                    <label for="secao1_desc_pre_cta">Descrição Pré CTA:</label> <input type="text" name="secao1_desc_pre_cta" value="<?php echo get_option_esc('secao1_desc_pre_cta') ?>">
                    <div style='display:flex;align-items:center;margin-bottom:25px;'><input type="checkbox" name="secao1_desc_pre_cta_degrade"> Para Inserir Degradê, Selecione o Texto e Marque Esta Opção </div>
                </fieldset>

                <!-------------------------------------- Fim Pré-Footer - Etapas de Contratação ----------------------------------------------->

            </div>
        </div>

        <div class="row">
            <div class="col form-style-5">
            <!-- Início de Select para CTA -->
            <label for="secao1_footer_cta">Selecione CTA:</label><span class="margin-bottom"> Verifique o cadastro de CTA <a href="?page=d1_plugin_cta&tab=secao1">clicando aqui</a></span>
            <select name="secao1_footer_cta">
                <option value="0"> Selecione </option>
                <?php
                //obtendo opções salvas no BD
				global $wpdb;
				$result = json_decode(json_encode($wpdb->get_results('SELECT * FROM ' . $wpdb->prefix . 'd1_call_to_action')), true);
                foreach ($result as $key => &$value) :
                    $id_selected = get_option_esc('secao1_footer_cta');
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
    <script>
        var coll = document.getElementsByClassName("collapsible");
        var i;
        for (i = 0; i < coll.length; i++) {
            coll[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var content = this.nextElementSibling;
                if (content.style.display === "block") {
                    content.style.display = "none"
                } else {
                    content.style.display = "block"
                }
            })
        }
    </script>