<?php
?>
<link rel="stylesheet" href="<?php echo plugins_url('d1_plugin/resources/css/bootstrap.min.css','d1_plugin');?>" />
<script src="<?php echo plugins_url('d1_plugin/resources/js/bootstrap.min.js','d1_plugin');?>"></script>
<script src="<?php echo plugins_url('d1_plugin/resources/js/jquery.min.js','d1_plugin');?>"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style type="text/css"> .form-style-5{display: flex; flex-wrap: wrap; padding: 20px; background: #f4f7f8; border-radius: 8px; font-family: Georgia,"Times New Roman",Times,serif;}.form-style-5 fieldset{border:none;flex: 0 45%; padding: 0 2%;}.form-style-5 legend{font-size:1.4em;margin-bottom:10px}.form-style-5 label{display:block;margin-bottom:8px}.form-style-5 input[type="text"],.form-style-5 input[type="date"],.form-style-5 input[type="datetime"],.form-style-5 input[type="email"],.form-style-5 input[type="number"],.form-style-5 input[type="search"],.form-style-5 input[type="time"],.form-style-5 input[type="url"],.form-style-5 textarea,.form-style-5 select{font-family:Georgia,"Times New Roman",Times,serif;background:rgba(255,255,255,.1);border:none;border-radius:4px;font-size:16px;margin:0;outline:0;padding:7px;width:100%;box-sizing:border-box;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;background-color:#e8eeef;color:#8a97a0;-webkit-box-shadow:0 1px 0 rgba(0,0,0,.03) inset;box-shadow:0 1px 0 rgba(0,0,0,.03) inset;}.form-style-5 input[type="text"]:focus,.form-style-5 input[type="date"]:focus,.form-style-5 input[type="datetime"]:focus,.form-style-5 input[type="email"]:focus,.form-style-5 input[type="number"]:focus,.form-style-5 input[type="search"]:focus,.form-style-5 input[type="time"]:focus,.form-style-5 input[type="url"]:focus,.form-style-5 textarea:focus,.form-style-5 select:focus{background:#d2d9dd}.form-style-5 select{-webkit-appearance:menulist-button;height:35px}.form-style-5 .number{background:#1abc9c;color:#fff;height:30px;width:30px;display:inline-block;font-size:.8em;margin-right:4px;line-height:30px;text-align:center;text-shadow:0 1px 0 rgba(255,255,255,.2);border-radius:15px 15px 15px 0} .flex_inline{display:flex;align-items:center;margin-bottom:25px;} </style>
<?php $url_action = plugins_url('d1_plugin/templates/cases/footer_ajax.php','d1_plugin'); ?>
<form id="footer_fields" action="<?php echo $url_action; ?>">

<div class="form-style-5" id='secao_content'>
<input type="hidden" name="json_delete" id="json_delete" value="">
<input type="hidden" name="json_delete_items" id="json_delete_items" value="">
<input type="hidden" name="url_location" id="url_location" value="">
<input type="hidden" name="path_wp" id="path_wp" value="<?php echo ABSPATH;?> ">
<div class="alert alert-warning" role="alert"> O máximo de grupos de links permitidos será nove! </div>
<legend>Grupos de Links</legend>

<!----------------------------------------------------------------------- Seção 4 - Inicio Links ----------------------------------------------------------------------->
<?php 
global $wpdb;
$grupos = json_decode(json_encode($wpdb->get_results('SELECT * FROM ' . $wpdb->prefix . 'd1_footer_links WHERE group_id IS NULL')),true);
$cont_grupos = 0;
foreach($grupos as $key=>&$grupo): 
    $itens = json_decode(json_encode($wpdb->get_results('SELECT * FROM ' . $wpdb->prefix . 'd1_footer_links WHERE group_id = ' . $grupo['id'])),true);
    $cont_grupos++;
    
?>

<!-- ----------------------------------- Inicio de Bloco de Definição dos Grupos--------------------------------------------- -->
<fieldset name="grupo_links" id_grupo="<?php echo $grupo['id'];?>">

<legend><span class="number"><?php echo $cont_grupos;?></span>Grupo <?php echo $cont_grupos;?> </legend>
<input type="text" name="grupo_title[]" value="<?php echo $grupo['name'];?>" placeholder="Titulo Grupo"><br><br>
<label for="grupo_title[]">Nome -> Link</label>
<div name='items_content'>

    <?php foreach($itens as $key=>&$item):  
        
    ?>
<div name='item' id_item="<?php echo $item['id'];?>">
<input type="text"name="grupo_nome[]" value="<?php echo $item['name'];?>" placeholder="Nome" style='width:45%;'> <span style='width:20px;'> -> </span> 
<input type="text" name="grupo_link[]" value="<?php echo $item['link'];?>" placeholder="Link" style='width:43%;'>
<button type="button" id_item="<?php echo $item['id'];?>" name="remove" id="remove" class="btn btn-danger btn_remove">X</button>
<br><br>
</div>
    <?php endforeach; ?>
</div>

<button type="button" id_grupo="<?php echo $grupo['id'];?>" name="add_item" id="add_item" class="btn btn-success btn_add_new_item">+ Link</button>
<button type="button" name="remove_group" id_grupo="<?php echo $grupo['id'];?>" class="btn btn-danger btn_remove_group">Remover Grupo</button>
</fieldset>
<?php endforeach; ?>
<!-- -------------------------------------------- Fim de Bloco de Definição dos Grupos --------------------------------------- -->

</div>
<button type="button" name="add_group" id="add_group" class="btn btn-success">Add Grupo</button>
<input type="submit" id="cases_submit" class="btn btn-info" value="Salvar Alterações" style='margin-top: 20px;margin-bottom: 20px;float:right;'/>
</form>
<!----------------------------------------------------------------------- Seção 4 - Fim Links ----------------------------------------------------------------------->


<script>
$(document).ready(function(){
    //inserindo grupos de links dinamicamente 
	$('#add_group').click(function(){
        var i = parseInt($('fieldset[name*=grupo_links]').length) + 1;
        var cont = 0;
        $('fieldset[name*=grupo_links]').each(function(index){
            var title = $(this).find("[name*=grupo_title]").val();
            if(title == ""){
                cont++;
            }
        });
    
       if(cont > 0){
           alert('Existe um item em branco. Por favor, insira dados para continuar criando');
           return false;
       }else if(cont >= 9){
           alert('Limite de grupos atingido!');
           return false;
       }else{
            var hash = btoa(Math.random());
            $('#secao_content').append('<fieldset name="grupo_links'+i+'" id_grupo="">'
                + '<legend><span class="number">'+i+'</span>Grupo '+i+' </legend>'
                + '<input type="text" name="grupo_title[]" placeholder="Titulo Grupo"><br><br>'
                + '<label for="grupo_title[]">Nome -> Link</label>'
                + '<div name="items_content">'
                + '<input type="text"name="grupo_nome[]" placeholder="Nome" style="width:45%;"> <span style="width:20px;"> -> </span> '
                + '<input type="text" name="grupo_link[]" placeholder="Link" style="width:43%;">'
                + '<button type="button" id_item="" name="remove" id="remove_'+hash+'"  class="btn btn-danger btn_remove">X</button>'
                + '</div>'
                + '<button type="button" id_grupo="" name="add_item" id="add_item" class="btn btn-success btn_add_new_item">+ Link</button>'
                + '<button type="button" id_grupo="" name="remove_group" id="remove_group" class="btn btn-danger btn_remove_group">Remover Grupo</button>'
                + '<br><br>'
                + '</fieldset>'
                ).end();
       }
	});
	
    //inserindo itens de links dinamicamente 
    $(document).on('click', '.btn_add_new_item', function(){
        //busca a div de itens do respectivo botão adicionar itens
        var div_item = $(this).siblings('div[name*=items_content]');
        var grupo_nome_itens = div_item.find('input[name*=grupo_nome]');
        var i = parseInt(grupo_nome_itens.length) + 1;
        var cont = 0;
        
        grupo_nome_itens.each(function(index){
            var title = $(this).val();
            if(title == ""){
                cont++;
            }
        });
    
       if(cont > 0){
           alert('Existe um item em branco. Por favor, insira dados para continuar criando.');
           return false;
       }else{
            var hash = btoa(i);
            div_item.append('<div name="item">'
            + '<input type="text"name="grupo_nome[]" placeholder="Nome" style="width:45%;"> <span style="width:20px;"> -> </span> '
            + '<input type="text" name="grupo_link[]" placeholder="Link" style="width:43%;">'
            + '<button type="button" id_item="" name="remove" id="remove" class="btn btn-danger btn_remove">X</button>'
            + '<br><br>'
            + '</div>'
                ).end();
       }
	});

	$(document).on('click', '.btn_remove_group', function(){
        var id_delete = $(this).attr("id_grupo"); 
        if(id_delete != undefined && id_delete != ''){
            if (confirm('Tem certeza que deseja apagar este grupo?')){
                var json_delete = $('#json_delete').val();
                if(json_delete != ""){
                    json_delete = json_delete + "," + id_delete;
                }else{
                    json_delete = id_delete;
                }
                $("#json_delete").val(json_delete);
                $('fieldset[id_grupo='+id_delete+']').remove();
            }
        }else{
            $(this).closest("fieldset").remove(); 
        }
    });

    $(document).on('click', '.btn_remove', function(){
        var id_delete = $(this).attr("id_item"); 
        if(id_delete != undefined && id_delete != ''){
            if (confirm('Tem certeza que deseja apagar este item?')){
                var json_delete = $('#json_delete_items').val();
                if(json_delete != ""){
                    json_delete = json_delete + "," + id_delete;
                }else{
                    json_delete = id_delete;
                }
                $("#json_delete_items").val(json_delete);
                $('fieldset[id_grupo='+id_delete+']').remove();
            }
        }else{
            $(this).closest("div").remove(); 
        }
    });
    
    
    $('#cases_submit').click(function(){
        $('#url_location').val( window.location.href);
        var action = $('#cases_fields').attr('action');
        $('#cases_fields').attr('action',action + "?" + $('#cases_fields').serialize());
    });
    
});
</script>