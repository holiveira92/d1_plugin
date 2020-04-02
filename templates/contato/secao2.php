<?php
?>
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

    <script src="<?php echo plugins_url('d1_plugin/resources/js/bootstrap.min.js', 'd1_plugin'); ?>"></script>
    <script src="<?php echo plugins_url('d1_plugin/resources/js/jquery.min.js', 'd1_plugin'); ?>"></script>
</head>

<body>
    <?php $url_action = plugins_url('d1_plugin/templates/contato/faq_ajax.php','d1_plugin'); ?>
    <form id="faq_fields" action="<?php echo $url_action; ?>">
        <div class="form-style-5" id='secao_content'>
            <div class="row">
                <div class="col">
                    <button type="button" name="add_faq" id="add_group" class="btn btn-success">Adicionar Pergunta</button>
                </div>
            </div>
            <input type="hidden" name="json_delete" id="json_delete" value="">
            <input type="hidden" name="url_location" id="url_location" value="">
            <input type="hidden" name="path_wp" id="path_wp" value="<?php echo ABSPATH; ?> ">
            <!----------------------------------------------------------------------- Seção 4 - Inicio Links ----------------------------------------------------------------------->
            <div class="row">
            <?php
            global $wpdb;
            $faqs = json_decode(json_encode($wpdb->get_results('SELECT * FROM ' . $wpdb->prefix . D1_LANG . 'd1_faq WHERE page = "contato" ')), true);
            $cont_faq = 0;
            foreach ($faqs as $key => &$faq) :
                $cont_faq++;
                ?>

                <!-- ----------------------------------- Inicio de Bloco de Definição dos Grupos--------------------------------------------- -->
                <div class="col form-style-5 middle">
                <fieldset name="d1_faqs" id_faq="<?php echo $faq['id']; ?>">
                    <legend><span class="number"><?php echo $cont_faq; ?></span>FAQ <?php echo $cont_faq; ?> </legend>
                    <input type="hidden" name="id[]" value="<?php echo $faq['id']; ?>">
                    <input type="hidden" name="page[]" value="contato">
                    <label for="pergunta">Pergunta:</label> <textarea name="question[]" rows="5"><?php echo $faq['question']; ?></textarea>
                    <label for="pergunta">Resposta:</label> <textarea name="answer[]" rows="5"><?php echo $faq['answer']; ?></textarea>
                    <button id="remove" type="button" name="remove_faq" id_faq="<?php echo $faq['id']; ?>" class="btn btn-danger btn_remove_group">Remover</button>
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
            //inserindo grupos de faqs dinamicamente 
            $('#add_group').click(function() {
                var i = parseInt($('fieldset[name*=d1_faqs]').length) + 1;
                var cont = 0;
                $('fieldset[name*=d1_faqs]').each(function(index) {
                    var title = $(this).find("[name*=question]").val();
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
                    '<fieldset name="d1_faqs" id_faq="">' + 
                    '<legend><span class="number">' + i + '  </span>FAQ ' + i + ' </legend>' +
                    '<input type="hidden" name="id[]">' +
                    '<input type="hidden" name="page[]" value="contato">' + 
                    '<label for="pergunta">Pergunta:</label> <textarea name="question[]" rows="5"></textarea>' +
                    '<label for="pergunta">Resposta:</label> <textarea name="answer[]" rows="5"></textarea>' +
                    '<button id="remove" type="button" name="remove_faq" id_faq="" class="btn btn-danger btn_remove_group">Remover</button>' +
                    '</fieldset> </div>'
                    ).end();
                }
            });

            $(document).on('click', '.btn_remove_group', function() {
                var id_delete = $(this).attr("id_faq");
                if (id_delete != undefined && id_delete != '') {
                    if (confirm('Tem certeza que deseja apagar esta pergunta?')) {
                        var json_delete = $('#json_delete').val();
                        if (json_delete != "") {
                            json_delete = json_delete + "," + id_delete;
                        } else {
                            json_delete = id_delete;
                        }
                        $("#json_delete").val(json_delete);
                        $('fieldset[id_faq=' + id_delete + ']').remove();
                        $('#cases_submit').click();
                    }
                } else {
                    $(this).closest("fieldset").remove();
                }
            });

            $('#cases_submit').click(function() {
                $('#url_location').val(window.location.href);
                var action = $('#faq_fields').attr('action');
                $('#faq_fields').attr('action', action + "?" + $('#faq_fields').serialize());
            });

        });
    </script>
</body>