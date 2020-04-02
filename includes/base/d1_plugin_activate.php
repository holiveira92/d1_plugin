<?php
class D1PluginActivate{
	
	public function __construct(){}
    public static function activate(){
        d1_add_rewrite_rules();
        flush_rewrite_rules();
        require_once( ABSPATH . '/wp-admin/includes/upgrade.php' );
        global $table_prefix, $wpdb;
        $tblname 		= array();
        $json 			= file_get_contents(plugin_dir_path(dirname_safe(__FILE__,2)) . "includes/base/database.json"); 
        $tables 		= json_decode($json,true);
        $tables 		= !empty($tables) ? $tables : array();
        $languages      = array("PT","EN","ES");
        foreach($tables as $tblname=>$sql_create){
            foreach($languages as $lang){
                $wp_track_table = ($lang == "PT") ? $table_prefix . "$tblname" : $table_prefix . "$lang" . "_" . "$tblname";
                if($wpdb->get_var("SHOW TABLES LIKE '$wp_track_table'") != $wp_track_table) {
                    $normalize_sql = str_replace($tblname,$wp_track_table,$sql_create);
                    dbDelta($normalize_sql);
                }
            }
        }
    }
}

function d1_add_rewrite_rules(){
	//reescrevendo url de segmentos
	add_rewrite_rule('segmentos/([^/]+)/([0-9]+)',
	'index.php?pagename=segmentos&slug=$matches[1]&id=$matches[2]',
	'top');

	//reescrevendo url de case individual
	add_rewrite_rule('case/([^/]+)/([0-9]+)',
	'index.php?pagename=case&slug=$matches[1]&id=$matches[2]',
	'top');

	//reescrevendo url de departamentos
	add_rewrite_rule('departamentos/([^/]+)/([0-9]+)',
	'index.php?pagename=departamentos&slug=$matches[1]&id=$matches[2]',
	'top');

	//reescrevendo url de modulos
	add_rewrite_rule('modulos/([^/]+)/([0-9]+)',
	'index.php?pagename=modulos&slug=$matches[1]&id=$matches[2]',
	'top');	

	//reescrevendo url de objetivos
	add_rewrite_rule('objetivos/([^/]+)/([0-9]+)',
	'index.php?pagename=objetivos&slug=$matches[1]&id=$matches[2]',
	'top');	
}
