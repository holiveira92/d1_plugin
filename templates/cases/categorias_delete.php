<?php
function pre($data) {
    echo "<pre>";
        print_r($data);
    echo "</pre>";
}

define( 'SHORTINIT', true );
require(trim($_REQUEST["path_wp"]) . "wp-load.php");
global $wpdb;

$id_categoria            = !empty($_REQUEST["id_categoria"]) ? $_REQUEST["id_categoria"]: false;
$wpdb->query($wpdb->prepare("DELETE FROM ". $wpdb->prefix . "d1_cases_categorias WHERE id=%s;",array($id_categoria)));
$wpdb->query($wpdb->prepare("DELETE FROM ". $wpdb->prefix . "d1_cases_categorias WHERE id_categoria=%s;",array($id_categoria)));
header("location: " . $_REQUEST["url_location"]);
