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

$number             = !empty($_REQUEST["title_card"]) ? count($_REQUEST["title_card"]) : false;
$ids_delete         = !empty($_REQUEST["json_delete"]) ? explode(',',$_REQUEST["json_delete"]) : array();
$table_data         = array();

if(empty($_REQUEST["title_card"])){
    header("location: " . urldecode($_REQUEST["url_location"]));
}

for($i=0; $i<$number; $i++){
    $table_data[] = array(
        'id_card'               => !empty($_REQUEST["id_card"][$i]) ? $_REQUEST["id_card"][$i] : '',
        'title_card'            => !empty($_REQUEST["title_card"][$i]) ? $_REQUEST["title_card"][$i] : '',
        'subtitle_card'         => !empty($_REQUEST["subtitle_card"][$i]) ? $_REQUEST["subtitle_card"][$i] : '',
        'text_footer_card'      => !empty($_REQUEST["text_footer_card"][$i]) ? $_REQUEST["text_footer_card"][$i] : '',
        'subtext_footer_card'   => !empty($_REQUEST["subtext_footer_card"][$i]) ? $_REQUEST["subtext_footer_card"][$i] : '',
        'card_link'             => !empty($_REQUEST["card_link"][$i]) ? $_REQUEST["card_link"][$i] : '',
        'img_bg_url'            => !empty($_REQUEST["img_bg_url"][$i]) ? urldecode($_REQUEST["img_bg_url"][$i]) : '',
        //'detach_card_val'       => !empty($_REQUEST["detach_card"][$i]) ? $_REQUEST["detach_card"][$i] : 0,
        'detach_card'           => !empty($_REQUEST["detach_card_hidden"][$i]) ? $_REQUEST["detach_card_hidden"][$i] : 0,
    );
}
foreach($table_data as $key=>&$value){
    
    if(empty($value['id_card'])){
        unset($value['id_card']);
        //insert
        $fields                 = implode("','",$value);
        $sql                    = "INSERT INTO " . $wpdb->prefix . D1_LANG . "d1_cases(title_card,subtitle_card,text_footer_card,subtext_footer_card,card_link,img_bg_url,detach_card) VALUES('$fields')";
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
        $detach_card            = $value['detach_card'];
        $sql                    = "UPDATE " . $wpdb->prefix . D1_LANG ."d1_cases SET title_card='$title_card', subtitle_card='$subtitle_card', text_footer_card='$text_footer_card',
         subtext_footer_card='$subtext_footer_card', card_link='$card_link', img_bg_url='$img_bg_url' , detach_card='$detach_card' WHERE id_card = '$id_card';";
        $wpdb->query($wpdb->prepare($sql,array()));
    }
}

if(!empty($ids_delete[0])){
    foreach($ids_delete as $id){
        $wpdb->query($wpdb->prepare("DELETE FROM ". $wpdb->prefix . D1_LANG . "d1_cases WHERE id_card=$id;",array()));
    }
}

header("location: " . $_REQUEST["url_location"]);