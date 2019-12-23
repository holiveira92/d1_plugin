<?php
?>
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

    <script src="<?php echo plugins_url('d1_plugin/resources/js/bootstrap.min.js', 'd1_plugin'); ?>"></script>
    <script src="<?php echo plugins_url('d1_plugin/resources/js/jquery.min.js', 'd1_plugin'); ?>"></script>
</head>

<body>
    <?php $url_action = plugins_url('d1_plugin/templates/footer/footer_ajax.php','d1_plugin'); ?>
    <form id="footer_fields" action="<?php echo $url_action; ?>">

        <div class="form-style-5" id='secao_content'>
            <input type="hidden" name="json_delete<?php echo D1Plugin::$language; ?>" id="json_delete" value="">
            <input type="hidden" name="json_delete_items<?php echo D1Plugin::$language; ?>" id="json_delete_items" value="">
            <input type="hidden" name="url_location<?php echo D1Plugin::$language; ?>" id="url_location" value="">
            <input type="hidden" name="path_wp<?php echo D1Plugin::$language; ?>" id="path_wp" value="<?php echo ABSPATH; ?> ">
            <div class="alert alert-warning" role="alert">Número Máximo de Grupos Permitidos : 9 </div>
            <div class="row">
                <div class="col">
                    <legend>Grupos de Links</legend>
                </div>
                <div class="col">
                    <button type="button" name="add_group<?php echo D1Plugin::$language; ?>" id="add_group" class="btn btn-success">Adicionar Grupo</button>
                </div>
            </div>
            <!----------------------------------------------------------------------- Seção 4 - Inicio Links ----------------------------------------------------------------------->
            <?php
            global $wpdb;
            $grupos = json_decode(json_encode($wpdb->get_results('SELECT * FROM ' . $wpdb->prefix . 'd1_footer_links WHERE group_id IS NULL OR group_id = "" ')), true);
            $cont_grupos = 0;
            foreach ($grupos as $key => &$grupo) :
                $itens = json_decode(json_encode($wpdb->get_results('SELECT * FROM ' . $wpdb->prefix . 'd1_footer_links WHERE group_id = ' . $grupo['id'] . ' ORDER BY group_id DESC')), true);
                $cont_grupos++;
                ?>

                <!-- ----------------------------------- Inicio de Bloco de Definição dos Grupos--------------------------------------------- -->
                <fieldset name="links<?php echo D1Plugin::$language; ?>" id_grupo="<?php echo $grupo['id']; ?>">

                    <legend><span class="number"><?php echo $cont_grupos; ?></span>Grupo <?php echo $cont_grupos; ?> </legend>
                    <input type="hidden" name="id[]<?php echo D1Plugin::$language; ?>" value="<?php echo $grupo['id']; ?>">
                    <input type="hidden" name="group_id[]<?php echo D1Plugin::$language; ?>" value="">
                    <input type="text" name="name[]<?php echo D1Plugin::$language; ?>" value="<?php echo $grupo['name']; ?>"><br><br>
                    <input type="hidden" name="link[]<?php echo D1Plugin::$language; ?>" value="">
                    <label>Nome e Link</label>
                    <div name='items_content'>

                        <?php foreach ($itens as $key => &$item) :
                            //$parent_arrow = (!empty($item['parent_id'])) ? "<span> &nbsp &nbsp &nbsp &rarr; </span>" : "";
                            $parent_arrow = "";
                        ?>
                            <div name='item' id_item="<?php echo $item['id']; ?>">
                                <?php echo $parent_arrow ; ?>
                                <input type="hidden" name="id[]<?php echo D1Plugin::$language; ?>" value="<?php echo $item['id']; ?>">
                                <input type="hidden" name="group_id[]<?php echo D1Plugin::$language; ?>" value="<?php echo $grupo['id']; ?>">
                                <input type="hidden" name="parent_id[]<?php echo D1Plugin::$language; ?>" value="<?php echo $item['parent_id']; ?>">
                                <input type="text" name="name[]<?php echo D1Plugin::$language; ?>" value="<?php echo $item['name']; ?>" style='width:45%;'> <span style='width:20px;'> e </span>
                                <input type="text" name="link[]<?php echo D1Plugin::$language; ?>" value="<?php echo $item['link']; ?>" style='width:43%;'>
                                <button type="button" id_item="<?php echo $item['id']; ?>" name="remove<?php echo D1Plugin::$language; ?>" id="remove" class="btn btn-danger btn_remove">X</button>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    
                    <!-- <button type="button" id_grupo="" name="add_separador<?php echo D1Plugin::$language; ?>" id="add_item" class="btn btn-success btn_add_new_item">Adicionar Separador</button> -->
                    <button type="button" id_grupo="<?php echo $grupo['id']; ?>" name="add_item<?php echo D1Plugin::$language; ?>" id="add_item" class="btn btn-success btn_add_new_item">Adicionar Link</button>
                    <button type="button" name="remove_group<?php echo D1Plugin::$language; ?>" id_grupo="<?php echo $grupo['id']; ?>" class="btn btn-danger btn_remove_group">Remover Grupo</button>
                </fieldset>
            <?php endforeach; ?>
            <!-- -------------------------------------------- Fim de Bloco de Definição dos Grupos --------------------------------------- -->
        </div>

        <input type="submit" id="cases_submit" class="d1-button" value="Salvar Alterações" style='margin-top: 20px;margin-bottom: 20px;float:right;' />
    </form>
    <!----------------------------------------------------------------------- Seção 4 - Fim Links ----------------------------------------------------------------------->


    <script>
        $(document).ready(function() {
            //inserindo grupos de links dinamicamente 
            $('#add_group').click(function() {
                var i = parseInt($('fieldset[name*=links]').length) + 1;
                var cont = 0;
                $('fieldset[name*=links]').each(function(index) {
                    var title = $(this).find("[name*=grupo_title]").val();
                    if (title == "") {
                        cont++;
                    }
                });

                if (cont > 0) {
                    alert('Existe um item em branco. Por favor, insira dados para continuar criando');
                    return false;
                } else if (cont >= 9) {
                    alert('Limite de grupos atingido!');
                    return false;
                } else {
                    var hash = btoa(Math.random());
                    var hash_item = btoa(Math.random());
                    $('#secao_content').append('<fieldset name="links' + i + '<?php echo D1Plugin::$language; ?>" id_grupo="" id_grupo_temp="' + hash + '">' +
                        '<div class="form-style-5"><legend><span class="number">' + i + '</span>Grupo ' + i + ' </legend>' +
                        '<input type="hidden" name="id[]<?php echo D1Plugin::$language; ?>" value="' + hash + '">' +
                        '<input type="hidden" name="group_id[]<?php echo D1Plugin::$language; ?>">' +
                        '<input type="hidden" name="parent_id[]<?php echo D1Plugin::$language; ?>" value="' + hash_item + '">' +
                        '<input type="text" name="name[]<?php echo D1Plugin::$language; ?>"><br><br>' +
                        '<input type="hidden" name="link[]<?php echo D1Plugin::$language; ?>">' +
                        '<label>Nome -> Link</label>' +
                        '<div name="items_content<?php echo D1Plugin::$language; ?>">' +
                        '</div>' +
                        '<button type="button" id_grupo="" name="add_item<?php echo D1Plugin::$language; ?>" id="add_item" class="btn btn-success btn_add_new_item">+ Link</button>' +
                        '<button type="button" id_grupo="" name="remove_group<?php echo D1Plugin::$language; ?>" id="remove_group" class="btn btn-danger btn_remove_group">Remover Grupo</button>' +
                        '</fieldset>'
                    ).end();
                }
            });

            //inserindo itens de links dinamicamente 
            $(document).on('click', '.btn_add_new_item', function() {
                //busca a div de itens do respectivo botão adicionar itens
                var action = $(this).attr('name');
                var div_item = $(this).siblings('div[name*=items_content]');
                var name_itens = div_item.find('input[name*=name]');
                var id_item = $(this).siblings('div[name*=item]').find('hidden[name*=parent_id]:last').attr('id_item');
                var id_grupo_pai = $(this).closest("fieldset").attr('id_grupo');
                var id_grupo_temp = $(this).closest("fieldset").attr('id_grupo_temp');
                id_grupo_pai = (id_grupo_pai != undefined && id_grupo_pai != '') ? id_grupo_pai : id_grupo_temp;
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
                    //var separator = (action == "add_item") ? "" : "<span>&nbsp &nbsp &nbsp &rarr; </span>";
                    var separator = "";
                    div_item.append('<div name="item<?php echo D1Plugin::$language; ?>">' + separator +
                        '<input type="hidden" name="id[]<?php echo D1Plugin::$language; ?>">' +
                        '<input type="hidden" name="group_id[]<?php echo D1Plugin::$language; ?>" value="' + id_grupo_pai + '">' +
                        '<input type="hidden" name="parent_id[]<?php echo D1Plugin::$language; ?>" value="' + id_item + '">' +
                        '<input type="text"name="name[]<?php echo D1Plugin::$language; ?>" style="width:45%;"> <span style="width:20px;"> e </span> ' +
                        '<input type="text" name="link[]<?php echo D1Plugin::$language; ?>" style="width:43%;">' +
                        '<button type="button" id_item="" name="remove<?php echo D1Plugin::$language; ?>" id="remove" class="btn btn-danger btn_remove">X</button>' +
                        '<br><br>' +
                        '</div>'
                    ).end();
                }
            });

            $(document).on('click', '.btn_remove_group', function() {
                var id_delete = $(this).attr("id_grupo");
                if (id_delete != undefined && id_delete != '') {
                    if (confirm('Tem certeza que deseja apagar este grupo?')) {
                        var json_delete = $('#json_delete').val();
                        if (json_delete != "") {
                            json_delete = json_delete + "," + id_delete;
                        } else {
                            json_delete = id_delete;
                        }
                        $("#json_delete").val(json_delete);
                        $('fieldset[id_grupo=' + id_delete + ']').remove();
                    }
                } else {
                    $(this).closest("fieldset").remove();
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
                var action = $('#cases_fields').attr('action');
                $('#cases_fields').attr('action', action + "?" + $('#cases_fields').serialize());
            });

        });
    </script>
</body>