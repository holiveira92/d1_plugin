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
$id_card            = !empty($_REQUEST["id_wp"]) ? $_REQUEST["id_wp"]: false;
$wpdb->query($wpdb->prepare("DELETE FROM ". $wpdb->prefix . D1_LANG . "d1_cases WHERE id_card=%s;",array($id_card)));
header("location:    " . $_REQUEST["url_location"]);