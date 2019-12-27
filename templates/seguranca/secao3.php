<!DOCTYPE html>
<head>
    <!-- Fontfaces CSS--><?php require_once dirname_safe(__FILE__,3) . 'includes/base/d1_constants.php'; ?>
    <link href="<?php echo plugins_url('d1_plugin/resources/css/font-face.css','d1_plugin');?>" rel="stylesheet" media="all">
    <link href="<?php echo plugins_url('d1_plugin/resources/vendor/font-awesome-4.7/css/font-awesome.min.css','d1_plugin');?>" rel="stylesheet" media="all">
    <link href="<?php echo plugins_url('d1_plugin/resources/vendor/font-awesome-5/css/fontawesome-all.min.css','d1_plugin');?>" rel="stylesheet" media="all">
    <link href="<?php echo plugins_url('d1_plugin/resources/vendor/mdi-font/css/material-design-iconic-font.min.css','d1_plugin');?>" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="<?php echo plugins_url('d1_plugin/resources/vendor/bootstrap-4.1/bootstrap.min.css','d1_plugin');?>" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="<?php echo plugins_url('d1_plugin/resources/vendor/animsition/animsition.min.css','d1_plugin');?>" rel="stylesheet" media="all">
    <link href="<?php echo plugins_url('d1_plugin/resources/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css','d1_plugin');?>" rel="stylesheet" media="all">
    <link href="<?php echo plugins_url('d1_plugin/resources/vendor/wow/animate.css','d1_plugin');?>" rel="stylesheet" media="all">
    <link href="<?php echo plugins_url('d1_plugin/resources/vendor/css-hamburgers/hamburgers.min.css','d1_plugin');?>" rel="stylesheet" media="all">
    <link href="<?php echo plugins_url('d1_plugin/resources/vendor/slick/slick.css','d1_plugin');?>" rel="stylesheet" media="all">
    <link href="<?php echo plugins_url('d1_plugin/resources/vendor/select2/select2.min.css','d1_plugin');?>" rel="stylesheet" media="all">
    <link href="<?php echo plugins_url('d1_plugin/resources/vendor/perfect-scrollbar/perfect-scrollbar.css','d1_plugin');?>" rel="stylesheet" media="all">
    <!-- Main CSS-->
    <link href="<?php echo plugins_url('d1_plugin/resources/css/theme.css','d1_plugin');?>" rel="stylesheet" media="all">
</head>

<body class="animsition">
    <!-- DATA TABLE -->
    <div class="table-data__tool">
        <div class="table-data__tool-right">
            <?php   
                    $create_url = "?page=d1_plugin_seguranca&tab=conform&";
                    $param = array('path_wp' => ABSPATH, 'id_seg' => false, 'url_location' => "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
                    $query_string = http_build_query($param); 
            ?>
            <a href="<?php echo $create_url . $query_string ;?>"><button class="button button-primary">
                <i class="zmdi zmdi-plus"></i>Adicionar Item</button></a>
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
                    $result = json_decode(json_encode($wpdb->get_results("SELECT * FROM " . $wpdb->prefix . D1_LANG . "d1_seguranca WHERE tipo='conformidade' ")),true);
                    $cont = 0;
                    $delete_url = plugins_url('d1_plugin/templates/seguranca/seg_delete.php?','d1_plugin');
                    foreach($result as $key=>&$value): 
                        $cont++;
                        $create_edit_url = "?page=d1_plugin_seguranca&tab=conform&";
                        $param = array('path_wp' => ABSPATH, 'id_seg' => $value['id'], 'url_location' => "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
                        $query_string = http_build_query($param);
                ?>
                <tr class="tr-shadow">
                    <input type="hidden" name="id_seg" id="id_seg" value="<?php echo $value['id'];?>">
                    <td><?php echo $value['title'];?></td>
                    <td class="desc"><?php echo $value['description'];?></td>
                    <td>
                        <div class="table-data-feature">
                            <a href="<?php echo $create_edit_url . $query_string;?>"><button class="item btn_edit" data-toggle="tooltip" data-placement="top" title="Edit" name="edit">
                                <i class="zmdi zmdi-edit"></i>
                            </button></a>
                            <a href="<?php echo $delete_url . $query_string;?>"><button class="item btn_delete" data-toggle="tooltip" data-placement="top" title="Delete" name="delete">
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


    <!-- Jquery JS-->
    <script src="<?php echo plugins_url('d1_plugin/resources/vendor/jquery-3.2.1.min.js','d1_plugin');?>"></script>
    <!-- Bootstrap JS-->
    <script src="<?php echo plugins_url('d1_plugin/resources/vendor/bootstrap-4.1/popper.min.js','d1_plugin');?>"></script>
    <script src="<?php echo plugins_url('d1_plugin/resources/vendor/bootstrap-4.1/bootstrap.min.js','d1_plugin');?>"></script>
    <!-- Vendor JS       -->
    <script src="<?php echo plugins_url('d1_plugin/resources/vendor/slick/slick.min.js','d1_plugin');?>">
    </script>
    <script src="<?php echo plugins_url('d1_plugin/resources/vendor/wow/wow.min.js','d1_plugin');?>"></script>
    <script src="<?php echo plugins_url('d1_plugin/resources/vendor/animsition/animsition.min.js','d1_plugin');?>"></script>
    <script src="<?php echo plugins_url('d1_plugin/resources/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js','d1_plugin');?>">
    </script>
    <script src="<?php echo plugins_url('d1_plugin/resources/vendor/counter-up/jquery.waypoints.min.js','d1_plugin');?>"></script>
    <script src="<?php echo plugins_url('d1_plugin/resources/vendor/counter-up/jquery.counterup.min.js','d1_plugin');?>">
    </script>
    <script src="<?php echo plugins_url('d1_plugin/resources/vendor/circle-progress/circle-progress.min.js','d1_plugin');?>"></script>
    <script src="<?php echo plugins_url('d1_plugin/resources/vendor/perfect-scrollbar/perfect-scrollbar.js','d1_plugin');?>"></script>
    <script src="<?php echo plugins_url('d1_plugin/resources/vendor/chartjs/Chart.bundle.min.js','d1_plugin');?>"></script>
    <script src="<?php echo plugins_url('d1_plugin/resources/vendor/select2/select2.min.js','d1_plugin');?>">
    </script>
    <!-- Main JS-->
    <script src="<?php echo plugins_url('d1_plugin/resources/js/main.js','d1_plugin');?>"></script>
    <script>
    $(document).ready(function(){

        //botão deletar
        $(document).on('click', '.btn_delete', function(){
            if(!confirm('Tem certeza que deseja apagar este item?')){
                return false;
            }
        });
    });
    </script>
</body>

</html>
<!-- end document-->