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
$id_hero                    = !empty($_REQUEST["id"]) ? $_REQUEST["id"]: false;
$location                   = urldecode($_REQUEST["url_location"]);
$data = array(
    'id'                    => !empty($_REQUEST["id"]) ? $_REQUEST["id"] : '',
    'chamada_principal'     => !empty($_REQUEST["chamada_principal"]) ? $_REQUEST["chamada_principal"] : '',
    'descricao_primaria'    => !empty($_REQUEST["descricao_primaria"]) ? $_REQUEST["descricao_primaria"] : '',
    'descricao_secundaria'  => !empty($_REQUEST["descricao_secundaria"]) ? $_REQUEST["descricao_secundaria"] : '',
    'hero_name'             => !empty($_REQUEST["hero_name"]) ? $_REQUEST["hero_name"] : '',
    'hero_cargo'            => !empty($_REQUEST["hero_cargo"]) ? $_REQUEST["hero_cargo"] : '',
    'hero_descricao'        => !empty($_REQUEST["hero_descricao"]) ? $_REQUEST["hero_descricao"] : '',
    'img_url_logo_hero_company'=> !empty($_REQUEST["img_url_logo_hero_company"]) ? $_REQUEST["img_url_logo_hero_company"] : '',
    'img_url_bg_hero'       => !empty($_REQUEST["img_url_bg_hero"]) ? $_REQUEST["img_url_bg_hero"] : '',
    'id_cta'                => !empty($_REQUEST["id_cta"]) ? $_REQUEST["id_cta"] : '',
);

//insert
if(empty($id_hero)){
    $sql           = "INSERT INTO " . $wpdb->prefix . D1_LANG . "d1_home_hero
    (chamada_principal,descricao_primaria,descricao_secundaria,hero_name,hero_cargo,
    hero_descricao,img_url_logo_hero_company,img_url_bg_hero,id_cta)
    VALUES('%s','%s','%s','%s','%s','%s','%s','%s','%s')";
    $wpdb->query($wpdb->prepare($sql,array(
        $data['chamada_principal'],$data['descricao_primaria'],$data['descricao_secundaria'],$data['hero_name'],$data['hero_cargo'],
        $data['hero_descricao'],$data['img_url_logo_hero_company'],$data['img_url_bg_hero'],$data['id_cta']
    )));
    $id_hero = $wpdb->insert_id;
    $param              = array('path_wp' => $_REQUEST["path_wp"], 'id_hero' => $id_hero, 'url_location' => $_REQUEST["admin_url"]);
    $query_string       = http_build_query($param);
    $location           = urldecode($_REQUEST["admin_url"] . "admin.php?page=d1_plugin&tab=hero&" . $query_string);
}
//update
else{
    $param              = array('path_wp' => $_REQUEST["path_wp"], 'id_hero' => $id_hero, 'url_location' => $_REQUEST["admin_url"]);
    $query_string       = http_build_query($param);
    $location           = urldecode($_REQUEST["admin_url"] . "admin.php?page=d1_plugin&tab=hero&" . $query_string);
    $sql                = "UPDATE " . $wpdb->prefix . D1_LANG ."d1_home_hero SET chamada_principal='%s', descricao_primaria='%s', descricao_secundaria='%s',
    hero_name='%s', hero_cargo='%s',
    hero_descricao='%s' , img_url_logo_hero_company='%s' , img_url_bg_hero='%s' , id_cta='%s' WHERE id = %d";
    $wpdb->query($wpdb->prepare($sql,array($data['chamada_principal'],$data['descricao_primaria'],$data['descricao_secundaria'],$data['hero_name'],$data['hero_cargo'],
    $data['hero_descricao'],$data['img_url_logo_hero_company'],$data['img_url_bg_hero'],$data['id_cta'],$data['id']
)));
}
header("location: " . $location);