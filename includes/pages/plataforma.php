<?php 
class Plataforma{
	public $settings;
	public $callbacks;
	public $page = 'd1_plugin_plataforma';
    private $active_tab;

	function __construct(){
		require_once  dirname(__FILE__).'/../fields/plataforma_fields.php';
		require_once plugin_dir_path(dirname_safe(__FILE__,2)) . 'includes/base/d1_upload.php';
		$this->d1_upload = new D1_Upload();
        $this->plataforma_fields = new Plataforma_Fields();
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
                $this->settings =  $this->plataforma_fields->getSettings('plataforma_secao1_options_group',$this->page);
				break;
			case 'secao2': 
                $this->settings =  $this->plataforma_fields->getSettings('plataforma_secao2_options_group',$this->page);
				break;
			case 'secao3': 
                $this->settings =  $this->plataforma_fields->getSettings('plataforma_secao3_options_group',$this->page);
				break;
			case 'secao4': 
                $this->settings =  $this->plataforma_fields->getSettings('plataforma_secao4_options_group',$this->page);
                break;
            default:
                $this->settings =  $this->plataforma_fields->getSettings('plataforma_secao1_options_group',$this->page);
                break;
        }
	}

	public function setSections(){
        switch($this->active_tab){
            case 'secao1': 
				$this->sections = array(
					array(
						'id' => 'd1_plataforma_secao1',
						'title' => 'Seção 1 - Hero',
						'callback' => array( $this, 'd1PlataformaSecao1' ),
						'page' => $this->page
					),
				);
				break;
			case 'secao2': 
				$this->sections = array(
					array(
						'id' => 'd1_plataforma_secao2',
						'title' => 'Seção 2 - Módulos',
						'callback' => array( $this, 'd1PlataformaSecao2' ),
						'page' => $this->page
					),
				);
				break;
			case 'secao3': 
				$this->sections = array(
					array(
						'id' => 'd1_plataforma_secao3',
						'title' => 'Seção 3 - Cases',
						'callback' => array( $this, 'd1PlataformaSecao3' ),
						'page' => $this->page
					),
				);
				break;
			case 'secao4': 
				$this->sections = array(
					array(
						'id' => 'd1_plataforma_secao4',
						'title' => 'Seção 4 - FAQ',
						'callback' => array( $this, 'd1PlataformaSecao4' ),
						'page' => $this->page
					),
				);
                break;
			default: 
				$this->sections = array(
					array(
						'id' => 'd1_plataforma_secao1',
						'title' => 'Seção 1 - Hero',
						'callback' => array( $this, 'd1PlataformaSecao1' ),
						'page' => $this->page
					),
				);
                break;
        }
	}

	public function setFields(){
        switch($this->active_tab){
            case 'secao1': 
                $this->fields =  $this->plataforma_fields->getFields('d1_plataforma_secao1','d1_plugin_plataforma');
				break;
			case 'secao2': 
                $this->fields =  $this->plataforma_fields->getFields('d1_plataforma_secao2','d1_plugin_plataforma');
				break;
			case 'secao3': 
                $this->fields =  $this->plataforma_fields->getFields('d1_plataforma_secao3','d1_plugin_plataforma');
				break;
			case 'secao4': 
                $this->fields =  $this->plataforma_fields->getFields('d1_plataforma_secao4','d1_plugin_plataforma');
                break;
            default:
                $this->fields =  $this->plataforma_fields->getFields('d1_plataforma_secao1','d1_plugin_plataforma');
                break;
        }
	}

    public function d1PlataformaSecao1(){require_once plugin_dir_path(dirname_safe(__FILE__,2)) . 'templates/plataforma/secao1.php';}
	public function d1PlataformaSecao2(){require_once plugin_dir_path(dirname_safe(__FILE__,2)) . 'templates/plataforma/secao2.php';}
	public function d1PlataformaSecao3(){require_once plugin_dir_path(dirname_safe(__FILE__,2)) . 'templates/plataforma/secao3.php';}
	public function d1PlataformaSecao4(){require_once plugin_dir_path(dirname_safe(__FILE__,2)) . 'templates/plataforma/secao4.php';}
}