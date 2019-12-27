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
$id_keyp                = !empty($_REQUEST["id"]) ? $_REQUEST["id"]: false;
$location               = urldecode($_REQUEST["url_location"]);

$data = array(
    'id'            => !empty($_REQUEST["id"]) ? $_REQUEST["id"] : '',
    'title'         => !empty($_REQUEST["title"]) ? $_REQUEST["title"] : '',
    'description'   => !empty($_REQUEST["description"]) ? $_REQUEST["description"] : '',
    'url_img'       => !empty($_REQUEST["url_img"]) ? $_REQUEST["url_img"] : '',
    'page'          => !empty($_REQUEST["page"]) ? $_REQUEST["page"] : 'segmentos',
    'id_segmento'   => !empty($_REQUEST["id_segmento"]) ? $_REQUEST["id_segmento"] : '',
);

//insert
if(empty($id_keyp)){
    $sql           = "INSERT INTO " . $wpdb->prefix . D1_LANG . "d1_key_points(title,description,url_img,page,id_segmento) 
                    VALUES('%s','%s','%s','%s','%s')";
    $wpdb->query($wpdb->prepare($sql,array($data['title'],$data['description'],$data['url_img'],$data['page'],$data['id_segmento'])));
    $id_keyp = $wpdb->insert_id;
    $param              = array('path_wp' => $_REQUEST["path_wp"], 'id_keyp' => $id_keyp, 'url_location' => $_REQUEST["admin_url"]);
    $query_string       = http_build_query($param);
    $location           = urldecode($_REQUEST["admin_url"] . "admin.php?page=d1_plugin_departamentos&tab=keyp&" . $query_string);
}
//update
else{
    $param              = array('path_wp' => $_REQUEST["path_wp"], 'id_keyp' => $id_keyp, 'url_location' => $_REQUEST["admin_url"]);
    $query_string       = http_build_query($param);
    $location           = urldecode($_REQUEST["admin_url"] . "admin.php?page=d1_plugin_departamentos&tab=keyp&" . $query_string);
    $sql                = "UPDATE " . $wpdb->prefix . D1_LANG ."d1_key_points SET title='%s', description='%s', url_img='%s', page='%s', id_segmento='%s' WHERE id = %d";
    $wpdb->query($wpdb->prepare($sql,array($data['title'],$data['description'],$data['url_img'],$data['page'],$data['id_segmento'],$data['id'])));
}
header("location: " . $location);

