<?php 
function pre($data) {
	echo "<pre>";
	   print_r($data);
	echo "</pre>";
}

class Admin{
	public $settings;
	public $callbacks;
	public $pages = array();
	public $subpages = array();

	function __construct(){
		require_once  dirname(__FILE__).'/../fields/admin_fields.php';
		$this->admin_fields = new Admin_Fields();
	}
	
	public function register(){
		$this->plugin_path = plugin_dir_path( dirname( __FILE__, 2 ) );
		$this->plugin_url = plugin_dir_url( dirname( __FILE__, 2 ) );
		$this->plugin = plugin_basename( dirname( __FILE__, 3 ) ) . '/d1_plugin.php';
		$this->setPages();
		$this->setSettings();
		$this->setSections();
		$this->setFields();
		$this->registerCustomFields();
	}

	private function add_settings_section( $id, $title, $cb, $page ){
		add_settings_section( $id, $title, $cb, $page );
		if( $id != $page ){
			if( !isset($this->page_sections[$page]))
				$this->page_sections[$page] = array();
			$this->page_sections[$page][$id] = $id;
		}
	}
	
	public function registerCustomFields(){
		// register setting
		foreach ( $this->settings as $setting ) {
			register_setting( $setting["option_group"], $setting["option_name"], ( isset( $setting["callback"] ) ? $setting["callback"] : '' ) );
		}
		
		// add settings section
		foreach ( $this->sections as $section ) {
			//add_settings_section( $section["id"], $section["title"], ( isset( $section["callback"] ) ? $section["callback"] : '' ), $section["page"] );
			$this->add_settings_section( $section["id"], $section["title"], ( isset( $section["callback"] ) ? $section["callback"] : '' ), $section["page"] );
		}

		// add settings field
		foreach ( $this->fields as $field ) {
			//add_settings_field( $field["id"], $field["title"], ( isset( $field["callback"] ) ? $field["callback"] : '' ), $field["page"], $field["section"], ( isset( $field["args"] ) ? $field["args"] : '' ) );
			$this->add_settings_section( $field["id"], $field["title"], ( isset( $field["callback"] ) ? $field["callback"] : '' ), $field["page"], $field["section"], ( isset( $field["args"] ) ? $field["args"] : '' ) );
		}

		if ( !empty($this->settings) ) {
			add_action( 'admin_init', array( $this, 'registerCustomFields' ) );
		}
	}

	public function setPages(){
		$this->pages = array(
			array(
				'page_title' => 'D1 Plugin', 
				'menu_title' => 'D1', 
				'capability' => 'manage_options', 
				'menu_slug' => 'd1_plugin', 
				'callback' => array(), 
				'icon_url' => 'dashicons-store', 
				'position' => 110
			)
		);

	}

	public function setSettings(){
		$d1_options_group =  $this->admin_fields->getSettings('d1_options_group');
		$secao1_options_group =  $this->admin_fields->getSettings('secao1_options_group');
		$this->settings = array_merge($d1_options_group,$secao1_options_group);
	}

	public function setSections(){
		$this->sections = array(
			array(
				'id' => 'd1_admin_index',
				'title' => 'Configurações Gerais',
				'callback' => array( $this, 'd1AdminConfGeral' ),
				'page' => 'd1_plugin'
			),
			array(
				'id' => 'd1_admin_secao1',
				'title' => 'Configurações Seção 1 - Hero',
				'callback' => array( $this, 'd1Section1Hero' ),
				'page' => 'd1_plugin'
			),
		);
	}

	public function setFields(){
		$d1_admin_data = $this->admin_fields->getFields('d1_admin_index');
		$d1_admin_secao1_data = $this->admin_fields->getFields('d1_admin_secao1');
		$this->fields = array_merge($d1_admin_data,$d1_admin_secao1_data);
	}

	public function d1AdminConfGeral(){ echo 'Opções de Navegação';}
	public function d1Section1Hero(){ echo 'Seção 1 - Hero';}
}