<?php




define( 'SHORTINIT', true );
require(trim($_REQUEST["path_wp"]) . "wp-load.php");
global $wpdb;

$number             = !empty($_REQUEST["question"]) ? count($_REQUEST["question"]) : false;
$ids_delete         = !empty($_REQUEST["json_delete"]) ? explode(',',$_REQUEST["json_delete"]) : array();
$table_data         = array();
$url_location       = urldecode($_REQUEST["url_location"]);

if($number == 0){
    header("location: " . $url_location);
}

for($i=0; $i<$number; $i++){
    $table_data[] = array(
        'id'                   => !empty($_REQUEST["id"][$i]) ? $_REQUEST["id"][$i] : '',
        'question'            => !empty($_REQUEST["question"][$i]) ? $_REQUEST["question"][$i] : '',
        'answer'         => !empty($_REQUEST["answer"][$i]) ? $_REQUEST["answer"][$i] : '',
        'page'     =>!empty($_REQUEST["page"][$i]) ? $_REQUEST["page"][$i] : '',
    );
}

foreach($table_data as $key=>&$value){
    if(empty($value['id'])){
        unset($value['id']);
        //insert
        $fields                 = implode("','",$value);
        $sql                    = "INSERT INTO " . $wpdb->prefix . "d1_faq(question,answer,page) VALUES('$fields')";
        $wpdb->query($wpdb->prepare($sql,array()));
    }else{
        //update
        $id                     = $value['id'];
        $question               = $value['question'];
        $answer                 = $value['answer'];
        $page             = $value['page'];
        $sql                    = "UPDATE " . $wpdb->prefix ."d1_faq SET question='%s', answer='%s', page='%s' WHERE id = '%s';";
        $wpdb->query($wpdb->prepare($sql,array($question,$answer,$page,$id)));
    }
}

if(!empty($ids_delete[0])){
    foreach($ids_delete as $id){
        $wpdb->query($wpdb->prepare("DELETE FROM ". $wpdb->prefix . "d1_faq WHERE id=$id;",array()));
    }
}

header("location: " . $url_location);