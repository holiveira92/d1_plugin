<?php 
class Objetivos{
	public $settings;
	public $callbacks;
	public $page = 'd1_plugin_objetivos';
    private $active_tab;

	function __construct(){
		require_once  dirname(__FILE__).'/../fields/objetivos_fields.php';
		require_once plugin_dir_path(dirname_safe(__FILE__,2)) . 'includes/base/d1_upload.php';
		$this->d1_upload = new D1_Upload();
        $this->objetivos_fields = new Objetivos_Fields();
        $this->active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'secao1';
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
            case 'secao1': 
                $this->settings =  $this->objetivos_fields->getSettings('objetivos_secao1_options_group',$this->page);
				break;
			case 'secao2': 
                $this->settings =  $this->objetivos_fields->getSettings('objetivos_secao2_options_group',$this->page);
				break;
			case 'secao3': 
                $this->settings =  $this->objetivos_fields->getSettings('objetivos_secao3_options_group',$this->page);
                break;
            default:
                $this->settings =  $this->objetivos_fields->getSettings('objetivos_secao1_options_group',$this->page);
                break;
        }
	}

	public function setSections(){
        switch($this->active_tab){
            case 'secao1': 
				$this->sections = array(
					array(
						'id' => 'd1_objetivos_secao1',
						'title' => '',
						'callback' => array( $this, 'd1ObjetivosSecao1' ),
						'page' => $this->page
					),
				);
				break;
			case 'secao2': 
				$this->sections = array(
					array(
						'id' => 'd1_objetivos_secao2',
						'title' => 'Configurações Seção ',
						'callback' => array( $this, 'd1ObjetivosSecao2' ),
						'page' => $this->page
					),
				);
				break;
			case 'secao3': 
				$this->sections = array(
					array(
						'id' => 'd1_objetivos_secao3',
						'title' => 'Configurações Seção ',
						'callback' => array( $this, 'd1ObjetivosSecao3' ),
						'page' => $this->page
					),
				);
				break;
			case 'keyp': 
				$this->sections = array(
					array(
						'id' => 'd1_objetivos_keyp',
						'title' => 'Configurações de Key Points ',
						'callback' => array( $this, 'd1ObjetivosKeyp' ),
						'page' => $this->page
					),
				);
				break;
			case 'mod': 
				$this->sections = array(
					array(
						'id' => 'd1_objetivos_mod',
						'title' => 'Configurações de Objetivos ',
						'callback' => array( $this, 'd1Objetivos' ),
						'page' => $this->page
					),
				);
                break;
			default: 
				$this->sections = array(
					array(
						'id' => 'd1_objetivos_secao2',
						'title' => 'Configurações Seção',
						'callback' => array( $this, 'd1ObjetivosSecao1' ),
						'page' => $this->page
					),
				);
                break;
        }
	}

	public function setFields(){
        switch($this->active_tab){
            case 'secao1': 
                $this->fields =  $this->objetivos_fields->getFields('d1_objetivos_secao1','d1_plugin_objetivos');
				break;
			case 'secao2': 
                $this->fields =  $this->objetivos_fields->getFields('d1_objetivos_secao2','d1_plugin_objetivos');
				break;
			case 'secao3': 
                $this->fields =  $this->objetivos_fields->getFields('d1_objetivos_secao3','d1_plugin_objetivos');
                break;
            default:
                $this->fields =  $this->objetivos_fields->getFields('d1_objetivos_secao1','d1_plugin_objetivos');
                break;
        }
	}

    public function d1ObjetivosSecao1(){require_once plugin_dir_path(dirname_safe(__FILE__,2)) . 'templates/objetivos/secao1.php';}
	public function d1ObjetivosSecao2(){require_once plugin_dir_path(dirname_safe(__FILE__,2)) . 'templates/objetivos/secao2.php';}
	public function d1ObjetivosSecao3(){require_once plugin_dir_path(dirname_safe(__FILE__,2)) . 'templates/objetivos/secao3.php';}
	public function d1ObjetivosKeyp(){require_once plugin_dir_path(dirname_safe(__FILE__,2)) . 'templates/objetivos/keyp.php';}
	public function d1Objetivos(){require_once plugin_dir_path(dirname_safe(__FILE__,2)) . 'templates/objetivos/objetivos.php';}
}