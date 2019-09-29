<?php 
class Cases{
	public $settings;
	public $callbacks;
	public $page = 'd1_plugin_cases';
    private $active_tab;

	function __construct(){
		require_once  dirname(__FILE__).'/../fields/cases_fields.php';
		require_once plugin_dir_path(dirname_safe(__FILE__,2)) . 'includes/base/d1_upload.php';
		$this->d1_upload = new D1_Upload();
        $this->cases_fields = new Cases_Fields();
        $this->active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'config_geral';
	}
	
	public function register(){
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
			$this->add_settings_section( $section["id"], $section["title"], ( isset( $section["callback"] ) ? $section["callback"] : '' ), $section["page"] );
		}

		// add settings field
		foreach ( $this->fields as $field ) {
			$this->add_settings_section( $field["id"], '','', $field["page"], $field["section"], '' );
		}

		if ( !empty($this->settings) ) {
			add_action( 'admin_init', array( $this, 'registerCustomFields' ) );
		}
	}

	public function setSettings(){
        switch($this->active_tab){
            case 'config_geral': 
                $this->settings =  $this->cases_fields->getSettings('d1_cases_group',$this->page);
                break;
            default:
                $this->settings =  $this->cases_fields->getSettings('d1_options_group',$this->page);
                break;
        }
	}

	public function setSections(){
        switch($this->active_tab){
            case 'config_geral': 
				$this->sections = array(
					array(
						'id' => 'd1_cases_index',
						'title' => 'Configurações Gerais',
						'callback' => array( $this, 'd1CasesConfGeral' ),
						'page' => $this->page
					),
				);
				break;
            default:
				$this->sections = array(
					array(
						'id' => 'd1_cases_index',
						'title' => 'Configurações Gerais',
						'callback' => array( $this, 'd1CasesConfGeral' ),
						'page' => $this->page
					),
				);
				break;
        }
	}

	public function setFields(){
        switch($this->active_tab){
            case 'config_geral': 
                $this->fields =  $this->cases_fields->getFields('d1_cases_index','d1_plugin');
                break;
            default:
                $this->fields =  $this->cases_fields->getFields('d1_cases_index','d1_plugin');
                break;
        }
	}

    public function d1CasesConfGeral(){require_once plugin_dir_path(dirname_safe(__FILE__,2)) . 'templates/cases/secao0.php';}
}