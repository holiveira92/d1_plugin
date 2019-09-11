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
    private $active_tab;

	function __construct(){
		require_once  dirname(__FILE__).'/../fields/admin_fields.php';
        $this->admin_fields = new Admin_Fields();
        $this->active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'config_geral';
	}
	
	public function register(){
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
        switch($this->active_tab){
            case 'config_geral': 
                $this->settings =  $this->admin_fields->getSettings('d1_options_group');
                break;
            case 'secao1': 
                $this->settings =  $this->admin_fields->getSettings('secao1_options_group');
				break;
			case 'secao2': 
                $this->settings =  $this->admin_fields->getSettings('secao2_options_group');
                break;
            default:
                $this->settings =  $this->admin_fields->getSettings('d1_options_group');
                break;
        }
	}

	public function setSections(){
        switch($this->active_tab){
            case 'config_geral': 
				$this->sections = array(
					array(
						'id' => 'd1_admin_index',
						'title' => 'Configurações Gerais',
						'callback' => array( $this, 'd1AdminConfGeral' ),
						'page' => 'd1_plugin'
					),
				);
				break;
            case 'secao1': 
				$this->sections = array(
					array(
						'id' => 'd1_admin_secao1',
						'title' => 'Configurações Seção 1 - Hero',
						'callback' => array( $this, 'd1Section1Hero' ),
						'page' => 'd1_plugin'
					),
				);
				break;
			case 'secao2': 
				$this->sections = array(
					array(
						'id' => 'd1_admin_secao2',
						'title' => 'Configurações Seção 2 - Cases de Sucesso',
						'callback' => array( $this, 'd1Section2Cases' ),
						'page' => 'd1_plugin'
					),
				);
				break;
            default:
				$this->sections = array(
					array(
						'id' => 'd1_admin_index',
						'title' => 'Configurações Gerais',
						'callback' => array( $this, 'd1AdminConfGeral' ),
						'page' => 'd1_plugin'
					),
				);
				break;
        }
	}

	public function setFields(){
        switch($this->active_tab){
            case 'config_geral': 
                $this->fields =  $this->admin_fields->getFields('d1_admin_index');
                break;
            case 'secao1': 
                $this->fields =  $this->admin_fields->getFields('d1_admin_secao1');
				break;
			case 'secao2': 
                $this->fields =  $this->admin_fields->getFields('d1_admin_secao2');
                break;
            default:
                $this->fields =  $this->admin_fields->getFields('d1_admin_index');
                break;
        }
	}

	public function d1AdminConfGeral(){ echo 'Opções de Navegação';}
	public function d1Section1Hero(){ echo 'Seção 1 - Hero';}
	public function d1Section2Cases(){ echo 'Seção 2 - Cases de Sucesso';}
}