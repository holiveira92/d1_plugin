<?php
define( 'SHORTINIT', true );
require(trim($_REQUEST["path_wp"]) . "wp-load.php");
global $wpdb;

$id_hero            = !empty($_REQUEST["id_hero"]) ? $_REQUEST["id_hero"]: false;
$wpdb->query($wpdb->prepare("DELETE FROM ". $wpdb->prefix . "d1_home_hero WHERE id=%s;",array($id_hero)));
header("location: " . $_REQUEST["url_location"]);
