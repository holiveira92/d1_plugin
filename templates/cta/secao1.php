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
    <?php $url_action = plugins_url('d1_plugin/templates/cta/cta_ajax.php','d1_plugin'); ?>
    <form id="cta_fields" action="<?php echo $url_action; ?>">
        <div class="form-style-5" id='secao_content'>
            <div class="row">
                <div class="col">
                    <button type="button" name="add_cta" id="add_group" class="btn btn-success">Adicionar CTA</button>
                </div>
            </div>
            <input type="hidden" name="json_delete" id="json_delete" value="">
            <input type="hidden" name="url_location" id="url_location" value="">
            <input type="hidden" name="path_wp" id="path_wp" value="<?php echo ABSPATH; ?> ">
            <!----------------------------------------------------------------------- Seção 4 - Inicio Links ----------------------------------------------------------------------->
            <div class="row">
            <?php
            global $wpdb;
            $ctas = json_decode(json_encode($wpdb->get_results('SELECT * FROM ' . $wpdb->prefix . 'd1_call_to_action')), true);
            $cont_cta = 0;
            foreach ($ctas as $key => &$cta) :
                $cont_cta++;
                ?>

                <!-- ----------------------------------- Inicio de Bloco de Definição dos Grupos--------------------------------------------- -->
                <div class="col form-style-5 middle">
                <fieldset name="d1_cta" id_cta="<?php echo $cta['id']; ?>">
                    <legend><span class="number"><?php echo $cont_cta; ?></span>CTA <?php echo $cont_cta; ?> </legend>
                    <input type="hidden" name="id[]" value="<?php echo $cta['id']; ?>">
                    <label for="title">Título:</label> <textarea name="title[]"><?php echo $cta['title']; ?></textarea>
                    <label for="link">Link:</label> <textarea name="link[]"><?php echo $cta['link']; ?></textarea>
                    <select name="target[]">
                        <?php echo $cta['target']; 
                            $self = ($cta['target'] == '_self') ? 'selected' : '';
                            $blank = ($cta['target'] == '_blank') ? 'selected' : '';
                            $modal = ($cta['target'] == 'modal') ? 'selected' : '';
                        ?>
                        <option value="0"> Selecione </option>
                        <option value="_self" <?php echo $self; ?> > Self - Padrão Mesma Página </option>
                        <option value="_blank" <?php echo $blank; ?> > Blank - Nova Página </option>
                        <option value="modal" <?php echo $modal; ?> > Modal </option>
                    </select>
                    <button id="remove" type="button" name="remove_cta" id_cta="<?php echo $cta['id']; ?>" class="btn btn-danger btn_remove_group">Remover</button>
                </fieldset>
                </div>
            <?php endforeach; ?>
            </div>
            <!-- -------------------------------------------- Fim de Bloco de Definição dos Grupos --------------------------------------- -->
        </div>

        <input type="submit" id="cases_submit" class="d1-button" value="Salvar Alterações" style='margin-top: 20px;margin-bottom: 20px;float:right;' />
    </form>
    <!----------------------------------------------------------------------- Seção 4 - Fim Links ----------------------------------------------------------------------->


    <script>
        $(document).ready(function() {
            //inserindo grupos de cta dinamicamente 
            $('#add_group').click(function() {
                var i = parseInt($('fieldset[name*=d1_cta]').length) + 1;
                var cont = 0;
                $('fieldset[name*=d1_cta]').each(function(index) {
                    var title = $(this).find("[name*=title]").val();
                    if (title == ""){
                        cont++;
                    }
                });
                
                if (cont > 0) {
                    alert('Existe um item em branco. Por favor, insira dados para continuar criando');
                    return false;
                } else {
                    var hash = btoa(Math.random());
                    var hash_item = btoa(Math.random());
                    $('#secao_content').append('<div class="col form-style-5 middle">' + 
                    '<fieldset name="d1_cta" id_cta="">' + 
                    '<legend><span class="number">' + i + '</span>CTA</legend>' +
                    '<input type="hidden" name="id[]">' +
                    '<label for="title">Título:</label> <textarea name="title[]"></textarea>' +
                    '<label for="link">Link:</label> <textarea name="link[]"></textarea>' +
                    '<select name="target[]">' +
                        '<option value="0"> Selecione </option>' +
                        '<option value="_self"> Self - Padrão Mesma Página </option>' +
                        '<option value="_blank"> Blank - Nova Página </option>' +
                        '<option value="modal"> Modal </option>' +
                    '</select>'+
                    '<button id="remove" type="button" name="remove_cta" id_cta="" class="btn btn-danger btn_remove_group">Remover</button>' +
                    '</fieldset> </div>'
                    ).end();
                }
            });

            $(document).on('click', '.btn_remove_group', function() {
                var id_delete = $(this).attr("id_cta");
                if (id_delete != undefined && id_delete != '') {
                    if (confirm('Tem certeza que deseja apagar esta pergunta?')) {
                        var json_delete = $('#json_delete').val();
                        if (json_delete != "") {
                            json_delete = json_delete + "," + id_delete;
                        } else {
                            json_delete = id_delete;
                        }
                        $("#json_delete").val(json_delete);
                        $('fieldset[id_cta=' + id_delete + ']').remove();
                        $('#cases_submit').click();
                    }
                } else {
                    $(this).closest("fieldset").remove();
                }
            });

            $('#cases_submit').click(function() {
                $('#url_location').val(window.location.href);
                var action = $('#cta_fields').attr('action');
                $('#cta_fields').attr('action', action + "?" + $('#cta_fields').serialize());
            });

        });
    </script>
</body>