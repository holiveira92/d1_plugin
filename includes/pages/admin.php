<?php 
class Admin{
	public $settings;
	public $callbacks;
	public $pages = array();
    public $subpages = array();
    private $active_tab;

	function __construct(){
		require_once  dirname(__FILE__).'/../fields/admin_fields.php';
		require_once plugin_dir_path(dirname_safe(__FILE__,2)) . 'includes/base/d1_upload.php';
		$this->d1_upload = new D1_Upload();
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
			$this->add_settings_section( $field["id"], '','', $field["page"], $field["section"], '' );
		}

		if ( !empty($this->settings) ) {
			add_action( 'admin_init', array( $this, 'registerCustomFields' ) );
		}
	}

	public function setPages(){
		/*
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
		*/
	}

	public function setSettings(){
        switch($this->active_tab){
            case 'config_geral': 
                $this->settings =  $this->admin_fields->getSettings('home_d1_options_group','d1_plugin');
                break;
            case 'secao1': 
                $this->settings =  $this->admin_fields->getSettings('home_secao1_options_group','d1_plugin');
				break;
			case 'secao2': 
                $this->settings =  $this->admin_fields->getSettings('home_secao2_options_group','d1_plugin');
                break;
            case 'secao3': 
                $this->settings =  $this->admin_fields->getSettings('home_secao3_options_group','d1_plugin');
                break;
            case 'secao4': 
                $this->settings =  $this->admin_fields->getSettings('home_secao4_options_group','d1_plugin');
                break;
            case 'secao5': 
                $this->settings =  $this->admin_fields->getSettings('home_secao5_options_group','d1_plugin');
                break;
            case 'secao6':
                $this->settings =  $this->admin_fields->getSettings('home_secao6_options_group','d1_plugin');
                break;
            case 'secao7': 
                $this->settings =  $this->admin_fields->getSettings('home_secao7_options_group','d1_plugin');
                break;
            default:
                $this->settings =  $this->admin_fields->getSettings('home_d1_options_group','d1_plugin');
                break;
        }
	}

	public function setSections(){
        switch($this->active_tab){
            case 'config_geral': 
				$this->sections = array(
					array(
						'id' => 'home_d1_admin_index',
						'title' => 'Configurações Gerais',
						'callback' => array( $this, 'd1AdminConfGeral' ),
						'page' => 'd1_plugin'
					),
				);
				break;
            case 'secao1': 
				$this->sections = array(
					array(
						'id' => 'home_d1_admin_secao1',
						'title' => 'Seção 1 - Hero',
						'callback' => array( $this, 'd1Section1Hero' ),
						'page' => 'd1_plugin'
					),
				);
				break;
			case 'secao2': 
				$this->sections = array(
					array(
						'id' => 'home_d1_admin_secao2',
						'title' => 'Seção 2 - Cases de Sucesso',
						'callback' => array( $this, 'd1Section2Cases' ),
						'page' => 'd1_plugin'
					),
				);
                break;
            case 'secao3': 
				$this->sections = array(
					array(
						'id' => 'home_d1_admin_secao3',
						'title' => 'Seção 3 - Clientes de Sucesso',
						'callback' => array( $this, 'd1Section3Clientes' ),
						'page' => 'd1_plugin'
					),
				);
                break;
            case 'secao4': 
				$this->sections = array(
					array(
						'id' => 'home_d1_admin_secao4',
						'title' => 'Seção 4 - Desafios',
						'callback' => array( $this, 'd1Section4Desafios' ),
						'page' => 'd1_plugin'
					),
				);
                break;
            case 'secao5': 
				$this->sections = array(
					array(
						'id' => 'home_d1_admin_secao5',
						'title' => 'Seção 5 - Lead Generator',
						'callback' => array( $this, 'd1Section5LeadGenerator' ),
						'page' => 'd1_plugin'
					),
				);
                break;
            case 'secao6': 
				$this->sections = array(
					array(
						'id' => 'home_d1_admin_secao6',
						'title' => 'Seção 6 - Conheça Nossa Solução',
						'callback' => array( $this, 'd1Section6Solucao' ),
						'page' => 'd1_plugin'
					),
				);
                break;
            case 'secao7': 
				$this->sections = array(
					array(
						'id' => 'home_d1_admin_secao7',
						'title' => 'Seção 7 - Diferencial',
						'callback' => array( $this, 'd1Section7Diferencial' ),
						'page' => 'd1_plugin'
					),
				);
				break;
			case 'modulos': 
				$this->sections = array(
					array(
						'id' => 'home_d1_admin_modulos',
						'title' => 'Módulos',
						'callback' => array( $this, 'd1Modulos' ),
						'page' => 'd1_plugin'
					),
				);
				break;
			case 'hero': 
				$this->sections = array(
					array(
						'id' => 'home_d1_admin_hero',
						'title' => 'Hero - Slider',
						'callback' => array( $this, 'd1Hero' ),
						'page' => 'd1_plugin'
					),
				);
				break;
            default:
				$this->sections = array(
					array(
						'id' => 'home_d1_admin_index',
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
                $this->fields =  $this->admin_fields->getFields('home_d1_admin_index','d1_plugin');
                break;
            case 'secao1': 
                $this->fields =  $this->admin_fields->getFields('home_d1_admin_secao1','d1_plugin');
				break;
			case 'secao2': 
                $this->fields =  $this->admin_fields->getFields('home_d1_admin_secao2','d1_plugin');
                break;
            case 'secao3': 
                $this->fields =  $this->admin_fields->getFields('home_d1_admin_secao3','d1_plugin');
                break;
            case 'secao4':
                $this->fields =  $this->admin_fields->getFields('home_d1_admin_secao4','d1_plugin');
                break;
            case 'secao5':
                $this->fields =  $this->admin_fields->getFields('home_d1_admin_secao5','d1_plugin');
                break;
            case 'secao6':
                $this->fields =  $this->admin_fields->getFields('home_d1_admin_secao6','d1_plugin');
                break;
            case 'secao7':
                $this->fields =  $this->admin_fields->getFields('home_d1_admin_secao7','d1_plugin');
                break;
            default:
                $this->fields =  $this->admin_fields->getFields('home_d1_admin_index','d1_plugin');
                break;
        }
	}

	public function d1AdminConfGeral(){require_once plugin_dir_path(dirname_safe(__FILE__,2)) . 'templates/home/secao0.php';}
	public function d1Section1Hero(){require_once plugin_dir_path(dirname_safe(__FILE__,2)) . 'templates/home/secao1.php';}
    public function d1Section2Cases(){require_once plugin_dir_path(dirname_safe(__FILE__,2)) . 'templates/home/secao2.php';}
    public function d1Section3Clientes(){require_once plugin_dir_path(dirname_safe(__FILE__,2)) . 'templates/home/secao3.php';}
    public function d1Section4Desafios(){require_once plugin_dir_path(dirname_safe(__FILE__,2)) . 'templates/home/secao4.php';}
    public function d1Section5LeadGenerator(){require_once plugin_dir_path(dirname_safe(__FILE__,2)) . 'templates/home/secao5.php';}
    public function d1Section6Solucao(){require_once plugin_dir_path(dirname_safe(__FILE__,2)) . 'templates/home/secao6.php';}
	public function d1Section7Diferencial(){require_once plugin_dir_path(dirname_safe(__FILE__,2)) . 'templates/home/secao7.php';}
	public function d1Modulos(){require_once plugin_dir_path(dirname_safe(__FILE__,2)) . 'templates/home/modulos.php';}
	public function d1Hero(){require_once plugin_dir_path(dirname_safe(__FILE__,2)) . 'templates/home/hero.php';}
}
