<?php
function dirname_path($path, $level = 0)
{
    $dir = explode(DIRECTORY_SEPARATOR, $path);
    $level = $level * -1;
    if ($level == 0) $level = count($dir);
    array_splice($dir, $level);
    return implode($dir, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;
}
require(dirname_path(__FILE__,6) . "wp-load.php");
$language = get_option('d1_lang_option');
$language = ($language == "PT" || empty($language) || $language == "_") ? "" : "_$language";
define("D1_LANG", $language);