<?php
global $wpdb;
$id_card            = !empty($_REQUEST["id_card"]) ? $_REQUEST["id_card"] : false;
$cases_list         = json_decode(json_encode($wpdb->get_results("SELECT * FROM " . $wpdb->prefix . "d1_cases")), true);
$categorias_list    = json_decode(json_encode($wpdb->get_results("SELECT * FROM " . $wpdb->prefix . "d1_cases_categorias WHERE id_categoria IS NOT NULL AND id_categoria !='' ")), true);
$data_bd            = !empty($id_card) ? json_decode(json_encode($wpdb->get_results("SELECT * FROM " . $wpdb->prefix . "d1_cases WHERE id_card = $id_card")), true) : array();
$param              = array('path_wp' => ABSPATH, 'id_card' => $id_card, 'url_location' => "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
$query_string       = http_build_query($param);
$delete_url         = plugins_url('d1_plugin/templates/cases/delete.php?', 'd1_plugin') . $query_string;
$voltar_url         = "?page=d1_plugin_cases&tab=config_cards&" . $query_string;
$data = array(
    'id_card'               => !empty($data_bd[0]["id_card"]) ? $data_bd[0]["id_card"] : '',
    'title_card'            => !empty($data_bd[0]["title_card"]) ? $data_bd[0]["title_card"] : '',
    'desc_card'             => !empty($data_bd[0]["desc_card"]) ? $data_bd[0]["desc_card"] : '',
    'subtitle_card'         => !empty($data_bd[0]["subtitle_card"]) ? $data_bd[0]["subtitle_card"] : '',
    'text_footer_card'      => !empty($data_bd[0]["text_footer_card"]) ? $data_bd[0]["text_footer_card"] : '',
    'subtext_footer_card'   => !empty($data_bd[0]["subtext_footer_card"]) ? $data_bd[0]["subtext_footer_card"] : '',
    'card_link'             => !empty($data_bd[0]["card_link"]) ? $data_bd[0]["card_link"] : '',
    'img_bg_url'            => !empty($data_bd[0]["img_bg_url"]) ? urldecode($data_bd[0]["img_bg_url"]) : '',
    'detach_card'           => !empty($data_bd[0]["detach_card_hidden"]) ? $data_bd[0]["detach_card_hidden"] : 0,
    'destaque'              => !empty($data_bd[0]["detach_card_hidden"]) && $data_bd[0]['detach_card'] == 1 ? 'checked' : '',
    'desc_completa_primaria' => !empty($data_bd[0]["desc_completa_primaria"]) ? $data_bd[0]["desc_completa_primaria"] : '',
    'desc_completa_secundaria' => !empty($data_bd[0]["desc_completa_secundaria"]) ? $data_bd[0]["desc_completa_secundaria"] : '',
    'objetivos_title'       => !empty($data_bd[0]["objetivos_title"]) ? $data_bd[0]["objetivos_title"] : '',
    'objetivos_desc_completa' => !empty($data_bd[0]["objetivos_desc_completa"]) ? $data_bd[0]["objetivos_desc_completa"] : '',
);

$impactos              = !empty($data_bd[0]["impactos"]) ? json_decode($data_bd[0]["impactos"], true) : array();
$impactos_data = array(
    'impacto_title'     => !empty($impactos['impacto_title']) ? $impactos['impacto_title'] : '',
    'impacto1_title'    => !empty($impactos['impacto1_title']) ? $impactos['impacto1_title'] : '',
    'impacto1_total'    => !empty($impactos['impacto1_total']) ? $impactos['impacto1_total'] : '',
    'impacto1_desc'     => !empty($impactos['impacto1_desc']) ? $impactos['impacto1_desc'] : '',
    'impacto2_title'    => !empty($impactos['impacto2_title']) ? $impactos['impacto2_title'] : '',
    'impacto2_total'    => !empty($impactos['impacto2_total']) ? $impactos['impacto2_total'] : '',
    'impacto2_desc'     => !empty($impactos['impacto2_desc']) ? $impactos['impacto2_desc'] : '',
    'impacto3_title'    => !empty($impactos['impacto3_title']) ? $impactos['impacto3_title'] : '',
    'impacto3_total'    => !empty($impactos['impacto3_total']) ? $impactos['impacto3_total'] : '',
    'impacto3_desc'     => !empty($impactos['impacto3_desc']) ? $impactos['impacto3_desc'] : '',
);
//pre($impactos_data);die;
$desafios              = !empty($data_bd[0]["desafios"]) ? json_decode($data_bd[0]["desafios"], true) : array();
$desafios_data = array(
    'desafios_title'            => !empty($desafios['desafios_title']) ? $desafios['desafios_title'] : '',
    'desafio1_desc_completa'    => !empty($desafios['desafio1_desc_completa']) ? $desafios['desafio1_desc_completa'] : '',
    'desafio2_desc_completa'    => !empty($desafios['desafio2_desc_completa']) ? $desafios['desafio2_desc_completa'] : '',
    'desafio3_desc_completa'    => !empty($desafios['desafio3_desc_completa']) ? $desafios['desafio3_desc_completa'] : '',
);

$implantacao                    = !empty($data_bd[0]["implantacao"]) ? json_decode($data_bd[0]["implantacao"], true) : array();
$implantacao_data = array(
    'implantacao_title'             => !empty($implantacao['implantacao_title']) ? $implantacao['implantacao_title'] : '',
    'implantacao_desc_primaria'     => !empty($implantacao['implantacao_desc_primaria']) ? $implantacao['implantacao_desc_primaria'] : '',
    'implantacao_desc_secundaria'   => !empty($implantacao['implantacao_desc_secundaria']) ? $implantacao['implantacao_desc_secundaria'] : '',
    'implantacao_resultado1_title'  => !empty($implantacao['implantacao_resultado1_title']) ? $implantacao['implantacao_resultado1_title'] : '',
    'implantacao_resultado1_valor'  => !empty($implantacao['implantacao_resultado1_valor']) ? $implantacao['implantacao_resultado1_valor'] : '',
    'implantacao_resultado1_desc'   => !empty($implantacao['implantacao_resultado1_desc']) ? $implantacao['implantacao_resultado1_desc'] : '',
    'implantacao_resultado2_title'  => !empty($implantacao['implantacao_resultado2_title']) ? $implantacao['implantacao_resultado2_title'] : '',
    'implantacao_resultado2_valor'  => !empty($implantacao['implantacao_resultado2_valor']) ? $implantacao['implantacao_resultado2_valor'] : '',
    'implantacao_resultado2_desc'   => !empty($implantacao['implantacao_resultado2_desc']) ? $implantacao['implantacao_resultado2_desc'] : '',
);
$cases_options                      = !empty($data_bd[0]["cases_options"]) ? json_decode($data_bd[0]["cases_options"], true) : array();
$cases_options = array(
    'cases_random' => !empty($cases_options['cases_random']) ? 'checked' : '',
    'list_case1' => !empty($cases_options['list_case1']) ? $cases_options['list_case1'] : 0,
    'list_case2' => !empty($cases_options['list_case2']) ? $cases_options['list_case2'] : 0,
    'list_case3' => !empty($cases_options['list_case3']) ? $cases_options['list_case3'] : 0,
    'categoria_case' => !empty($cases_options['categoria_case']) ? $cases_options['categoria_case'] : 0,
);
?>

<head>
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
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>

<?php $url_action = plugins_url('d1_plugin/templates/cases/create_edit.php', 'd1_plugin'); ?>

<body class="animsition">
<h1> Link Permanente: </h1> <a href="<?php echo site_url() . '/case/?id='.$data['id_card']; ?>" target="_blank"><?php echo site_url() . '/case/?id='.$data['id_card']; ?></a>
    <form id="cases_fields" action="<?php echo $url_action; ?>">
        <div class="container">
            <div class="row">
                <div class="col form-style-5" id='secao1_content1' style="padding-bottom:0px!important">
                    <input type="hidden" name="admin_url" id="admin_url" value="<?php echo admin_url(); ?>">
                    <input type="hidden" name="url_location" id="url_location" value="<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>">
                    <input type="hidden" name="path_wp" id="path_wp" value="<?php echo ABSPATH; ?> ">
                    <input type="hidden" name="img_default" id="img_default" value="<?php echo get_template_directory_uri() . "/images/img_default.jpg"; ?> ">
                    <!-- Seção 1 -->
                    <fieldset>
                        <input type="hidden" name="id_card" value="<?php echo $data['id_card']; ?>">
                        <legend><span class="number">1</span>Informações do Case</legend>
                    </fieldset>
                </div>
            </div>
            <div class="row">
                <div class="col form-style-5 middle" id='secao1_content1'>
                    <fieldset>
                        <!-- Destaque: <input type="checkbox" name="detach_card" style='margin-top:-2px;'> !-->
                        <input type="hidden" name="detach_card_hidden" value="<?php echo $data['detach_card']; ?>" />
                        <label>Título:</label><input type="text" name="title_card" value="<?php echo $data['title_card']; ?>" required>
                        <label>Descrição:</label><input type="text" name="desc_card" value="<?php echo $data['desc_card']; ?>" required>
                        <div class="checkbox-degrade"> <input type="checkbox" name="desc_card_degrade"> Para Inserir Degradê, Selecione o Texto e Marque Esta Opção </div>
                        <label>Objetivo:</label><input type="text" name="subtitle_card" value="<?php echo $data['subtitle_card']; ?>">
                        <label>Nº Impacto:</label><input type="text" name="text_footer_card" value="<?php echo $data['text_footer_card']; ?>">
                        <label>Descrição Secundária:</label><input type="text" name="subtext_footer_card" value="<?php echo $data['subtext_footer_card']; ?>">

                    </fieldset>
                </div>
                <div class="col form-style-5 middle" id='secao1_content1'>
                    <fieldset>
                        <label for="list_case<?php echo $i;?>">Selecione a Categoria:</label> <select name="categoria_case">
                            <option value="0"> Selecione </option>
                            <?php $id_selected = $cases_options["categoria_case"];
                            foreach ($categorias_list as $key => &$value) :
                                if ($value['id'] == $id_selected) $value['selected'] = 'selected';
                                else $value['selected'] = '';
                            ?>
                            <option value="<?php echo $value['id']; ?>" <?php echo $value['selected']; ?>> <?php echo $value['descricao']; ?> </option>
                            <?php endforeach; ?>
                        </select>
                        <!--<label>Link:</label><input type="text" name="card_link" value="<?php echo $data['card_link']; ?>"> !-->
                        <label>Imagem de Fundo</label><?php echo $this->d1_upload->get_image_options_cases("img_bg_url", $data['id_card']); ?>
                    </fieldset>
                </div>
            </div>
            <div class="row">
                <!-- Seção 2 -->
                <div class="col form-style-5 middle" id='secao1_content2'>
                    <fieldset>
                        <legend><span class="number">2</span>Impacto</legend>
                        <label>Titulo:</label><input type="text" name="impacto_title" value="<?php echo $impactos_data['impacto_title']; ?>">
                    </fieldset>
                </div>
            </div>
            <div class="row">
                <div class="col form-style-5 middle">
                    <!-- Impacto 1 -->
                    <fieldset>
                        <legend>Impacto 1</legend>
                        <label>Titulo:</label><input type="text" name="impacto1_title" value="<?php echo $impactos_data['impacto1_title']; ?>">
                        <label>Total:</label><input type="text" name="impacto1_total" value="<?php echo $impactos_data['impacto1_total']; ?>">
                        <label>Descrição:</label><input type="text" name="impacto1_desc" value="<?php echo $impactos_data['impacto1_desc']; ?>">
                    </fieldset>
                </div>
                <div class="col form-style-5 middle">
                    <!-- Impacto 2 -->
                    <fieldset>
                        <legend>Impacto 2</legend>
                        <label>Titulo:</label><input type="text" name="impacto2_title" value="<?php echo $impactos_data['impacto2_title']; ?>">
                        <label>Total:</label><input type="text" name="impacto2_total" value="<?php echo $impactos_data['impacto2_total']; ?>">
                        <label>Descrição:</label><input type="text" name="impacto2_desc" value="<?php echo $impactos_data['impacto2_desc']; ?>">
                    </fieldset>
                </div>
                <div class="col form-style-5 middle">
                    <!-- Impacto 3 -->
                    <fieldset>
                        <legend>Impacto 3</legend>
                        <label>Titulo:</label><input type="text" name="impacto3_title" value="<?php echo $impactos_data['impacto3_title']; ?>">
                        <label>Total:</label><input type="text" name="impacto3_total" value="<?php echo $impactos_data['impacto3_total']; ?>">
                        <label>Descrição:</label><input type="text" name="impacto3_desc" value="<?php echo $impactos_data['impacto3_desc']; ?>">
                    </fieldset>
                </div>
            </div>
            <div class="row">
                <!-- Seção 3 -->
                <div class="col form-style-5 middle" id='secao1_content3'>
                    <fieldset>
                        <legend><span class="number">3</span>Descrição</legend>
                    </fieldset>
                </div>
            </div>
            <div class="row">
                <div class="col form-style-5 middle">
                    <fieldset>
                        <label for="desc_completa_primaria">Primária</label> <textarea name="desc_completa_primaria" rows='10'><?php echo $data['desc_completa_primaria']; ?> </textarea>
                    </fieldset>
                </div>
                <div class="col form-style-5 middle">
                    <fieldset>
                        <label for="desc_completa_secundaria">Secundária</label> <textarea name="desc_completa_secundaria" rows='10'><?php echo $data['desc_completa_secundaria']; ?> </textarea>
                    </fieldset>
                </div>
            </div>
            <div class="row">
                <!-- Seção 4 -->
                <div class="col form-style-5 middle" id='secao1_content4'>
                    <fieldset>
                        <legend><span class="number">4</span>Objetivos</legend>
                    </fieldset>
                </div>
            </div>
            <div class="row">
                <div class="col-4 form-style-5 middle">
                    <fieldset>
                        <label>Titulo:</label><input type="text" name="objetivos_title" value="<?php echo $data['objetivos_title']; ?>">
                    </fieldset>
                </div>
                <div class="col-8 form-style-5 middle">
                    <fieldset>
                        <label for="objetivos_desc_completa">Descrição</label> <textarea name="objetivos_desc_completa" rows='10'><?php echo $data['objetivos_desc_completa']; ?> </textarea>
                    </fieldset>
                </div>
            </div>
            <div class="row">
                <!-- Seção 5 -->
                <div class="col form-style-5 middle" id='secao1_content5'>
                    <fieldset>
                        <legend><span class="number">5</span>Desafios</legend>
                        <label>Titulo:</label><input type="text" name="desafios_title" value="<?php echo $desafios_data['desafios_title']; ?>">
                    </fieldset>
                </div>
            </div>
            <div class="row">
                <div class="col form-style-5 middle">
                    <!-- Desafio 1 -->
                    <fieldset>
                        <label for="desafio1_desc_completa">Descrição do Desafio 1</label> <textarea name="desafio1_desc_completa" rows='10'><?php echo $desafios_data['desafio1_desc_completa']; ?> </textarea>
                    </fieldset>
                </div>
                <div class="col form-style-5 middle">
                    <!-- Desafio 2 -->
                    <fieldset>
                        <label for="desafio2_desc_completa">Descrição do Desafio 2</label> <textarea name="desafio2_desc_completa" rows='10'><?php echo $desafios_data['desafio2_desc_completa']; ?> </textarea>
                    </fieldset>
                </div>
                <div class="col form-style-5 middle">
                    <!-- Desafio 3 -->
                    <fieldset>
                        <label for="desafio3_desc_completa">Descrição do Desafio 3</label> <textarea name="desafio3_desc_completa" rows='10'><?php echo $desafios_data['desafio3_desc_completa']; ?> </textarea>
                    </fieldset>
                </div>
            </div>

            <div class="row">
                <!-- Seção 5 -->
                <div class="col form-style-5 middle" id='secao1_content6'>
                    <fieldset>
                        <legend><span class="number">6</span>Etapas de Implantação</legend>
                        <label>Titulo:</label><input type="text" name="implantacao_title" value="<?php echo $implantacao_data['implantacao_title']; ?>">
                    </fieldset>
                </div>
            </div>
            <div class="row">
                <div class="col-4 form-style-5 middle">
                    <fieldset>
                        <label for="implantacao_desc_primaria">Descrição Primária</label> <textarea name="implantacao_desc_primaria" rows='10'><?php echo $implantacao_data['implantacao_desc_primaria']; ?> </textarea>
                    </fieldset>
                </div>
                <div class="col-8 form-style-5 middle">
                    <fieldset>
                        <label for="implantacao_desc_secundaria">Descrição Secundária</label> <textarea name="implantacao_desc_secundaria" rows='10'><?php echo $implantacao_data['implantacao_desc_secundaria']; ?> </textarea>
                        <div class="checkbox-degrade"> <input type="checkbox" name="implantacao_desc_secundaria_degrade"> Para Inserir Degradê, Selecione o Texto e Marque Esta Opção </div>
                    </fieldset>
                </div>
            </div>
            <div class="row">
                <div class="col-4 form-style-5 middle">
                    <fieldset>
                        <label>Resultado 1:</label><input type="text" name="implantacao_resultado1_title" value="<?php echo $implantacao_data['implantacao_resultado1_title']; ?>">
                        <label>Valor:</label><input type="text" name="implantacao_resultado1_valor" value="<?php echo $implantacao_data['implantacao_resultado1_valor']; ?>">
                        <label>Descrição:</label><input type="text" name="implantacao_resultado1_desc" value="<?php echo $implantacao_data['implantacao_resultado1_desc']; ?>">
                    </fieldset>
                </div>
                <div class="col-4 form-style-5 middle">
                    <fieldset>
                        <label>Resultado 2:</label><input type="text" name="implantacao_resultado2_title" value="<?php echo $implantacao_data['implantacao_resultado2_title']; ?>">
                        <label>Valor:</label><input type="text" name="implantacao_resultado2_valor" value="<?php echo $implantacao_data['implantacao_resultado2_valor']; ?>">
                        <label>Descrição:</label><input type="text" name="implantacao_resultado2_desc" value="<?php echo $implantacao_data['implantacao_resultado2_desc']; ?>">
                    </fieldset>
                </div>
                <div class="col-4 form-style-5 middle">
                <input type="checkbox" name="cases_random" <?php echo $cases_options['cases_random'];?>> <span style="margin-bottom:10px">Marque para Usar Cases Aleatórios</span><br><br>
                        <?php
                            for($i=1;$i<=3;$i++):
                        ?>
                            <!-- Início de Select para Card -->
                            <label for="list_case<?php echo $i;?>">Selecione os Cases -  Opção <?php echo $i;?>:</label> <select name="list_case<?php echo $i;?>">
                                <option value="0"> Selecione </option>
                                <?php $id_selected = $cases_options["list_case$i"];
                                foreach ($cases_list as $key => &$value) :
                                    if ($value['id_card'] == $id_selected) $value['selected'] = 'selected';
                                    else $value['selected'] = '';
                                ?>
                                <option value="<?php echo $value['id_card']; ?>" <?php echo $value['selected']; ?>> <?php echo $value['title_card']; ?> </option>
                                <?php endforeach; ?>
                            </select>
                            <!-- Fim de Select para Card -->
                        <?php endfor; ?>
                </div>
            </div>
        </div>
            <p class="submit">
                <input type="submit" id="cases_submit" class="button button-primary" value="Salvar Alterações" />
            </p>
    </form>

    <script>
        $(document).ready(function() {
            //botão deletar
            $(document).on('click', '.btn_remove', function() {
                if (!confirm('Tem certeza que deseja apagar este case?')) {
                    return false;
                }
            });
        });
    </script>
</body>