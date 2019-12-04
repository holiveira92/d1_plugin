<?php
define( 'SHORTINIT', true );
require(trim($_REQUEST["path_wp"]) . "wp-load.php");
global $wpdb;

$id_cargo            = !empty($_REQUEST["id_cargo"]) ? $_REQUEST["id_cargo"]: false;
$wpdb->query($wpdb->prepare("DELETE FROM ". $wpdb->prefix . "d1_cargos WHERE id=%s;",array($id_cargo)));
header("location: " . $_REQUEST["url_location"]);
