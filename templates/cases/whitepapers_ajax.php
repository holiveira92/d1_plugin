<?php




define( 'SHORTINIT', true );
require(trim($_REQUEST["path_wp"]) . "wp-load.php");
global $wpdb;
$id_wp                      = !empty($_REQUEST["id_wp"]) ? $_REQUEST["id_wp"]: false;
$location                   = urldecode($_REQUEST["url_location"]);
$data = array(
    'id_card'               => !empty($_REQUEST["id_card"]) ? $_REQUEST["id_card"] : '',
    'title_card'            => !empty($_REQUEST["title_card"]) ? $_REQUEST["title_card"] : '',
    'subtitle_card'         => !empty($_REQUEST["subtitle_card"]) ? $_REQUEST["subtitle_card"] : '',
    'text_footer_card'      => !empty($_REQUEST["text_footer_card"]) ? $_REQUEST["text_footer_card"] : '',
    'subtext_footer_card'   => !empty($_REQUEST["subtext_footer_card"]) ? $_REQUEST["subtext_footer_card"] : '',
    'card_link'             => !empty($_REQUEST["card_link"]) ? $_REQUEST["card_link"] : '',
    'img_bg_url'            => !empty($_REQUEST["img_bg_url"]) ? urldecode($_REQUEST["img_bg_url"]) : '',
    'cases_options'         => json_encode(array('is_whitepaper' => true))
);

//insert
if(empty($id_wp)){
    $sql           = "INSERT INTO " . $wpdb->prefix . "d1_cases
    (title_card,subtitle_card,text_footer_card,subtext_footer_card,card_link,img_bg_url,cases_options)
    VALUES('%s','%s','%s','%s','%s','%s','%s')";
    $wpdb->query($wpdb->prepare($sql,array(
        $data['title_card'],$data['subtitle_card'],$data['text_footer_card'],$data['subtext_footer_card'],
        $data['card_link'],$data['img_bg_url'],$data['cases_options']
    )));
    $id_wp              = $wpdb->insert_id;
    $param              = array('path_wp' => $_REQUEST["path_wp"], 'id_wp' => $id_wp, 'url_location' => $_REQUEST["admin_url"]);
    $query_string       = http_build_query($param);
    $location           = urldecode($_REQUEST["admin_url"] . "admin.php?page=d1_plugin_cases&tab=whitepaper&" . $query_string);
}
//update
else{
    $param              = array('path_wp' => $_REQUEST["path_wp"], 'id_wp' => $id_wp, 'url_location' => $_REQUEST["admin_url"]);
    $query_string       = http_build_query($param);
    $location           = urldecode($_REQUEST["admin_url"] . "admin.php?page=d1_plugin_cases&tab=whitepaper&" . $query_string);
    $sql                = "UPDATE " . $wpdb->prefix ."d1_cases SET title_card='%s', subtitle_card='%s', text_footer_card='%s',
                            subtext_footer_card='%s', card_link='%s', img_bg_url='%s', cases_options='%s' WHERE id_card = %d";
    $wpdb->query($wpdb->prepare($sql,array($data['title_card'],$data['subtitle_card'],$data['text_footer_card'],$data['subtext_footer_card'],
                        $data['card_link'],$data['img_bg_url'],$data['cases_options'],$data['id_card'] )));
}

header("location: " . $location);