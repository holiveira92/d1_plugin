<?php
define( 'SHORTINIT', true );
require(trim($_REQUEST["path_wp"]) . "wp-load.php");
global $wpdb;

$id_keyp            = !empty($_REQUEST["id_keyp"]) ? $_REQUEST["id_keyp"]: false;
$wpdb->query($wpdb->prepare("DELETE FROM ". $wpdb->prefix . "d1_key_points WHERE id=%s;",array($id_keyp)));
header("location: " . $_REQUEST["url_location"]);
