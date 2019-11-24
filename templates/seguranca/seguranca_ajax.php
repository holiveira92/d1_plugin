<?php
function pre($data) {
    echo "<pre>";
        print_r($data);
    echo "</pre>";
}

define( 'SHORTINIT', true );
require(trim($_REQUEST["path_wp"]) . "wp-load.php");
global $wpdb;
$id_seg                 = !empty($_REQUEST["id"]) ? $_REQUEST["id"]: false;
$location               = urldecode($_REQUEST["url_location"]);
$page_type              = !empty($_REQUEST["tipo"]) ? $_REQUEST["tipo"] : 'seguranca';
$page_type              = ($page_type == 'seguranca') ? 'seg' : 'conform';
$data = array(
    'id'            => !empty($_REQUEST["id"]) ? $_REQUEST["id"] : '',
    'title'         => !empty($_REQUEST["title"]) ? $_REQUEST["title"] : '',
    'description'   => !empty($_REQUEST["description"]) ? $_REQUEST["description"] : '',
    'description_alternative'   => !empty($_REQUEST["description_alternative"]) ? $_REQUEST["description_alternative"] : '',
    'url_img'       => !empty($_REQUEST["url_img"]) ? $_REQUEST["url_img"] : '',
    'tipo'          => !empty($_REQUEST["tipo"]) ? $_REQUEST["tipo"] : '',
);

//insert
if(empty($id_seg)){
    $sql                = "INSERT INTO " . $wpdb->prefix . "d1_seguranca(title,description,description_alternative,url_img,tipo) 
                            VALUES('%s','%s','%s','%s','%s')";
    $wpdb->query($wpdb->prepare($sql,array($data['title'],$data['description'],$data['description_alternative'],$data['url_img'],$data['tipo'])));
    $id_seg             = $wpdb->insert_id;
    $param              = array('path_wp' => $_REQUEST["path_wp"], 'id_seg' => $id_seg, 'url_location' => $_REQUEST["admin_url"]);
    $query_string       = http_build_query($param);
    $location           = urldecode($_REQUEST["admin_url"] . "admin.php?page=d1_plugin_seguranca&tab=$page_type&" . $query_string);
}
//update
else{
    $param              = array('path_wp' => $_REQUEST["path_wp"], 'id_seg' => $id_seg, 'url_location' => $_REQUEST["admin_url"]);
    $query_string       = http_build_query($param);
    $location           = urldecode($_REQUEST["admin_url"] . "admin.php?page=d1_plugin_seguranca&tab=$page_type&" . $query_string);
    $sql                = "UPDATE " . $wpdb->prefix ."d1_seguranca SET title='%s', description='%s', description_alternative='%s', url_img='%s', tipo='%s' WHERE id = %d";
    $wpdb->query($wpdb->prepare($sql,array($data['title'],$data['description'],$data['description_alternative'],$data['url_img'],$data['tipo'],$data['id'])));
}
header("location: " . $location);

