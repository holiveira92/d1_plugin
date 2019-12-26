<?php


define( 'SHORTINIT', true );
require(trim($_REQUEST["path_wp"]) . "wp-load.php");
global $wpdb;

$id_card            = !empty($_REQUEST["id_card"]) ? $_REQUEST["id_card"]: false;
$wpdb->query($wpdb->prepare("DELETE FROM ". $wpdb->prefix . "d1_cases WHERE id_card=%s;",array($id_card)));
header("location: " . $_REQUEST["url_location"]);
