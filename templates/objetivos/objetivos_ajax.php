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
$id_mod                = !empty($_REQUEST["id"]) ? $_REQUEST["id"]: false;
$location              = urldecode($_REQUEST["url_location"]);

$challenge1 = array(
    'title'         => !empty($_REQUEST['challenge1_title']) ? $_REQUEST['challenge1_title'] : "",
    'description'   => !empty($_REQUEST['challenge1_description']) ? $_REQUEST['challenge1_description'] : "",
);

$challenge2 = array(
    'title'         => !empty($_REQUEST['challenge2_title']) ? $_REQUEST['challenge2_title'] : "",
    'description'   => !empty($_REQUEST['challenge2_description']) ? $_REQUEST['challenge2_description'] : "",
);

$challenge3 = array(
    'title'         => !empty($_REQUEST['challenge3_title']) ? $_REQUEST['challenge3_title'] : "",
    'description'   => !empty($_REQUEST['challenge3_description']) ? $_REQUEST['challenge3_description'] : "",
);

$cases_options_data = array(
    'cases_title'                   => !empty($_REQUEST['cases_title']) ? $_REQUEST['cases_title'] : '',
    'cases_chamada'                 => !empty($_REQUEST['cases_chamada']) ? $_REQUEST['cases_chamada'] : '',
    'list_case1'                    => !empty($_REQUEST['list_case1']) ? $_REQUEST['list_case1'] : 0,
    'list_case2'                    => !empty($_REQUEST['list_case2']) ? $_REQUEST['list_case2'] : 0,
    'list_case3'                    => !empty($_REQUEST['list_case3']) ? $_REQUEST['list_case3'] : 0,
);

$data = array(
    'id'            => !empty($_REQUEST["id"]) ? $_REQUEST["id"] : '',
    'title'         => !empty($_REQUEST["title"]) ? $_REQUEST["title"] : '',
    'description'   => !empty($_REQUEST["description"]) ? $_REQUEST["description"] : '',
    'url_img'       => !empty($_REQUEST["url_img"]) ? $_REQUEST["url_img"] : '',
    'subtitle'      => !empty($_REQUEST["subtitle"]) ? $_REQUEST["subtitle"] : '',
    'main_subtitle' => !empty($_REQUEST["main_subtitle"]) ? $_REQUEST["main_subtitle"] : '',
    'subtitle_description'  => !empty($_REQUEST["subtitle_description"]) ? $_REQUEST["subtitle_description"] : '',
    'challenge1'    => json_encode($challenge1),
    'challenge2'    => json_encode($challenge2),
    'challenge3'    => json_encode($challenge3),
    'cases_options' => json_encode($cases_options_data),

);

//insert
if(empty($id_mod)){
    $sql           = "INSERT INTO " . $wpdb->prefix . D1_LANG . "d1_objetivos
    (title,description,url_img,subtitle,main_subtitle,subtitle_description,
    challenge1,challenge2,challenge3,cases_options)
    VALUES('%s','%s','%s','%s','%s','%s','%s','%s','%s','%s')";
    $wpdb->query($wpdb->prepare($sql,array(
        $data['title'],$data['description'],$data['url_img'],$data['subtitle'],$data['main_subtitle'],$data['subtitle_description'],
        $data['challenge1'],$data['challenge2'],$data['challenge3'],$data['cases_options']
    )));
    $id_mod = $wpdb->insert_id;
    $param              = array('path_wp' => $_REQUEST["path_wp"], 'id_mod' => $id_mod, 'url_location' => $_REQUEST["admin_url"]);
    $query_string       = http_build_query($param);
    $location           = urldecode($_REQUEST["admin_url"] . "admin.php?page=d1_plugin_objetivos&tab=mod&" . $query_string);
}
//update
else{
    $param              = array('path_wp' => $_REQUEST["path_wp"], 'id_mod' => $id_mod, 'url_location' => $_REQUEST["admin_url"]);
    $query_string       = http_build_query($param);
    $location           = urldecode($_REQUEST["admin_url"] . "admin.php?page=d1_plugin_objetivos&tab=mod&" . $query_string);
    $sql                = "UPDATE " . $wpdb->prefix . D1_LANG ."d1_objetivos SET title='%s', description='%s',
    url_img='%s', subtitle='%s' , main_subtitle='%s' , subtitle_description='%s' ,
    challenge1='%s' , challenge2='%s' , challenge3='%s', cases_options='%s' WHERE id = %d";
    $wpdb->query($wpdb->prepare($sql,array($data['title'],$data['description'],$data['url_img'],$data['subtitle'],$data['main_subtitle'],$data['subtitle_description'],
    $data['challenge1'],$data['challenge2'],$data['challenge3'],$data['cases_options'],$data['id']
)));
}

header("location: " . $location);