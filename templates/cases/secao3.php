<?php
global $wpdb;
$id_categoria       = !empty($_REQUEST["id_categoria"]) ? $_REQUEST["id_categoria"] : false;
$data_bd            = !empty($id_categoria) ? json_decode(json_encode($wpdb->get_results("SELECT * FROM " . $wpdb->prefix . "d1_cases_categorias WHERE id = $id_categoria")), true) : array();
$itens              = !empty($id_categoria) ? json_decode(json_encode($wpdb->get_results("SELECT * FROM " . $wpdb->prefix . "d1_cases_categorias WHERE id_categoria = $id_categoria")), true) : array();
$param              = array('path_wp' => ABSPATH, 'id_categoria' => $id_categoria, 'url_location' => "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
$query_string       = http_build_query($param);
$delete_url         = plugins_url('d1_plugin/templates/cases/categorias_delete.php?', 'd1_plugin') . $query_string;
$voltar_url         = "?page=d1_plugin_cases&tab=secao2&" . $query_string;
$data = array(
    'id'            => !empty($data_bd[0]["id"]) ? $data_bd[0]["id"] : '',
    'descricao'     => !empty($data_bd[0]["descricao"]) ? $data_bd[0]["descricao"] : '',
    'id_categoria'  => !empty($data_bd[0]["id_categoria"]) ? $data_bd[0]["id_categoria"] : '',
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

<?php $url_action = plugins_url('d1_plugin/templates/cases/categorias_ajax.php', 'd1_plugin'); ?>

<body class="animsition">
    <form id="cases_categorias_fields" action="<?php echo $url_action; ?>">
        <div class="container">
            <div class="row">
                <div class="col form-style-5" id='secao1_content1' style="padding-bottom:0px!important">
                    <input type="hidden" name="admin_url" id="admin_url" value="<?php echo admin_url(); ?>">
                    <input type="hidden" name="url_location" id="url_location" value="<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>">
                    <input type="hidden" name="path_wp" id="path_wp" value="<?php echo ABSPATH; ?> ">
                    <input type="hidden" name="json_delete_items" id="json_delete_items" value="">
                    <input type="hidden" name="id_categoria_principal" id="id_categoria_principal" value="<?php echo $data['id']; ?>">
                    <input type="hidden" name="id_pai" value="<?php echo $data['id']; ?>">
                    <input type="hidden" name="id_pai_categoria" value="<?php echo $data['id_categoria']; ?>">
                    <label>Descrição:</label><input type="text" name="descricao_pai" placeholder="Descrição" value="<?php echo $data['descricao']; ?>">
                    
                    <fieldset>
                    <div name='items_content'>
                    <legend><span class="number">1</span>Subcategorias</legend>
                        <?php foreach ($itens as $key => &$item) :
                            
                        ?>
                            <div name='item' id_item="<?php echo $item['id']; ?>">
                                <input type="hidden" name="id[]" value="<?php echo $item['id']; ?>">
                                <label>Descrição:</label><input type="text" name="descricao[]" placeholder="Descrição" value="<?php echo $item['descricao']; ?>" style='width:75%'>
                                <input type="hidden" name="id_categoria[]" value="<?php echo $item['id_categoria']; ?>" >
                                <button type="button" id_item="<?php echo $item['id']; ?>" name="remove" id="remove" class="btn btn-danger btn_remove">X</button>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <button type="button" name="add_item" id="add_item" class="btn btn-success btn_add_new_item">Adicionar Categoria</button>
                    </fieldset>
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
            var name_itens = div_item.find('input[name*=descricao]');
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
                var hash = btoa(Math.random());
                var id_categoria_principal = $("#id_categoria_principal").val();
                id_categoria_principal = (id_categoria_principal != '' || id_categoria_principal != undefined) ? id_categoria_principal : "";
                div_item.append('<div name="item">' +
                '<input type="hidden" name="id[]">' +
                '<label>Descrição:</label><input type="text" name="descricao[]" placeholder="Descrição" style="width:75%">' +
                '<input type="hidden" name="id_categoria[]" value="' + id_categoria_principal + '">' +
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
                }
            } else {
                $(this).closest("div").remove();
            }
        });

        $('#cases_submit').click(function() {
            $('#url_location').val(window.location.href);
            var action = $('#cases_categorias_fields').attr('action');
            $('#cases_categorias_fields').attr('action', action + "?" + $('#cases_categorias_fields').serialize());
        });

    });
</script>
</body>