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
1 - CRIAR E TESTAR SCRIPT DE CREATE OPTIONS NO BD - PRONTO!
2 - TESTAR SCRIPT DE INSTALAÇÃO/DESINSTALAÇÃO DO PLUGIN QUE APAGA DADOS NO BD(VERIFICAR NECESSIDADE)
3 - VERIFICAR ANEXOS DE JS E CSS PARA PAINEL DE ADM E TELA PRINCIPAL
4 - UTILIZAR BIBLIOTECA PARA LINGUAGENS
5 - CRIAR SHORTCODES PARA COMPONENTES DA VIEW(VERIFICAR VIABILIDADE)
6 - MOTIVO PARA CRIAR PROPRIA API DE CONFIGURAÇÕES E NÃO USAR DA WORDPRESS: https://wpshout.com/wordpress-options-page/ - (VERIFICAR VIABILIDADE)
7 - TROCAR NOME DA CLASSE ADMIN PARA HOME OU PAGINA PRINCIPAL
8 - ESPERAR INFORMAÇÕES SOBRE AS LOGOS UTILIZADAS NAS PAGINAS
9 - MELHORAR JSON DE CAMPOS
10 - CRIAR FUNÇÃO DE DELETAR IMAGENS(EXISTE O BOTÃO MAS AINDA NÃO EXISTE AÇÃO)

TODO - reunião 22/09
inserir seo e meta key words nos nomes das páginas - instalar https://yoast.com/wordpress/plugins/seo/ para fazer isso - OK
migração para hubspot - OK
espaço nos nomes da seções - OK
cadastro de cases para criar cards - 98% OK
links dos cards na home - criar opção - OK
header , footer e cta salvos em lugares unicos - NOT OK
bug inserir card não consegue inserir imagem sem salvar primeiro - NOT OK
nas configs da home inserir select para buscar cadastro de cases
*/

defined('ABSPATH') or die('Access Denied!');

