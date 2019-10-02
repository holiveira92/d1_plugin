<?php
define( 'SHORTINIT', true );
require(trim($_REQUEST["path_wp"]) . "wp-load.php");
global $wpdb;

$number             = !empty($_REQUEST["title_card"]) ? count($_REQUEST["title_card"]) : false;
$ids_delete         = !empty($_REQUEST["json_delete"]) ? explode(',',$_REQUEST["json_delete"]) : array();
$table_data         = array();

if(empty($_REQUEST["title_card"])){
    header("location: " . $_REQUEST["url_location"]);
}

for($i=0; $i<$number; $i++){
    $table_data[] = array(
        'id_card'               => !empty($_REQUEST["id_card"][$i]) ? $_REQUEST["id_card"][$i] : '',
        'title_card'            => !empty($_REQUEST["title_card"][$i]) ? $_REQUEST["title_card"][$i] : '',
        'subtitle_card'         => !empty($_REQUEST["subtitle_card"][$i]) ? $_REQUEST["subtitle_card"][$i] : '',
        'text_footer_card'      => !empty($_REQUEST["text_footer_card"][$i]) ? $_REQUEST["text_footer_card"][$i] : '',
        'subtext_footer_card'   => !empty($_REQUEST["subtext_footer_card"][$i]) ? $_REQUEST["subtext_footer_card"][$i] : '',
        'card_link'             => !empty($_REQUEST["card_link"][$i]) ? $_REQUEST["card_link"][$i] : '',
        'img_bg_url'            => !empty($_REQUEST["img_bg_url"][$i]) ? $_REQUEST["img_bg_url"][$i] : '',
    );
}
foreach($table_data as $key=>&$value){
    
    if(empty($value['id_card'])){
        unset($value['id_card']);
        //insert
        $fields                 = implode("','",$value);
        $sql                    = "INSERT INTO " . $wpdb->prefix . "d1_cases(title_card,subtitle_card,text_footer_card,subtext_footer_card,card_link,img_bg_url) VALUES('$fields')";
        //$wpdb->insert($wpdb->prefix . "d1_cases", $value);
        $wpdb->query($wpdb->prepare($sql,array()));
    }else{
        //update
        $id_card                = $value['id_card'];
        $title_card             = $value['title_card'];
        $subtitle_card          = $value['subtitle_card'];
        $text_footer_card       = $value['text_footer_card'];
        $subtext_footer_card    = $value['subtext_footer_card'];
        $card_link              = $value['card_link'];
        $img_bg_url             = $value['img_bg_url'];
        $sql                    = "UPDATE " . $wpdb->prefix ."d1_cases SET title_card='$title_card', subtitle_card='$subtitle_card', text_footer_card='$text_footer_card',
         subtext_footer_card='$subtext_footer_card', card_link='$card_link', img_bg_url='$img_bg_url' WHERE id_card = '$id_card';";
         	
        //$wpdb->update($wpdb->prefix . "d1_cases", $value, "id_card = $id_card");
        $wpdb->query($wpdb->prepare($sql,array()));
    }
}

if(!empty($ids_delete[0])){
    foreach($ids_delete as $id){
        $wpdb->query($wpdb->prepare("DELETE FROM ". $wpdb->prefix . "d1_cases WHERE id_card=$id;",array()));
    }
}

header("location: " . $_REQUEST["url_location"]);