<?php
define( 'SHORTINIT', true );
require(trim($_REQUEST["path_wp"]) . "wp-load.php");
global $wpdb;

$id_seg            = !empty($_REQUEST["id_seg"]) ? $_REQUEST["id_seg"]: false;
$wpdb->query($wpdb->prepare("DELETE FROM ". $wpdb->prefix . "d1_segmentos WHERE id=%s;",array($id_seg)));
$wpdb->query($wpdb->prepare("DELETE FROM ". $wpdb->prefix . "d1_key_points WHERE id_segmento=%s;",array($id_seg)));
header("location: " . $_REQUEST["url_location"]);
