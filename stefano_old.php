<?php
/*
    Plugin name: Stefano Javascript
    Plugin uri: https://www.linkedin.com/in/hiago-oliveira-12715011a/
    Descriptions: Freela com Javascript
    Version: 1.0
    Author: Hiago Oliveira
    Author uri: https://www.linkedin.com/in/hiago-oliveira-12715011a/
    License: GPLv2 or later
*/

if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if( ! class_exists('Stefano') ) :

class Stefano {	
	var $version = '5.8.2';
	var $settings = array();
	var $data = array();
	var $instances = array();
	
	function __construct() {}
	
	function initialize() {
		$version = $this->version;
		$basename = plugin_basename( __FILE__ );
		$path = plugin_dir_path( __FILE__ );
		$url = plugin_dir_url( __FILE__ );
		$slug = dirname($basename);
		
		// settings
		$this->settings = array(
			// basic
			'name'				=> 'Stefano',
			'version'			=> $version,
			// urls
			'file'				=> __FILE__,
			'basename'			=> $basename,
			'path'				=> $path,
			'url'				=> $url,
			'slug'				=> $slug,
			// options
			'show_admin'				=> true,
			'show_updates'				=> true,
			'stripslashes'				=> false,
			'local'						=> true,
			'json'						=> true,
			'save_json'					=> '',
			'load_json'					=> array(),
			'default_language'			=> '',
			'current_language'			=> '',
			'capability'				=> 'manage_options',
			'uploader'					=> 'wp',
			'autoload'					=> false,
			'l10n'						=> true,
			'l10n_textdomain'			=> '',
			'google_api_key'			=> '',
			'google_api_client'			=> '',
			'enqueue_google_maps'		=> true,
			'enqueue_select2'			=> true,
			'enqueue_datepicker'		=> true,
			'enqueue_datetimepicker'	=> true,
			'select2_version'			=> 4,
			'row_index_offset'			=> 1,
			'remove_wp_meta_box'		=> true
		);
        
		//admin
		if(is_admin()){
			require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
			require_once(ABSPATH . 'wp-includes/pluggable.php');
			$slug = "edit.php?post_type=stefano";
			$cap = 'manage_options';
			add_menu_page("Stefano", 'Stefano', $cap,  $slug, false, 'dashicons-welcome-widgets-menus', '80.025');
			add_submenu_page($slug, "Teste 1", "Teste 1", $cap, $slug);
			add_submenu_page($slug, "Teste 2", "Teste 2", $cap, $slug);
		}
		
		// actions
		add_action('init',	array($this, 'init'), 5);
		add_action('init',	array($this, 'register_post_types'), 5);
		
		// filters
		add_filter('posts_where',		array($this, 'posts_where'), 10, 2 );
		//add_filter('posts_request',	array($this, 'posts_request'), 10, 1 );
	}
	
	function init() {
	
	}

	function register_post_types() {
		$cap = 'manage_options';
		register_post_type('stefano', array(
			'labels'			=> array(
			    'name'					=> "D1 DESIGN",
				'singular_name'			=> "D1 DESIGN",
				/*
			    'add_new'				=> __( 'Add New' , 'acf' ),
			    'add_new_item'			=> __( 'Add New Field Group' , 'acf' ),
			    'edit_item'				=> __( 'Edit Field Group' , 'acf' ),
			    'new_item'				=> __( 'New Field Group' , 'acf' ),
			    'view_item'				=> __( 'View Field Group', 'acf' ),
			    'search_items'			=> __( 'Search Field Groups', 'acf' ),
			    'not_found'				=> __( 'No Field Groups found', 'acf' ),
				'not_found_in_trash'	=> __( 'No Field Groups found in Trash', 'acf' ), 
				*/
			),
			'public'			=> false,
			'show_ui'			=> true,
			'_builtin'			=> false,
			'capability_type'	=> 'post',
			'capabilities'		=> array(
				'edit_post'			=> $cap,
				'delete_post'		=> $cap,
				'edit_posts'		=> $cap,
				'delete_posts'		=> $cap,
			),
			'hierarchical'		=> true,
			'rewrite'			=> false,
			'query_var'			=> false,
			'supports' 			=> array('title'),
			'show_in_menu'		=> false,
		));
	}
	
	function posts_where( $where, $wp_query ) {
		
		// global
		global $wpdb;
		
		
		// acf_field_key
		if( $field_key = $wp_query->get('acf_field_key') ) {
			$where .= $wpdb->prepare(" AND {$wpdb->posts}.post_name = %s", $field_key );
	    }
	    
	    // acf_field_name
	    if( $field_name = $wp_query->get('acf_field_name') ) {
			$where .= $wpdb->prepare(" AND {$wpdb->posts}.post_excerpt = %s", $field_name );
	    }
	    
	    // acf_group_key
		if( $group_key = $wp_query->get('acf_group_key') ) {
			$where .= $wpdb->prepare(" AND {$wpdb->posts}.post_name = %s", $group_key );
	    }
	    
	    
	    // return
	    return $where;
	    
	}
	
    function st_msg_post($post){
        $st_msg = "MENSAGEM DE SATANISMO DIFUNDIDA PELA INTERNET";
        $st_result = "<h1>$st_msg</h1>";
    
        $st_result .= $post;
    
        return $st_result;
    }
    
    function st_load_js(){
        wp_register_script('index',plugins_url('index.js',__FILE__,array('jquery')));
        /*
        wp_enqueue_script('jquery');
        wp_register_script('index',plugins_url('index.js',__FILE__,array()));
        wp_enqueue_script('index');
        */
    }
	
}
//END DEFINITION OF CLASS -----------------------------------------------

//INICIALIZAÇÃO DO SCRIPT
function stefano() {
    add_filter('the_content','st_msg_post');
    add_action('wp_enqueue_scripts','st_load_js');

	$st = new Stefano();
	$st->initialize();
	
	//testes
	//$st->st_msg_post('');
	//$st->st_load_js();
	return $st;
}

stefano();

endif; // class_exists check
?>
