<?php
global $wpdb;
$id_modulo          = !empty($_REQUEST["id_modulo"]) ? $_REQUEST["id_modulo"] : false;
$data_bd            = !empty($id_modulo) ? json_decode(json_encode($wpdb->get_results("SELECT * FROM " . $wpdb->prefix . "d1_modulos WHERE id = $id_modulo")), true) : array();
$itens              = !empty($id_modulo) ? json_decode(json_encode($wpdb->get_results("SELECT * FROM " . $wpdb->prefix . "d1_modulos WHERE id_modulo = $id_modulo")), true) : array();
$param              = array('path_wp' => ABSPATH, 'id_modulo' => $id_modulo, 'url_location' => "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
$query_string       = http_build_query($param);
$delete_url         = plugins_url('d1_plugin/templates/home/modulos_delete.php?', 'd1_plugin') . $query_string;
$voltar_url         = "?page=d1_plugin_cases&tab=secao2&" . $query_string;
$data = array(
    'id'            => !empty($data_bd[0]["id"]) ? $data_bd[0]["id"] : '',
    'title'         => !empty($data_bd[0]["title"]) ? $data_bd[0]["title"] : '',
    'id_modulo'     => !empty($data_bd[0]["id_modulo"]) ? $data_bd[0]["id_modulo"] : '',
    'subtitle'      => !empty($data_bd[0]["subtitle"]) ? $data_bd[0]["subtitle"] : '',
    'description'   => !empty($data_bd[0]["description"]) ? $data_bd[0]["description"] : '',
    'text_link'     => !empty($data_bd[0]["text_link"]) ? $data_bd[0]["text_link"] : '',
    'url_link'      => !empty($data_bd[0]["url_link"]) ? $data_bd[0]["url_link"] : '',
    'url_img'       => !empty($data_bd[0]["url_img"]) ? $data_bd[0]["url_img"] : '',
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

<?php $url_action = plugins_url('d1_plugin/templates/home/modulos_ajax.php', 'd1_plugin'); ?>

<body class="animsition">
    <form id="modulos_fields" action="<?php echo $url_action; ?>">
        <div class="container">
            <div class="row">
                <div class="col form-style-5" id='secao1_content1' style="padding-bottom:0px!important">
                    <input type="hidden" name="img_default" id="img_default" value="<?php echo get_template_directory_uri() . "/images/img_default.jpg";?> ">
                    <input type="hidden" name="admin_url" id="admin_url" value="<?php echo admin_url(); ?>">
                    <input type="hidden" name="url_location" id="url_location" value="<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>">
                    <input type="hidden" name="path_wp" id="path_wp" value="<?php echo ABSPATH; ?> ">
                    <input type="hidden" name="json_delete_items" id="json_delete_items" value="">
                    <input type="hidden" name="id_modulo_principal" id="id_modulo_principal" value="<?php echo $data['id']; ?>">
                    <input type="hidden" name="id_pai" value="<?php echo $data['id']; ?>">
                    <label>Descrição:</label><input type="text" name="main_title" value="<?php echo $data['title']; ?>" required>
                    
                    <div name='items_content'>
                        <div class="row">
                        <?php foreach ($itens as $key => &$item) :
                            
                        ?>
                        <div class="col form-style-5 middle">
                        <fieldset>
                        <legend><span class="number">1</span>Itens</legend>
                            <div name='item' id_item="<?php echo $item['id']; ?>">
                                <input type="hidden" name="id[]" value="<?php echo $item['id']; ?>">
                                <input type="hidden" name="title[]" value="<?php echo $item['title']; ?>">
                                <input type="hidden" name="id_modulo[]" value="<?php echo $item['id_modulo']; ?>" >
                                <label>Titulo:</label><input type="text" name="subtitle[]" value="<?php echo $item['subtitle']; ?>" >
                                <label for="description">Descrição:</label> <textarea name="description[]"><?php echo $item['description']; ?> </textarea>
                                <label>Texto Link:</label><input type="text" name="text_link[]" value="<?php echo $item['text_link']; ?>" >
                                <label>URL Link:</label><input type="text" name="url_link[]" value="<?php echo $item['url_link']; ?>" >
                                <label>Imagem/GIF:</label> <?php echo $this->d1_upload->get_image_options_common("url_img[]",$item['url_img'],$item['id']); ?>
                                <button type="button" id_item="<?php echo $item['id']; ?>" name="remove" id="remove" class="btn btn-danger btn_remove">X</button>
                            </div>
                        </fieldset>
                        </div>
                        <?php endforeach; ?>
                        </div>
                    </div>
                    <button type="button" name="add_item" id="add_item" class="btn btn-success btn_add_new_item">Adicionar Módulo</button><br><br>
                </div>
            </div>
        </div>
        <p class="submit">
            <input type="submit" id="cases_submit" class="button button-primary" value="Salvar Alterações" />
        </p>
    </form>

<script>
    $(document).ready(function() {
        //inserindo itens de links dinamicamente 
        $(document).on('click', '.btn_add_new_item', function(){
            //busca a div de itens do respectivo botão adicionar itens
            var div_item = $(this).siblings('div[name*=items_content]');
            var name_itens = div_item.find('input[name*=subtitle]');
            var i = parseInt(name_itens.length) + 1;
            var cont = 0;
            name_itens.each(function(index) {
                var title = $(this).val();
                if (title == "") {
                    cont++;
                }
            });

            if (cont > 0) {
                alert('Existe um item em branco. Por favor, insira dados para continuar criando.');
                return false;
            } else {
                var img_default = $('#img_default').val();
                var hash = btoa(Math.random());
                var id_modulo_principal = $("#id_modulo_principal").val();
                id_modulo_principal = (id_modulo_principal != '' || id_modulo_principal != undefined) ? id_modulo_principal : "";
                div_item.append('<div name="item">' +
                '<input type="hidden" name="id[]">' +
                '<input type="hidden" name="title[]">' +
                '<input type="hidden" name="id_modulo[]" value="' + id_modulo_principal + '">' +
                '<label>Titulo:</label><input type="text" name="subtitle[]" ' +
                '<label for="description">Descrição:</label> <textarea name="description[]"></textarea>' +
                '<label>Texto Link:</label><input type="text" name="text_link[]" ' +
                '<label>URL Link:</label><input type="text" name="url_link[]" ' +
                '<legend>Imagem/GIF</legend>' + 
                "<input type='hidden' id='" + hash + "' name=url_img[] value='' readonly='readonly'>" + 
                "<div id='"+hash+"_d1_img_preview' style='min-height: 100px;margin-top: 10px;'> <img id='"+hash+"_d1_img_preview' style='max-width:100%;' src='"+img_default +"'  /> </div>" +
                '<span> Após salvar o novo card, será liberado o upload de imagem </span><br>' + 
                '<button type="button" name="remove" id="remove" class="btn btn-danger btn_remove">X</button>' +
                '<br><br>' +
                '</div>'
                ).end();
            }
        });

        $(document).on('click', '.btn_remove', function() {
            var id_delete = $(this).attr("id_item");
            if (id_delete != undefined && id_delete != '') {
                if (confirm('Tem certeza que deseja apagar este item?')) {
                    var json_delete = $('#json_delete_items').val();
                    if (json_delete != "") {
                        json_delete = json_delete + "," + id_delete;
                    } else {
                        json_delete = id_delete;
                    }
                    $("#json_delete_items").val(json_delete);
                    $('div[id_item=' + id_delete + ']').remove();
                    $('#cases_submit').click();
                }
            } else {
                $(this).closest("div").remove();
            }
        });

        $('#cases_submit').click(function() {
            $('#url_location').val(window.location.href);
            var action = $('#modulos_fields').attr('action');
            $('#modulos_fields').attr('action', action + "?" + $('#modulos_fields').serialize());
        });

    });
</script>
</body>