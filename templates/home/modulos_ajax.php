<?php


function dirname_safe($path, $level = 0)
{
    $dir = explode(DIRECTORY_SEPARATOR, $path);
    $level = $level * -1;
    if ($level == 0) $level = count($dir);
    array_splice($dir, $level);
    return implode($dir, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;
}
define( 'SHORTINIT', true );
require(trim($_REQUEST["path_wp"]) . "wp-load.php");
require_once dirname_safe(__FILE__,3) . 'includes/base/d1_constants.php';
global $wpdb;

$number             = !empty($_REQUEST["subtitle"]) ? count($_REQUEST["subtitle"]) : false;
$ids_delete         = !empty($_REQUEST["json_delete_items"]) ? explode(',',$_REQUEST["json_delete_items"]) : array();
$table_data         = array();
$url_location       = urldecode($_REQUEST["url_location"]);

if(empty($_REQUEST["title"])){
    header("location: " . $url_location);
}

for($i=0; $i<$number; $i++){
    $table_data[] = array(
        'id'            => !empty($_REQUEST["id"][$i]) ? $_REQUEST["id"][$i] : '',
        'title'         => !empty($_REQUEST["title"][$i]) ? $_REQUEST["title"][$i] : '',
        'id_modulo'     => !empty($_REQUEST["id_modulo"][$i]) ? $_REQUEST["id_modulo"][$i] : '',
        'subtitle'      => !empty($_REQUEST["subtitle"][$i]) ? $_REQUEST["subtitle"][$i] : '',
        'description'   => !empty($_REQUEST["description"][$i]) ? $_REQUEST["description"][$i] : '',
        'text_link'     => !empty($_REQUEST["text_link"][$i]) ? $_REQUEST["text_link"][$i] : '',
        'url_link'      => !empty($_REQUEST["url_link"][$i]) ? $_REQUEST["url_link"][$i] : '',
        'url_img'       => !empty($_REQUEST["url_img"][$i]) ? $_REQUEST["url_img"][$i] : '',
    );
}

//criando / atualizando o pai da categoria
if(empty($_REQUEST["id_pai"])){
    $descricao              = $_REQUEST['main_title'];
    $sql                    = "INSERT INTO " . $wpdb->prefix . D1_LANG . "d1_modulos(title) VALUES('%s')";
    $wpdb->query($wpdb->prepare($sql,array($descricao)));
    $id_pai = $wpdb->insert_id;
}else{
    $id_pai                 = $_REQUEST['id_pai'];
    $descricao              = $_REQUEST['main_title'];
    $sql                    = "UPDATE " . $wpdb->prefix . D1_LANG ."d1_modulos SET title='%s' WHERE id = '%s';";
    $wpdb->query($wpdb->prepare($sql,array($descricao,$id_pai)));
}

$param              = array('path_wp' => $_REQUEST["path_wp"], 'id_modulo' => $id_pai, 'url_location' => $_REQUEST["admin_url"]);
$query_string       = http_build_query($param);
$location           = urldecode($_REQUEST["admin_url"] . "admin.php?page=d1_plugin&tab=modulos&" . $query_string);

foreach($table_data as $key=>&$value){
    $value['id_modulo'] = $id_pai;
    if(empty($value['id'])){
        unset($value['id']);
        $sql           = "INSERT INTO " . $wpdb->prefix . D1_LANG . "d1_modulos(id_modulo,subtitle,description,text_link,url_link,url_img) 
        VALUES('%s','%s','%s','%s','%s','%s')";
        $wpdb->query($wpdb->prepare($sql,array($value['id_modulo'],$value['subtitle'],$value['description'],$value['text_link'],$value['url_link'],$value['url_img'])));
    }else{
        //update
        $sql                    = "UPDATE " . $wpdb->prefix . D1_LANG ."d1_modulos SET id_modulo='%s', subtitle='%s', description='%s', text_link='%s',
        url_link='%s', url_img='%s'  WHERE id = '%s';";
        $wpdb->query($wpdb->prepare($sql,array($value['id_modulo'],$value['subtitle'],$value['description'],$value['text_link'],$value['url_link'],$value['url_img'],$value['id'])));
    }
}

if(!empty($ids_delete[0])){
    foreach($ids_delete as $id){
        $wpdb->query($wpdb->prepare("DELETE FROM ". $wpdb->prefix . D1_LANG . "d1_modulos WHERE id=$id;",array()));
    }
}
//pre($location);die;
header("location: " . $location);