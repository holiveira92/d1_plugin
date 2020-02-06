<?php 
class Config_Geral{
	public $settings;
	public $callbacks;
	public $page = 'd1_plugin_config_geral';
    private $active_tab;

	function __construct(){
		require_once  dirname(__FILE__).'/../fields/config_geral_fields.php';
		require_once plugin_dir_path(dirname_safe(__FILE__,2)) . 'includes/base/d1_upload.php';
		$this->d1_upload = new D1_Upload();
        $this->config_geral_fields = new Config_Geral_Fields();
        $this->active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'secao1';
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

	public function setSettings(){
        switch($this->active_tab){
            case 'secao1': 
                $this->settings =  $this->config_geral_fields->getSettings('config_geral_secao_1','d1_plugin_config_geral');
                break;
            case 'secao2': 
                $this->settings =  $this->config_geral_fields->getSettings('config_geral_secao_2','d1_plugin_config_geral');
                break;
            default:
                $this->settings =  $this->config_geral_fields->getSettings('config_geral_secao_1','d1_plugin_config_geral');
                break;
        }
    }
    
    public function setPages(){}

	public function setSections(){
        switch($this->active_tab){
            case 'secao1': 
				$this->sections = array(
					array(
						'id' => 'config_geral_secao_1',
						'title' => 'Configurações Gerais',
						'callback' => array( $this, 'd1AdminConfGeral' ),
						'page' => 'd1_plugin_config_geral'
					),
				);
				break;
			case 'secao2': 
				$this->sections = array(
					array(
						'id' => 'config_geral_secao_2',
						'title' => 'Linguagem',
						'callback' => array( $this, 'd1Linguagem' ),
						'page' => 'd1_plugin_config_geral'
					),
				);
				break;
            default:
				$this->sections = array(
					array(
						'id' => 'config_geral_secao_1',
						'title' => 'Configurações Gerais',
						'callback' => array( $this, 'd1AdminConfGeral' ),
						'page' => 'd1_plugin_config_geral'
					),
				);
				break;
        }
	}

	public function setFields(){
        switch($this->active_tab){
            case 'secao1': 
                $this->fields =  $this->config_geral_fields->getFields('config_geral_secao_1','d1_plugin_config_geral');
				break;
			case 'secao2': 
				$this->fields =  $this->config_geral_fields->getFields('config_geral_secao_2','d1_plugin_config_geral');
				break;
            default:
                $this->fields =  $this->config_geral_fields->getFields('config_geral_secao_1','d1_plugin_config_geral');
                break;
        }
	}

	public function d1AdminConfGeral(){require_once plugin_dir_path(dirname_safe(__FILE__,2)) . 'templates/config_geral/secao1.php';}
	public function d1Linguagem(){require_once plugin_dir_path(dirname_safe(__FILE__,2)) . 'templates/config_geral/secao2.php';}
}
