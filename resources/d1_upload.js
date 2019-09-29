jQuery(document).ready(function($) {
    //ao clicar em qualquer botão de upload, abre a tela de gerenciamento de midia do wordpress
    $('[name*=_d1_upload_btn').click(function(){
        var destination_field = $(this).attr('dest');
        $('#destination_field').val(destination_field);
        tb_show('Upload Image', 'media-upload.php?referer=d1_upload_settings&type=image&TB_iframe=true&post_id=0', false);
        return false;
    });

    //ao fazer o upload e selecionar a imagem desejada, fecha modal e grava url da imagem
    window.send_to_editor = function(html){
        var image_url = $(html).attr('src');
        var dest = $('#destination_field').val();
        $("input[id=" + dest + "]").val(image_url);
        tb_remove();
        $('#destination_field').val('');
        $("input[id=" + dest + "_d1_img_preview]").attr('src',image_url);
        $('#submit').trigger('click');
    }
});