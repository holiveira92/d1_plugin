<?php
define( 'SHORTINIT', true );
require(trim($_REQUEST["path_wp"]) . "wp-load.php");



function insert_bd($data){
    require(trim($_REQUEST["path_wp"]) . "wp-load.php");
    global $wpdb;

    $name = $data[0];
    $link = $data[1];
    $group_id = $data[2];
    $sql                    = "INSERT INTO " . $wpdb->prefix . "d1_footer_links(name,link,group_id) VALUES(%s,%s,%s)";
    $wpdb->query($wpdb->prepare($sql,array($name,$link,$group_id)));
    return $wpdb->insert_id;
}

function update_bd($data){
    require(trim($_REQUEST["path_wp"]) . "wp-load.php");
    global $wpdb;

    $name                   = $data[0];
    $link                   = $data[1];
    $group_id               = !empty($data[2]) ? $data[2] : '';
    $id                     = $data[3];
    $sql                    = "UPDATE " . $wpdb->prefix ."d1_footer_links SET name=%s, link=%s, group_id=%s WHERE id = %d";
    $wpdb->query($wpdb->prepare($sql,array($name,$link,$group_id,$id)) );
}

function delete_pai($ids_delete){
    global $wpdb;
    foreach($ids_delete as $id){
        $wpdb->query($wpdb->prepare("DELETE FROM ". $wpdb->prefix . "d1_footer_links WHERE id=%d;",array($id)));
        $wpdb->query($wpdb->prepare("DELETE FROM ". $wpdb->prefix . "d1_footer_links WHERE group_id=%d;",array($id)));
    }
}

function delete_items($ids_delete){
    global $wpdb;
    foreach($ids_delete as $id){
        $wpdb->query($wpdb->prepare("DELETE FROM ". $wpdb->prefix . "d1_footer_links WHERE id=%d;",array($id)));
    }
}


$number             = !empty($_REQUEST["name"]) ? count($_REQUEST["name"]) : false;
$ids_delete         = !empty($_REQUEST["json_delete"]) ? explode(',',$_REQUEST["json_delete"]) : array();
$ids_delete_items   = !empty($_REQUEST["json_delete_items"]) ? explode(',',$_REQUEST["json_delete_items"]) : array();
$table_data         = array();

if($number == 0){
    header("location: " . urldecode($_REQUEST["url_location"]));
}

//Montando array com o conteudo vindo via POST
for($i=0; $i<$number; $i++){
    $table_data[] = array(
        'id'                => !empty($_REQUEST["id"][$i]) ? $_REQUEST["id"][$i] : '',
        'name'              => !empty($_REQUEST["name"][$i]) ? $_REQUEST["name"][$i] : '',
        'link'              => !empty($_REQUEST["link"][$i]) ? $_REQUEST["link"][$i] : '',
        'group_id'          => !empty($_REQUEST["group_id"][$i]) ? $_REQUEST["group_id"][$i] : '',
    );
}

//Organiza array pelos grupos pai
$grupos = array();
foreach($table_data as $key=>&$value){
    if(empty($value['group_id'])){
        $grupos[$value["id"]] = array(
            'id'                => !empty($value["id"]) ? $value["id"] : null,
            'name'              => !empty($value["name"]) ? $value["name"] : null,
            'link'              => !empty($value["link"]) ? $value["link"] : null,
            'group_id'          => !empty($value["group_id"]) ? $value["group_id"] : null,
        );
    }
}

//Encontra e insere filhos no array geral dos pais
foreach($table_data as $key=>&$value){
    if(!empty($value['group_id'])){
        $grupos[$value['group_id']]['filhos'][] = $value;
    }
}

//Cria ou atualiza dados do grupo
foreach($grupos as $key=>&$value){
    $id_temp = !is_numeric($value['id']) ? $value['id'] : false; 
    $value['id'] = is_numeric($value['id']) ? $value['id'] : false; 
    //unset($value['filhos']);
    if(empty($value['id'])){
        //insert
        $value['id'] = insert_bd(array($value['name'],$value['link'],$value['group_id']));

        //cria os filhos deste grupo caso existam
        if(!empty($value['filhos'])){
            foreach($value['filhos'] as $k=>&$filho){
                $filho['group_id'] = $value['id'];
                if(empty($filho['id']))
                    insert_bd(array($filho['name'],$filho['link'],$filho['group_id']));
                else
                    update_bd(array($filho['name'],$filho['link'],$filho['group_id'],$filho['id']));
            }
        }
    }else{
        //update
        update_bd(array($value['name'],$value['link'],$value['group_id'],$value['id']));

        //atualiza os filhos deste grupo caso existam
        if(!empty($value['filhos'])){
            foreach($value['filhos'] as $k=>&$filho){
                if(empty($filho['id']))
                    insert_bd(array($filho['name'],$filho['link'],$filho['group_id']));
                else
                    update_bd(array($filho['name'],$filho['link'],$filho['group_id'],$filho['id']));
            }
        }
    }
}

if(!empty($ids_delete[0])){
    delete_pai($ids_delete);
}

if(!empty($ids_delete_items[0])){
    delete_items($ids_delete_items);
}

header("location: " . $_REQUEST["url_location"]);