<?php

function pre($data) {
    echo "<pre>";
        print_r($data);
    echo "</pre>";
}


define( 'SHORTINIT', true );
require(trim($_REQUEST["path_wp"]) . "wp-load.php");
global $wpdb;

$number             = !empty($_REQUEST["descricao"]) ? count($_REQUEST["descricao"]) : false;
$ids_delete         = !empty($_REQUEST["json_delete_items"]) ? explode(',',$_REQUEST["json_delete_items"]) : array();
$table_data         = array();
$url_location       = urldecode($_REQUEST["url_location"]);

if(empty($_REQUEST["descricao_pai"])){
    header("location: " . $url_location);
}

for($i=0; $i<$number; $i++){
    $table_data[] = array(
        'id'                   => !empty($_REQUEST["id"][$i]) ? $_REQUEST["id"][$i] : '',
        'descricao'            => !empty($_REQUEST["descricao"][$i]) ? $_REQUEST["descricao"][$i] : '',
        'id_categoria'         => !empty($_REQUEST["id_categoria"][$i]) ? $_REQUEST["id_categoria"][$i] : '',
    );
}

//criando / atualizando o pai da categoria
if(empty($_REQUEST["id_pai"])){
    $descricao              = $_REQUEST['descricao_pai'];
    $id_categoria           = $_REQUEST['id_pai_categoria'];
    $sql                    = "INSERT INTO " . $wpdb->prefix . "d1_cases_categorias(descricao,id_categoria) VALUES('$descricao' , '$id_categoria')";
    $wpdb->query($wpdb->prepare($sql,array()));
    $id_pai = $wpdb->insert_id;
}else{
    $id_pai                 = $_REQUEST['id_pai'];
    $descricao              = $_REQUEST['descricao_pai'];
    $id_categoria           = $_REQUEST['id_pai_categoria'];
    $sql                    = "UPDATE " . $wpdb->prefix ."d1_cases_categorias SET descricao='%s', id_categoria='%s' WHERE id = '%s';";
    $wpdb->query($wpdb->prepare($sql,array($descricao,$id_categoria,$id_pai)));
}

foreach($table_data as $key=>&$value){
    //$value['id'] = is_numeric($value['id']) ? $value['id'] : false; 
    $value['id_categoria'] = $id_pai;
    if(empty($value['id'])){
        unset($value['id']);
        //insert
        $fields                 = implode("','",$value);
        $sql                    = "INSERT INTO " . $wpdb->prefix . "d1_cases_categorias(descricao,id_categoria) VALUES('$fields')";
        $wpdb->query($wpdb->prepare($sql,array()));
    }else{
        //update
        $id                     = $value['id'];
        $descricao              = $value['descricao'];
        $id_categoria           = $value['id_categoria'];
        $sql                    = "UPDATE " . $wpdb->prefix ."d1_cases_categorias SET descricao='%s', id_categoria='%s' WHERE id = '%s';";
        $wpdb->query($wpdb->prepare($sql,array($descricao,$id_categoria,$id)));
    }
}

if(!empty($ids_delete[0])){
    foreach($ids_delete as $id){
        $wpdb->query($wpdb->prepare("DELETE FROM ". $wpdb->prefix . "d1_cases_categorias WHERE id=$id;",array()));
    }
}

$url_location = str_replace("id_categoria=0","id_categoria=$id_pai",$url_location);
$url_location = str_replace("secao2","secao3",$url_location);

header("location: " . $url_location);