<?php
class D1PluginActivate{
	
	public function __construct(){}
	public static function activate() {
		flush_rewrite_rules();
		require_once( ABSPATH . '/wp-admin/includes/upgrade.php' );
		global $table_prefix, $wpdb;
		$tblname 		= array();
		$json 			= file_get_contents(plugin_dir_path(dirname_safe(__FILE__,2)) . "includes/base/database.json"); 
		$tables 		= json_decode($json,true);
		$tables 		= !empty($tables) ? $tables : array();
		foreach($tables as $tblname=>$sql_create){
			$wp_track_table = $table_prefix . "$tblname";
			if($wpdb->get_var("SHOW TABLES LIKE '$wp_track_table'") != $wp_track_table) {
				$normalize_sql = str_replace($tblname,$table_prefix . "$tblname",$sql_create);
				dbDelta($normalize_sql);
			}
		}
	}
}