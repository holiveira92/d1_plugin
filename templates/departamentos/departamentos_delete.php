<?php
define( 'SHORTINIT', true );
require(trim($_REQUEST["path_wp"]) . "wp-load.php");
global $wpdb;

$id_modulo            = !empty($_REQUEST["id_modulo"]) ? $_REQUEST["id_modulo"]: false;
$wpdb->query($wpdb->prepare("DELETE FROM ". $wpdb->prefix . "d1_departamentos WHERE id=%s;",array($id_modulo)));
header("location: " . $_REQUEST["url_location"]);
