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
$id_cargo               = !empty($_REQUEST["id"]) ? $_REQUEST["id"]: false;
$location               = urldecode($_REQUEST["url_location"]);

if(empty($_REQUEST["id_departamento"])){
    header("location: " . urldecode($location));
}

$data = array(
    'id'            => !empty($_REQUEST["id"]) ? $_REQUEST["id"] : '',
    'title'         => !empty($_REQUEST["title"]) ? $_REQUEST["title"] : '',
    'subtitle'      => !empty($_REQUEST["subtitle"]) ? $_REQUEST["subtitle"] : '',
    'description1'  => !empty($_REQUEST["description1"]) ? $_REQUEST["description1"] : '',
    'description2'  => !empty($_REQUEST["description2"]) ? $_REQUEST["description2"] : '',
    'description3'  => !empty($_REQUEST["description3"]) ? $_REQUEST["description3"] : '',
    'id_departamento'=> !empty($_REQUEST["id_departamento"]) ? $_REQUEST["id_departamento"] : '',
);

//insert
if(empty($id_cargo)){
    $sql           = "INSERT INTO " . $wpdb->prefix . D1_LANG . "d1_cargos(title,subtitle,description1,description2,description3,id_departamento) 
                    VALUES('%s','%s','%s','%s','%s','%s')";
    $wpdb->query($wpdb->prepare($sql,array($data['title'],$data['subtitle'],$data['description1'],$data['description2'],$data['description3'],$data['id_departamento'])));
    $id_cargo = $wpdb->insert_id;
    $param              = array('path_wp' => $_REQUEST["path_wp"], 'id_cargo' => $id_cargo, 'url_location' => $_REQUEST["admin_url"]);
    $query_string       = http_build_query($param);
    $location           = urldecode($_REQUEST["admin_url"] . "admin.php?page=d1_plugin_departamentos&tab=cargos&" . $query_string);
}
//update
else{
    $param              = array('path_wp' => $_REQUEST["path_wp"], 'id_cargo' => $id_cargo, 'url_location' => $_REQUEST["admin_url"]);
    $query_string       = http_build_query($param);
    $location           = urldecode($_REQUEST["admin_url"] . "admin.php?page=d1_plugin_departamentos&tab=cargos&" . $query_string);
    $sql                = "UPDATE " . $wpdb->prefix . D1_LANG ."d1_cargos SET title='%s', subtitle='%s', description1='%s', description2='%s',
    description3='%s', id_departamento='%s' WHERE id = %d";
    $wpdb->query($wpdb->prepare($sql,array($data['title'],$data['subtitle'],$data['description1'],$data['description2'],$data['description3'],$data['id_departamento'],$data['id'])));
}
header("location: " . $location);

