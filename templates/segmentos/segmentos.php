<?php
global $wpdb;require_once dirname_safe(__FILE__,3) . 'includes/base/d1_constants.php';
$id_seg            = !empty($_REQUEST["id_seg"]) ? $_REQUEST["id_seg"] : false;
$data_bd            = !empty($id_seg) ? json_decode(json_encode($wpdb->get_results("SELECT * FROM " . $wpdb->prefix . D1_LANG . "d1_segmentos WHERE id = '$id_seg'")), true) : array();
$cases_list         = json_decode(json_encode($wpdb->get_results("SELECT * FROM " . $wpdb->prefix . D1_LANG . "d1_cases")), true);
$param              = array('path_wp' => ABSPATH, 'id_seg' => $id_seg, 'url_location' => "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
$query_string       = http_build_query($param);
$delete_url         = plugins_url('d1_plugin/templates/segmentos/segmentos_delete.php?', 'd1_plugin') . $query_string;
$voltar_url         = "?page=d1_plugin_segmentos&tab=secao1&" . $query_string;
$url_action         = plugins_url('d1_plugin/templates/segmentos/segmentos_ajax.php', 'd1_plugin'); 
$data = array(
    'id'            => !empty($data_bd[0]["id"]) ? $data_bd[0]["id"] : '',
    'main_title'    => !empty($data_bd[0]["main_title"]) ? $data_bd[0]["main_title"] : '',
    'title'         => !empty($data_bd[0]["title"]) ? $data_bd[0]["title"] : '',
    'description'   => !empty($data_bd[0]["description"]) ? $data_bd[0]["description"] : '',
    'url_img_bg'    => !empty($data_bd[0]["url_img_bg"]) ? $data_bd[0]["url_img_bg"] : '',
    'challenge_title'=> !empty($data_bd[0]["challenge_title"]) ? $data_bd[0]["challenge_title"] : '',
    'img_customer1' => !empty($data_bd[0]["img_customer1"]) ? $data_bd[0]["img_customer1"] : '',
    'img_customer2' => !empty($data_bd[0]["img_customer2"]) ? $data_bd[0]["img_customer2"] : '',
    'img_customer3' => !empty($data_bd[0]["img_customer3"]) ? $data_bd[0]["img_customer3"] : '',
    'customers_title' => !empty($data_bd[0]["customers_title"]) ? $data_bd[0]["customers_title"] : '',
);

$data_challenge = array(
    'challenge1' => !empty($data_bd[0]["challenge1"]) ? json_decode($data_bd[0]["challenge1"],true) : array(),
    'challenge2' => !empty($data_bd[0]["challenge2"]) ? json_decode($data_bd[0]["challenge2"],true) : array(),
    'challenge3' => !empty($data_bd[0]["challenge3"]) ? json_decode($data_bd[0]["challenge3"],true) : array()
);

$challenge[1] = array(
    'title'         => !empty($data_challenge['challenge1']['title']) ? $data_challenge['challenge1']['title'] : "",
    'description'   => !empty($data_challenge['challenge1']['description']) ? $data_challenge['challenge1']['description'] : "",
);

$challenge[2] = array(
    'title'         => !empty($data_challenge['challenge2']['title']) ? $data_challenge['challenge2']['title'] : "",
    'description'   => !empty($data_challenge['challenge2']['description']) ? $data_challenge['challenge2']['description'] : "",
);

$challenge[3] = array(
    'title'         => !empty($data_challenge['challenge3']['title']) ? $data_challenge['challenge3']['title'] : "",
    'description'   => !empty($data_challenge['challenge3']['description']) ? $data_challenge['challenge3']['description'] : "",
);

$data_clientes = array(
    'img_customer1' => !empty($data_bd[0]["img_customer1"]) ? $data_bd[0]["img_customer1"] : "",
    'img_customer2' => !empty($data_bd[0]["img_customer2"]) ? $data_bd[0]["img_customer2"] : "",
    'img_customer3' => !empty($data_bd[0]["img_customer3"]) ? $data_bd[0]["img_customer3"] : ""
);

$cases_options                      = !empty($data_bd[0]["cases_options"]) ? json_decode($data_bd[0]["cases_options"], true) : array();
$cases_options = array(
    'cases_title' => !empty($cases_options['cases_title']) ? $cases_options['cases_title'] : '',
    'list_case1' => !empty($cases_options['list_case1']) ? $cases_options['list_case1'] : 0,
    'list_case2' => !empty($cases_options['list_case2']) ? $cases_options['list_case2'] : 0,
    'list_case3' => !empty($cases_options['list_case3']) ? $cases_options['list_case3'] : 0,
);

$id_segmento = !empty($data['id']) ? $data['id'] : 0;
?>

<head>
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
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>

<body class="animsition">
<a href="<?php echo $voltar_url . $query_string ;?>"><button type="button" class="button button-primary"><-- Voltar para Segmentos</button></a>
<p> Link Permanente: </p> <a style="margin-bottom:20px" href="<?php echo get_home_url();?>/segmentos/<?php echo sanitize_title($data['main_title']);?>/<?php echo $data['id'];?>" target="_blank"><?php echo get_home_url();?>/segmentos/<?php echo sanitize_title($data['main_title']);?>/<?php echo $data['id'];?></a>
    <form id="keypoints_fields" action="<?php echo $url_action; ?>">
        <!-- DADOS DO SEGMENTO -->
        <div class="container">
            <div class="row">
                <div class="col form-style-5" id='secao1_content1' style="padding-bottom:0px!important">
                    <input type="hidden" name="admin_url" id="admin_url" value="<?php echo admin_url(); ?>">
                    <input type="hidden" name="url_location" id="url_location" value="<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>">
                    <input type="hidden" name="path_wp" id="path_wp" value="<?php echo ABSPATH; ?> ">
                    <div class="row">
                    <div class="col form-style-5 middle">
                    <fieldset>
                        <legend><span class="number">1</span>Infos Segmento</legend>
                        <input type="hidden" name="id" id="id" value="<?php echo $data['id']; ?>">
                        <label for="main_title">Segmento:</label><input type="text" name="main_title" value="<?php echo $data['main_title']; ?>" placeholder="Titulo Principal" required>
                        <label for="title">Titulo:</label><input type="text" name="title" value="<?php echo $data['title']; ?>" placeholder="Titulo" required>
                        <label for="description">Descrição</label> <textarea name="description" placeholder="Descrição" rows='7'><?php echo $data['description']; ?></textarea>
                    </fieldset>
                    </div>
                    <div class="col form-style-5 middle">
                        <label for="title">Imagem Background:</label>
                        <?php echo $this->d1_upload->get_image_options_common("url_img_bg",$data['url_img_bg'],$data['id']); ?>
                    </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col form-style-5" id='secao1_content1' style="padding-bottom:0px!important">
                    <div class="row">
                    <div class="col form-style-5 middle">
                        <label for="challenge_title">Titulo:</label><input type="text" name="challenge_title" value="<?php echo $data["challenge_title"]; ?>" placeholder="Titulo Principal">
                    </div>
                    </div>
                    <div class="row">
                        <?php for($i=1;$i<=3;$i++): ?>
                        <div class="col form-style-5 middle">
                        <fieldset>
                            <legend><span class="number"><?php echo $i;?></span>Desafio <?php echo $i;?></legend>
                            <label for="challenge<?php echo $i;?>_title">Titulo:</label><input type="text" name="challenge<?php echo $i;?>_title" value="<?php echo $challenge[$i]["title"]; ?>" placeholder="Titulo">
                            <label for="challenge<?php echo $i;?>_description">Descrição</label> <textarea name="challenge<?php echo $i;?>_description" placeholder="Descrição" rows='7'><?php echo $challenge[$i]["description"]; ?></textarea>
                        </fieldset>
                        </div>
                        <?php endfor; ?>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col form-style-5" id='secao1_content1' style="padding-bottom:0px!important">
                    <div class="row">
                    <div class="col form-style-5 middle">
                        <label for="customers_title">Titulo Clientes:</label><input type="text" name="customers_title" value="<?php echo $data["customers_title"]; ?>" placeholder="Titulo Clientes">
                    </div>
                    </div>
                    <div class="row">
                        <?php for($i=1;$i<=3;$i++): ?>
                        <div class="col form-style-5 middle">
                        <fieldset>
                            <legend><span class="number"><?php echo $i;?></span>Cliente <?php echo $i;?></legend>
                            <label for="title">Imagem Logo:</label>
                            <?php echo $this->d1_upload->get_image_options_common("img_customer$i",$data_clientes["img_customer$i"]); ?>
                        </fieldset>
                        </div>
                        <?php endfor; ?>
                    </div>
                </div>
            </div>
            
        </div>

        <!-- INFOS DOS CASES -->
        <div class="container">
        <div class="row">
            <div class="col form-style-5 middle">
                <fieldset>
                    <legend><span class="number">2</span>Cases</legend>
                    <div class="row">
                    <div class="col-4 form-style-5 middle">
                                <!-- Início de Select para Card -->
                                <label for="list_case<?php echo $i;?>">Selecione os Cases -  Opção:</label> <select name="list_case1">
                                    <option value="0"> Selecione </option>
                                    <?php $id_selected = $cases_options["list_case1"];
                                    foreach ($cases_list as $key => &$value) :
                                        if ($value['id_card'] == $id_selected) $value['selected'] = 'selected';
                                        else $value['selected'] = '';
                                    ?>
                                    <option value="<?php echo $value['id_card']; ?>" <?php echo $value['selected']; ?>> <?php echo $value['title_card']; ?> </option>
                                    <?php endforeach; ?>
                                </select>
                                <!-- Fim de Select para Card -->
                    </div>
                    </div>
                </fieldset>
        </div></div></div>
    
    <!-- INFOS DOS KEY POINTS -->
    <div class="row">
                <div class="col form-style-5" id='secao1_content1' style="padding-bottom:0px!important">
                    <div class="row">
    <fieldset id='kps'>
        <legend><span class="number">3</span>Key Points</legend>
    <!-- DATA TABLE -->
    <div class="table-data__tool">
        <div class="table-data__tool-right">
            <?php   
                    $create_url = "?page=d1_plugin_segmentos&tab=keyp&";
                    $param = array('path_wp' => ABSPATH, 'id_keyp' => false, 'id_segmento' => $id_segmento,
                    'url_location' => "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
                    $query_string = http_build_query($param); 
            ?>
            <a href="<?php echo $create_url . $query_string ;?>"><button type="button" class="button button-primary">
                <i class="zmdi zmdi-plus"></i>Adicionar Key Point</button></a>
        </div>
    </div>
    <div class="table-responsive table-responsive-data2">
        <table class="table table-data2">
            <thead>
                <tr>
                    <th width='20%'>Título</th>
                    <th width='75%'>Descrição</th>
                    <th>Ações</th>
                </tr>
            </thead>

            <tbody>
                <?php 
                    global $wpdb;
                    $result = json_decode(json_encode($wpdb->get_results("SELECT * FROM " . $wpdb->prefix . D1_LANG . "d1_key_points WHERE page='segmentos' AND id_segmento=$id_segmento")),true);
                    $cont = 0;
                    $delete_url = plugins_url('d1_plugin/templates/segmentos/keyp_delete.php?','d1_plugin');
                    foreach($result as $key=>&$value): 
                        $cont++;
                        $create_edit_url = "?page=d1_plugin_segmentos&tab=keyp&";
                        $param = array('path_wp' => ABSPATH, 'id_keyp' => $value['id'], 'id_segmento' => $id_segmento, 
                        'url_location' => "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
                        $query_string = http_build_query($param);
                ?>
                <tr class="tr-shadow">
                    <input type="hidden" name="id_keyp" id="id_keyp" value="<?php echo $value['id'];?>">
                    <td><?php echo $value['title'];?></td>
                    <td class="desc"><?php echo $value['description'];?></td>
                    <td>
                        <div class="table-data-feature">
                            <a href="<?php echo $create_edit_url . $query_string;?>"><button type="button" class="item btn_edit" data-toggle="tooltip" data-placement="top" title="Edit" name="edit">
                                <i class="zmdi zmdi-edit"></i>
                            </button></a>
                            <a href="<?php echo $delete_url . $query_string;?>"><button type="button" class="item btn_delete" data-toggle="tooltip" data-placement="top" title="Delete" name="delete">
                                <i class="zmdi zmdi-delete"></i>
                            </button></a>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <!-- END DATA TABLE -->
    </fieldset>
    </div></div></div>

        <p class="submit">
            <input type="submit" id="keyp_submit" class="button button-primary" value="Salvar Alterações" />
        </p>
    </form>

<script>
    $(document).ready(function() {
        $('#keyp_submit').click(function() {
            $('#url_location').val(window.location.href);
            var action = $('#keypoints_fields').attr('action');
            $('#keypoints_fields').attr('action', action + "?" + $('#keypoints_fields').serialize());
        });

        //botão deletar
        $(document).on('click', '.btn_delete', function(){
            if(!confirm('Tem certeza que deseja apagar este Key Point?')){
                return false;
            }
        });

        var id_segmento = $('#id').val();
        if(id_segmento == undefined || id_segmento == ''){
            $('#kps').hide();
        }
        
    });
</script>
</body>