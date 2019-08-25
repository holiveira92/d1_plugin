<?php
/*
    Plugin name: D1 Plugin
    Plugin uri: https://www.linkedin.com/in/hiago-oliveira-12715011a/
    Descriptions: D1 Design - Dinius
    Version: 1.0
    Author: Hiago Oliveira
    Author uri: https://www.linkedin.com/in/hiago-oliveira-12715011a/
    License: GPLv2 or later
*/

//TODO LIST
/*

1 - CRIAR E TESTAR SCRIPT DE CREATE NO BD
2 - TESTAR SCRIPT DE DESINSTALAÇÃO DO PLUGIN QUE APAGA DADOS NO BD
3 - VERIFICAR ANEXOS DE JS E CSS PARA PAINEL DE ADM E TELA PRINCIPAL
4 - UTILIZAR BIBLIOTECA PARA LINGUAGES
*/
defined('ABSPATH') or die('Access Denied!');
require_once plugin_dir_path( __FILE__ ) . 'includes/pages/admin.php';

if(!class_exists('D1Plugin')){

class D1Plugin{  
    public $plugin;

    function __construct() {
        $this->plugin = plugin_basename( __FILE__ );
        $this->autoload();
    }

    private function autoload(){

    }
    
    function register(){
        add_action('init',array($this,'custom_post_type'));
        add_action('admin_enqueue_scripts', array($this,'admin_enqueue'));//inserindo script para tela admin
        add_action('wp_enqueue_scripts', array($this,'main_enqueue'));//inserindo script para tela principal
        add_action('admin_menu',array($this,'add_admin_pages'));
        add_filter("plugin_action_links_$this->plugin",array($this,'settings_link'));
    }
    
    public function settings_link( $links ) {
        $settings_link = '<a href="admin.php?page=d1_plugin">Configurações</a>';
        array_push( $links, $settings_link );
        return $links;
    }

    public function add_admin_pages() {
        add_menu_page('D1 Plugin','D1 Plugin','manage_options','d1_plugin',array($this,'admin_index'),'',110);
    }

    public function admin_index() {
        require_once plugin_dir_path( __FILE__ ) . 'includes/pages/admin.php';
        $adm = new Admin();
        $adm->register();
        require_once plugin_dir_path( __FILE__ ) . 'templates/admin.php';
    }

	function activate(){
		require_once plugin_dir_path( __FILE__ ) . 'includes/base/d1_plugin_activate.php';
		D1PluginActivate::activate();
	}

    function custom_post_type(){
		//register_post_type('teste', array('public'=>true,'label'=>'Teste'));
    }
    
    function admin_enqueue(){
		// enqueue all our scripts
        //wp_enqueue_style( 'mypluginstyle', plugins_url( '/resources/mystyle.css', __FILE__ ) );
        //wp_register_script('index',plugins_url('/resources/index.js',__FILE__,array('jquery')));
		//wp_enqueue_script( 'index', plugins_url( '/resources/index.js', __FILE__ ));
    }
    
    function main_enqueue(){
		// enqueue all our scripts
        //wp_register_script('index',plugins_url('/resources/index.js',__FILE__,array('jquery')));
        //wp_enqueue_script('index', plugins_url( '/resources/index.js', __FILE__ ), array('jquery'), null, true);
	}
}

    $d1 = new D1Plugin();
    $d1->register();
    
    // activation
    register_activation_hook( __FILE__, array( $d1,'activate'));
    
    // deactivation
    require_once plugin_dir_path( __FILE__ ) . 'includes/base/d1_plugin_deactivate.php';
    register_deactivation_hook( __FILE__,array('D1PluginDeactivate','deactivate'));
    
}