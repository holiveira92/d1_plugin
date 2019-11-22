<?php
define( 'SHORTINIT', true );
require(trim($_REQUEST["path_wp"]) . "wp-load.php");
global $wpdb;

$id_midia            = !empty($_REQUEST["id_midia"]) ? $_REQUEST["id_midia"]: false;
$wpdb->query($wpdb->prepare("DELETE FROM ". $wpdb->prefix . "d1_midia WHERE id=%s;",array($id_midia)));
header("location: " . $_REQUEST["url_location"]);
