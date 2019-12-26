<?php


define( 'SHORTINIT', true );
require(trim($_REQUEST["path_wp"]) . "wp-load.php");
global $wpdb;
$id_midia              = !empty($_REQUEST["id"]) ? $_REQUEST["id"]: false;
$location              = urldecode($_REQUEST["url_location"]);
$data = array(
    'id'            => !empty($_REQUEST["id"]) ? $_REQUEST["id"] : '',
    'title'         => !empty($_REQUEST["title"]) ? $_REQUEST["title"] : '',
    'content'       => !empty($_REQUEST["content"]) ? $_REQUEST["content"] : '',
    'vehicle'       => !empty($_REQUEST["vehicle"]) ? $_REQUEST["vehicle"] : '',
    'publication_date'=> !empty($_REQUEST["publication_date"]) ? $_REQUEST["publication_date"] : '',
    'link'          => !empty($_REQUEST["link"]) ? $_REQUEST["link"] : '',
    'url_img_bg'    => !empty($_REQUEST["url_img_bg"]) ? $_REQUEST["url_img_bg"] : '',
);

//insert
if(empty($id_midia)){
    $sql           = "INSERT INTO " . $wpdb->prefix . "d1_midia
    (title,content,vehicle,publication_date,link,url_img_bg) 
    VALUES('%s','%s','%s','%s','%s','%s')";
    $wpdb->query($wpdb->prepare($sql,array(
        $data['title'],$data['content'],$data['vehicle'],$data['publication_date'],
        $data['link'],$data['url_img_bg']
    )));
    $id_midia = $wpdb->insert_id;
    $param              = array('path_wp' => $_REQUEST["path_wp"], 'id_midia' => $id_midia, 'url_location' => $_REQUEST["admin_url"]);
    $query_string       = http_build_query($param);
    $location           = urldecode($_REQUEST["admin_url"] . "admin.php?page=d1_plugin_d1_midia&tab=midia&" . $query_string);
}
//update
else{
    $param              = array('path_wp' => $_REQUEST["path_wp"], 'id_midia' => $id_midia, 'url_location' => $_REQUEST["admin_url"]);
    $query_string       = http_build_query($param);
    $location           = urldecode($_REQUEST["admin_url"] . "admin.php?page=d1_plugin_d1_midia&tab=midia&" . $query_string);
    $sql                = "UPDATE " . $wpdb->prefix ."d1_midia SET title='%s', content='%s',
    vehicle='%s', publication_date='%s' , link='%s' , url_img_bg='%s'
    WHERE id = %d";
    $wpdb->query($wpdb->prepare($sql,array($data['title'],$data['content'],$data['vehicle'],$data['publication_date'],
    $data['link'],$data['url_img_bg'],$data['id']
)));
}

header("location: " . $location);

