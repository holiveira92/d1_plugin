<?php
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style type="text/css">.form-style-5{width:97%;padding:10px 20px;background:#f4f7f8;padding:20px;background:#f4f7f8;border-radius:8px;font-family:Georgia,"Times New Roman",Times,serif}.form-style-5 fieldset{border:none}.form-style-5 legend{font-size:1.4em;margin-bottom:10px}.form-style-5 label{display:block;margin-bottom:8px}.form-style-5 input[type="text"],.form-style-5 input[type="date"],.form-style-5 input[type="datetime"],.form-style-5 input[type="email"],.form-style-5 input[type="number"],.form-style-5 input[type="search"],.form-style-5 input[type="time"],.form-style-5 input[type="url"],.form-style-5 textarea,.form-style-5 select{font-family:Georgia,"Times New Roman",Times,serif;background:rgba(255,255,255,.1);border:none;border-radius:4px;font-size:16px;margin:0;outline:0;padding:7px;width:100%;box-sizing:border-box;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;background-color:#e8eeef;color:#8a97a0;-webkit-box-shadow:0 1px 0 rgba(0,0,0,.03) inset;box-shadow:0 1px 0 rgba(0,0,0,.03) inset;margin-bottom:30px}.form-style-5 input[type="text"]:focus,.form-style-5 input[type="date"]:focus,.form-style-5 input[type="datetime"]:focus,.form-style-5 input[type="email"]:focus,.form-style-5 input[type="number"]:focus,.form-style-5 input[type="search"]:focus,.form-style-5 input[type="time"]:focus,.form-style-5 input[type="url"]:focus,.form-style-5 textarea:focus,.form-style-5 select:focus{background:#d2d9dd}.form-style-5 select{-webkit-appearance:menulist-button;height:35px}.form-style-5 .number{display:inline-block;background:#1abc9c;color:#fff;height:30px;width:30px;display:inline-block;font-size:.8em;margin-right:4px;line-height:30px;text-align:center;text-shadow:0 1px 0 rgba(255,255,255,.2);border-radius:15px 15px 15px 0}.collapsible{background-color:#777;color:white;cursor:pointer;padding:18px;width:100%;border:none;text-align:left;outline:none;font-size:15px}.active,.collapsible:hover{background-color:#555}.content{padding:0 18px;display:none;overflow:hidden;background-color:#f1f1f1}</style>

<?php $url_action = plugins_url('d1_plugin/templates/cases/cases_ajax.php','d1_plugin'); ?>
<form id="cases_fields" action="<?php echo $url_action; ?>">
<div class="form-style-5">

<div id='secao1_content1' class="content table-responsive" style='display:block !important;'>
<input type="hidden" name="json_delete" id="json_delete" value="">
<input type="hidden" name="url_location" id="url_location" value="">
<input type="hidden" name="path_wp" id="path_wp" value="<?php echo ABSPATH;?> ">
<input type="hidden" name="img_default" id="img_default" value="<?php echo get_template_directory_uri() . "/images/img_default.jpg";?> ">


<?php 
global $wpdb;
$result = json_decode(json_encode($wpdb->get_results('SELECT * FROM ' . $wpdb->prefix . 'd1_cases')),true);
$cont = 0;
foreach($result as $key=>$value): 
    $cont++;
?>
<fieldset id="card_row<?php echo $cont;?>" style='display: inline;margin-right:4%;width:29%;'>
<input type="hidden" name="id_card[]" value="<?php echo $value['id_card'];?>">
<legend><span class="number"><?php echo $cont;?></span>Card</legend>
<label>Título:</label><input type="text" name="title_card[]" placeholder="Titulo do Card " value="<?php echo $value['title_card'];?>">
<label>Objetivo:</label><input type="text" name="subtitle_card[]" placeholder="SubTitulo do Card" value="<?php echo $value['subtitle_card'];?>">
<label>Número Impacto:</label><input type="text" name="text_footer_card[]" placeholder="Texto Card Footer" value="<?php echo $value['text_footer_card'];?>">
<label>Descrição:</label><input type="text" name="subtext_footer_card[]" placeholder="SubTexto Card Footer" value="<?php echo $value['subtext_footer_card'];?>">
<label>Link:</label><input type="text" name="card_link[]" placeholder="Link" value="<?php echo $value['card_link'];?>">
<legend>Imagem de Fundo</legend><?php echo $this->d1_upload->get_image_options_cases("img_bg_url[]",$value['id_card']); ?>
<button type="button" name="remove" id="<?php echo $cont;?>" class="btn btn-danger btn_remove">Remover Item</button>
</fieldset>
<?php endforeach; ?>
</div>
<br><br>

<div id="dinamic_buttons">
<button type="button" name="add" id="add" class="btn btn-success">Adicionar Novo Item</button>
<input type="submit" id="cases_submit" class="btn btn-info" value="Salvar Alterações"/>
</div>

</div>
</form>
<script>var coll=document.getElementsByClassName("collapsible");var i;for(i=0;i<coll.length;i++){coll[i].addEventListener("click",function(){this.classList.toggle("active");var content=this.nextElementSibling;if(content.style.display==="block"){content.style.display="none"}else{content.style.display="block"}})}</script>
<script>
$(document).ready(function(){
    //inserindo cards dinamicamente 
	$('#add').click(function(){
        var i=parseInt($('fieldset[id*=card_row]').length) + 1;
        var cont = 0;
        $('fieldset[id*=card_row]').each(function(index){
            var title = $(this).find("[name*=title_card]").val();
            if(title == ""){
                cont++;
            }
        });
    
       if(cont > 0){
           alert('Existe um card em branco. Por favor, insira dados para continuar criando');
           return false;
       }else{
            var hash = btoa(i);
            var img_default = $('#img_default').val();
            $('#secao1_content1').append('<fieldset id="card_row'+i+'" style="display:inline;margin-right:4%;width:29%;"> <input type="hidden" name="id_card[]" value="">'
                   + '<legend><span class="number">'+i+'</span>Card</legend>'
                   + '<label>Título:</label><input type="text" name="title_card[]" placeholder="Titulo do Card ">'
                   + '<label>Objetivo:</label><input type="text" name="subtitle_card[]" placeholder="SubTitulo do Card">'
                   + '<label>Número Impacto:</label><input type="text" name="text_footer_card[]" placeholder="Texto Card Footer">'
                   + '<label>Descrição:</label><input type="text" name="subtext_footer_card[]" placeholder="SubTexto Card Footer">'
				   + '<label>Link:</label><input type="text" name="card_link[]" placeholder="Link">'
                   + '<legend>Imagem de Fundo</legend>'

                   + "<input type='hidden' id='" + hash + "' name=img_bg_url[] value='' readonly='readonly'>"
                   + "<div id='"+hash+"_d1_img_preview' style='min-height: 100px;margin-top: 10px;'> <img id='"+hash+"_d1_img_preview' style='max-width:100%;' src='"+img_default +"'  /> </div>"
                   + "<input dest='"+hash+"' name='"+hash+"_d1_upload_btn' type='button' class='button' value='Upload Imagem'/>"

                   + '<button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">Remover Item</button>');
       }
	});
	
	$(document).on('click', '.btn_remove', function(){
        var button_id = $(this).attr("id"); 
        var id_delete = $('fieldset[id=card_row'+button_id+']').find("[name*=id_card]").val();
        if(id_delete != undefined && id_delete != ''){
            if (confirm('Tem certeza que deseja apagar este card?')){
                var json_delete = $('#json_delete').val();
                if(json_delete != ""){
                    json_delete = json_delete + "," + id_delete;
                }else{
                    json_delete = id_delete;
                }
                $("#json_delete").val(json_delete);
                $('#card_row'+button_id).remove();
            }else{
                // Do nothing!
            }
        }else{
            $('#card_row'+button_id).remove();
        }
        
    });
    
    $('#cases_submit').click(function(){
        /*
        var json_delete = $('#json_delete').val();
        if(json_delete == "" || json_delete == undefined){
            json_delete = false;
        }
        $.ajax({
			url:"cases_ajax.php",
			method:"POST",
			data:$('#cases_fields').serialize(),
            success:function(data){
                alert(data);
                location.reload();
			}
        });
        */
        $('#url_location').val( window.location.href);
        var action = $('#cases_fields').attr('action');
        $('#cases_fields').attr('action',action + "?" + $('#cases_fields').serialize());
	});

});
</script>