if(!class_exists('D1Plugin')){

function pre($data) {
    echo "<pre>";
        print_r($data);
    echo "</pre>";
}

//Utilizar essa função apenas para modo compatibilidade com PHP menor que 7
function dirname_safe($path, $level = 0){
    $dir = explode(DIRECTORY_SEPARATOR, $path);
    $level = $level * -1;
    if($level == 0) $level = count($dir);
    array_splice($dir, $level);
    return implode($dir, DIRECTORY_SEPARATOR).DIRECTORY_SEPARATOR;
}

class D1Plugin{  
    public $plugin;
    function __construct() {
        $this->plugin = plugin_basename( __FILE__ );
        $this->whitelist_plugin = array('d1_plugin','d1_plugin_solucoes','d1_plugin_conteudo','d1_plugin_preco','d1_plugin_sobre','d1_plugin_especialista','upload.php','wpseo_dashboard',
        'd1_plugin_header_menu','d1_plugin_footer','d1_plugin_cta');
        require_once  dirname(__FILE__).'/includes/fields/admin_fields.php';
        require_once  dirname(__FILE__).'/includes/fields/cases_fields.php';
        $this->admin_fields = new Admin_Fields();
        $this->cases_fields = new Cases_Fields();
    }

    function add_custom_options_page(){
        add_filter('whitelist_options',array($this,'setWhitelistOptions'));
    }
    
    function setWhitelistOptions($whitelist_options){
        $home_options_settings = $this->admin_fields->getSettings();
        $cases_options_settings = $this->cases_fields->getSettings();
        $all_options_settings = array_merge($home_options_settings,$cases_options_settings);
        foreach($all_options_settings as $option){
            foreach($option as $key=>$setting){
                $whitelist_options[$setting['option_group']][] = $setting['option_name'];
            }
        }
        return $whitelist_options;
    }

    function register(){
        add_action('init',array($this,'custom_post_type'));
        add_action('admin_enqueue_scripts', array($this,'admin_enqueue'));//inserindo script para tela admin
        add_action('wp_enqueue_scripts', array($this,'main_enqueue'));//inserindo script para tela principal
        add_action('admin_menu',array($this,'add_admin_pages'));
        add_filter("plugin_action_links_$this->plugin",array($this,'settings_link'));
        add_action('admin_menu',array($this,'custom_menu_page_removing'));
        add_action('admin_head',array($this,'replace_admin_menu_icons_css'));
        $this->add_custom_options_page();
    }
    
    public function settings_link( $links ) {
        $settings_link = '<a href="admin.php?page=d1_plugin">Configurações</a>';
        array_push( $links, $settings_link );
        return $links;
    }

    public function add_admin_pages() {
        /* HOME PAGE */
        add_menu_page('Página Inicial','Página Inicial','manage_options','d1_plugin',array($this,'admin_index'), get_template_directory_uri()."/images/d1_logo_admin.ico",110);
        add_submenu_page('d1_plugin','Plataforma','Plataforma','manage_options','d1_plugin_plataforma',array($this,'plataforma_admin')); 

        /* SOLUÇÕES */
        add_menu_page('Soluções','Soluções','manage_options','d1_plugin_solucoes',array($this,'admin_index'),'dashicons-admin-site-alt3',111);
        add_submenu_page('d1_plugin_solucoes','Segmentos','Segmentos','manage_options','d1_plugin_segmentos',''); 
        add_submenu_page('d1_plugin_solucoes','Departamentos','Departamenos','manage_options','d1_plugin_departamentos',''); 
        add_submenu_page('d1_plugin_solucoes','Objetivos de Negócio','Objetivos de Negócio','manage_options','d1_plugin_obj_negocio',''); 

        /* CONTEÚDO */
        add_menu_page('Conteúdo','Conteúdo','manage_options','d1_plugin_conteudo',array($this,'admin_index'),'dashicons-welcome-widgets-menus',112);
        add_submenu_page('d1_plugin_conteudo','Cases','Cases','manage_options','d1_plugin_cases',array($this,'cases_admin')); 
        add_submenu_page('d1_plugin_conteudo','Blog','Blog','manage_options','d1_plugin_blog',''); 
        add_submenu_page('d1_plugin_conteudo','Whitepapers','Whitepapers','manage_options','d1_plugin_whitepapers',''); 
        add_submenu_page('d1_plugin_conteudo','Webinários','Webinários','manage_options','d1_plugin_webinarios',''); 
        
        /* PREÇO */
        add_menu_page('Preço','Preço','manage_options','d1_plugin_preco',array($this,'admin_index'),'dashicons-cart',113);

        /* SOBRE */
        add_menu_page('Sobre','Sobre','manage_options','d1_plugin_sobre',array($this,'admin_index'),'dashicons-info',114);

        /* FALAR COM ESPECIALISTA */
        add_menu_page('Falar com Especialista','Falar com Especialista','manage_options','d1_plugin_especialista',array($this,'admin_index'),'dashicons-businessperson',115);

        /* HEADER MENU, FOOTER, CTA */
        add_menu_page('Header Menu','Header Menu','manage_options','d1_plugin_header_menu','','',116);
        add_menu_page('Footer','Footer','manage_options','d1_plugin_footer','','',117);
        add_menu_page('Call To Action','Call To Action','manage_options','d1_plugin_cta','','',118);    
    }

    public function admin_index(){
        require_once plugin_dir_path( __FILE__ ) . 'includes/pages/admin.php';
        $adm = new Admin();
        $adm->register();
        require_once plugin_dir_path( __FILE__ ) . 'templates/admin.php';
    }

    public function plataforma_admin() {
        
    }

    public function cases_admin() {
        require_once plugin_dir_path( __FILE__ ) . 'includes/pages/cases.php';
        $cases = new Cases();
        $cases->register();
        require_once plugin_dir_path( __FILE__ ) . 'templates/cases.php';
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
        wp_register_script('d1_upload',plugins_url('resources/d1_upload.js',__FILE__),array('jquery','media-upload','thickbox'));
        wp_register_script('d1_admin',plugins_url('resources/d1_admin.js',__FILE__),array('jquery'));
        wp_enqueue_script('jquery');
        wp_enqueue_script('thickbox');
        wp_enqueue_style('thickbox');
        wp_enqueue_script('media-upload');
        wp_enqueue_script('d1_upload');
        wp_enqueue_script('d1_admin');
    }
    
    function custom_menu_page_removing(){
        global $submenu, $menu;
        $menu_item = array_values($menu);
        $post_types = get_post_types();
        foreach($menu_item as $key=>$m){
            if(!empty($m[2]) && !in_array($m[2],$this->whitelist_plugin)){
                remove_menu_page($m[2]);
            }
        }
    }

    function replace_admin_menu_icons_css() {
        ?><style>#adminmenu .wp-menu-image img {padding:0 !important;}</style><?php
    }
}
    //Inicialização do plugin
    $d1 = new D1Plugin();
    $d1->register();
    
    //activation
    register_activation_hook( __FILE__, array( $d1,'activate'));
    
    //deactivation
    require_once plugin_dir_path( __FILE__ ) . 'includes/base/d1_plugin_deactivate.php';
    register_deactivation_hook( __FILE__,array('D1PluginDeactivate','deactivate'));
}