<?php 
class Modulos{
	public $settings;
	public $callbacks;
	public $page = 'd1_plugin_modulos';
    private $active_tab;

	function __construct(){
		require_once  dirname(__FILE__).'/../fields/modulos_fields.php';
		require_once plugin_dir_path(dirname_safe(__FILE__,2)) . 'includes/base/d1_upload.php';
		$this->d1_upload = new D1_Upload();
        $this->modulos_fields = new Modulos_Fields();
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
                $this->settings =  $this->modulos_fields->getSettings('modulos_secao1_options_group',$this->page);
				break;
			case 'secao2': 
                $this->settings =  $this->modulos_fields->getSettings('modulos_secao2_options_group',$this->page);
				break;
			case 'secao3': 
                $this->settings =  $this->modulos_fields->getSettings('modulos_secao3_options_group',$this->page);
                break;
            default:
                $this->settings =  $this->modulos_fields->getSettings('modulos_secao1_options_group',$this->page);
                break;
        }
	}

	public function setSections(){
        switch($this->active_tab){
            case 'secao1': 
				$this->sections = array(
					array(
						'id' => 'd1_modulos_secao1',
						'title' => 'Modulos',
						'callback' => array( $this, 'd1ModulosSecao1' ),
						'page' => $this->page
					),
				);
				break;
			case 'secao2': 
				$this->sections = array(
					array(
						'id' => 'd1_modulos_secao2',
						'title' => 'Configurações Seção ',
						'callback' => array( $this, 'd1ModulosSecao2' ),
						'page' => $this->page
					),
				);
				break;
			case 'secao3': 
				$this->sections = array(
					array(
						'id' => 'd1_modulos_secao3',
						'title' => 'Configurações Seção ',
						'callback' => array( $this, 'd1ModulosSecao3' ),
						'page' => $this->page
					),
				);
				break;
			case 'keyp': 
				$this->sections = array(
					array(
						'id' => 'd1_modulos_keyp',
						'title' => 'Configurações de Key Points ',
						'callback' => array( $this, 'd1ModulosKeyp' ),
						'page' => $this->page
					),
				);
				break;
			case 'mod': 
				$this->sections = array(
					array(
						'id' => 'd1_modulos_mod',
						'title' => 'Configurações de Modulos ',
						'callback' => array( $this, 'd1Modulos' ),
						'page' => $this->page
					),
				);
                break;
			default: 
				$this->sections = array(
					array(
						'id' => 'd1_modulos_secao2',
						'title' => 'Configurações Seção',
						'callback' => array( $this, 'd1ModulosSecao1' ),
						'page' => $this->page
					),
				);
                break;
        }
	}

	public function setFields(){
        switch($this->active_tab){
            case 'secao1': 
                $this->fields =  $this->modulos_fields->getFields('d1_modulos_secao1','d1_plugin_modulos');
				break;
			case 'secao2': 
                $this->fields =  $this->modulos_fields->getFields('d1_modulos_secao2','d1_plugin_modulos');
				break;
			case 'secao3': 
                $this->fields =  $this->modulos_fields->getFields('d1_modulos_secao3','d1_plugin_modulos');
                break;
            default:
                $this->fields =  $this->modulos_fields->getFields('d1_modulos_secao1','d1_plugin_modulos');
                break;
        }
	}

    public function d1ModulosSecao1(){require_once plugin_dir_path(dirname_safe(__FILE__,2)) . 'templates/modulos/secao1.php';}
	public function d1ModulosSecao2(){require_once plugin_dir_path(dirname_safe(__FILE__,2)) . 'templates/modulos/secao2.php';}
	public function d1ModulosSecao3(){require_once plugin_dir_path(dirname_safe(__FILE__,2)) . 'templates/modulos/secao3.php';}
	public function d1ModulosKeyp(){require_once plugin_dir_path(dirname_safe(__FILE__,2)) . 'templates/modulos/keyp.php';}
	public function d1Modulos(){require_once plugin_dir_path(dirname_safe(__FILE__,2)) . 'templates/modulos/modulos.php';}
}