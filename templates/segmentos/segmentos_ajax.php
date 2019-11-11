<?php
function pre($data) {
    echo "<pre>";
        print_r($data);
    echo "</pre>";
}

define( 'SHORTINIT', true );
require(trim($_REQUEST["path_wp"]) . "wp-load.php");
global $wpdb;
$id_seg                = !empty($_REQUEST["id"]) ? $_REQUEST["id"]: false;
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

$data = array(
    'id'            => !empty($_REQUEST["id"]) ? $_REQUEST["id"] : '',
    'main_title'    => !empty($_REQUEST["main_title"]) ? $_REQUEST["main_title"] : '',
    'title'         => !empty($_REQUEST["title"]) ? $_REQUEST["title"] : '',
    'description'   => !empty($_REQUEST["description"]) ? $_REQUEST["description"] : '',
    'url_img_bg'    => !empty($_REQUEST["url_img_bg"]) ? $_REQUEST["url_img_bg"] : '',
    'challenge_title'=> !empty($_REQUEST["challenge_title"]) ? $_REQUEST["challenge_title"] : '',
    'challenge1'    => json_encode($challenge1),
    'challenge2'    => json_encode($challenge2),
    'challenge3'    => json_encode($challenge3),
    'img_customer1' => !empty($_REQUEST["img_customer1"]) ? $_REQUEST["img_customer1"] : '',
    'img_customer2' => !empty($_REQUEST["img_customer2"]) ? $_REQUEST["img_customer2"] : '',
    'img_customer3' => !empty($_REQUEST["img_customer3"]) ? $_REQUEST["img_customer3"] : '',
    'customers_title'=> !empty($_REQUEST["customers_title"]) ? $_REQUEST["customers_title"] : '',
);

//insert
if(empty($id_seg)){
    $sql           = "INSERT INTO " . $wpdb->prefix . "d1_segmentos
    (main_title,title,description,url_img_bg,challenge_title,challenge1,challenge2,challenge3,img_customer1,img_customer2,img_customer3,customers_title) 
    VALUES('%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s')";
    $wpdb->query($wpdb->prepare($sql,array(
        $data['main_title'],$data['title'],$data['description'],$data['url_img_bg'],$data['challenge_title'],
        $data['challenge1'],$data['challenge2'],$data['challenge3'],$data['img_customer1'],$data['img_customer2'],$data['img_customer3'],$data['customers_title']
    )));
    $id_seg = $wpdb->insert_id;
    $param              = array('path_wp' => $_REQUEST["path_wp"], 'id_seg' => $id_seg, 'url_location' => $_REQUEST["admin_url"]);
    $query_string       = http_build_query($param);
    $location           = urldecode($_REQUEST["admin_url"] . "admin.php?page=d1_plugin_segmentos&tab=seg&" . $query_string);
}
//update
else{
    $param              = array('path_wp' => $_REQUEST["path_wp"], 'id_seg' => $id_seg, 'url_location' => $_REQUEST["admin_url"]);
    $query_string       = http_build_query($param);
    $location           = urldecode($_REQUEST["admin_url"] . "admin.php?page=d1_plugin_segmentos&tab=seg&" . $query_string);
    $sql                = "UPDATE " . $wpdb->prefix ."d1_segmentos SET main_title='%s', title='%s', description='%s',
    url_img_bg='%s', challenge_title='%s' , challenge1='%s' , challenge2='%s' , challenge3='%s'
    , img_customer1='%s', img_customer2='%s', img_customer3='%s', customers_title='%s'
    WHERE id = %d";
    $wpdb->query($wpdb->prepare($sql,array($data['main_title'],$data['title'],$data['description'],$data['url_img_bg'],$data['challenge_title'],
    $data['challenge1'],$data['challenge2'],$data['challenge3'],$data['img_customer1'],$data['img_customer2'],$data['img_customer3'],$data['customers_title'],$data['id']
)));
}

header("location: " . $location);

