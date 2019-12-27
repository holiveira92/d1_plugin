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

$number             = !empty($_REQUEST["title"]) ? count($_REQUEST["title"]) : false;
$ids_delete         = !empty($_REQUEST["json_delete"]) ? explode(',',$_REQUEST["json_delete"]) : array();
$table_data         = array();
$url_location       = urldecode($_REQUEST["url_location"]);

if($number == 0){
    header("location: " . $url_location);
}

for($i=0; $i<$number; $i++){
    $table_data[] = array(
        'id'        => !empty($_REQUEST["id"][$i]) ? $_REQUEST["id"][$i] : '',
        'title'     => !empty($_REQUEST["title"][$i]) ? $_REQUEST["title"][$i] : '',
        'link'      => !empty($_REQUEST["link"][$i]) ? $_REQUEST["link"][$i] : '',
        'target'    => !empty($_REQUEST["target"][$i]) ? $_REQUEST["target"][$i] : '',
    );
}

foreach($table_data as $key=>&$value){
    if(empty($value['id'])){
        //insert
        $sql                    = "INSERT INTO " . $wpdb->prefix . D1_LANG . "d1_call_to_action(title,link,target) VALUES('%s','%s','%s')";
        $wpdb->query($wpdb->prepare($sql,array($value['title'],$value['link'],$value['target'])));
    }else{
        //update
        $sql                    = "UPDATE " . $wpdb->prefix . D1_LANG ."d1_call_to_action SET title='%s', link='%s', target='%s' WHERE id = '%s';";
        $wpdb->query($wpdb->prepare($sql,array($value['title'],$value['link'],$value['target'],$value['id'])));
    }
}

if(!empty($ids_delete[0])){
    foreach($ids_delete as $id){
        $wpdb->query($wpdb->prepare("DELETE FROM ". $wpdb->prefix . D1_LANG . "d1_call_to_action WHERE id=$id;",array()));
    }
}

header("location: " . $url_location);