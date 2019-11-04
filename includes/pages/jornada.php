<?php 
class Jornada{
	public $settings;
	public $callbacks;
	public $page = 'd1_plugin_jornada';
    private $active_tab;

	function __construct(){
		require_once  dirname(__FILE__).'/../fields/jornada_fields.php';
		require_once plugin_dir_path(dirname_safe(__FILE__,2)) . 'includes/base/d1_upload.php';
		$this->d1_upload = new D1_Upload();
        $this->jornada_fields = new Jornada_Fields();
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
                $this->settings =  $this->jornada_fields->getSettings('jornada_secao1_options_group',$this->page);
				break;
			case 'secao2': 
                $this->settings =  $this->jornada_fields->getSettings('jornada_secao2_options_group',$this->page);
				break;
			case 'secao3': 
                $this->settings =  $this->jornada_fields->getSettings('jornada_secao3_options_group',$this->page);
                break;
            default:
                $this->settings =  $this->jornada_fields->getSettings('jornada_secao1_options_group',$this->page);
                break;
        }
	}

	public function setSections(){
        switch($this->active_tab){
            case 'secao1': 
				$this->sections = array(
					array(
						'id' => 'd1_jornada_secao1',
						'title' => 'Seção 1 - Hero',
						'callback' => array( $this, 'd1JornadaSecao1' ),
						'page' => $this->page
					),
				);
				break;
			case 'secao2': 
				$this->sections = array(
					array(
						'id' => 'd1_jornada_secao2',
						'title' => 'Seção 2 - Plataforma',
						'callback' => array( $this, 'd1JornadaSecao2' ),
						'page' => $this->page
					),
				);
				break;
			case 'secao3': 
				$this->sections = array(
					array(
						'id' => 'd1_jornada_secao3',
						'title' => 'Seção 3 - Equipe',
						'callback' => array( $this, 'd1JornadaSecao3' ),
						'page' => $this->page
					),
				);
				break;
			case 'secao4': 
				$this->sections = array(
					array(
						'id' => 'd1_jornada_secao4',
						'title' => 'Seção 4 - Slide & Inovação',
						'callback' => array( $this, 'd1JornadaSecao4' ),
						'page' => $this->page
					),
				);
				break;
			case 'secao5': 
				$this->sections = array(
					array(
						'id' => 'd1_jornada_secao5',
						'title' => 'Seção 5 - FAQ',
						'callback' => array( $this, 'd1JornadaSecao5' ),
						'page' => $this->page
					),
				);
				break;
			case 'secao6': 
				$this->sections = array(
					array(
						'id' => 'd1_jornada_secao6',
						'title' => 'Seção 6 - Cases',
						'callback' => array( $this, 'd1JornadaSecao6' ),
						'page' => $this->page
					),
				);
                break;
			default: 
				$this->sections = array(
					array(
						'id' => 'd1_jornada_secao1',
						'title' => 'Seção 1 - Hero',
						'callback' => array( $this, 'd1JornadaSecao1' ),
						'page' => $this->page
					),
				);
                break;
        }
	}

	public function setFields(){
        switch($this->active_tab){
            case 'secao1': 
                $this->fields =  $this->jornada_fields->getFields('d1_jornada_secao1','d1_plugin_jornada');
				break;
			case 'secao2': 
                $this->fields =  $this->jornada_fields->getFields('d1_jornada_secao2','d1_plugin_jornada');
				break;
			case 'secao3': 
                $this->fields =  $this->jornada_fields->getFields('d1_jornada_secao3','d1_plugin_jornada');
				break;
			case 'secao4': 
                $this->fields =  $this->jornada_fields->getFields('d1_jornada_secao4','d1_plugin_jornada');
				break;
			case 'secao5': 
                $this->fields =  $this->jornada_fields->getFields('d1_jornada_secao5','d1_plugin_jornada');
				break;
			case 'secao6': 
                $this->fields =  $this->jornada_fields->getFields('d1_jornada_secao6','d1_plugin_jornada');
                break;
            default:
                $this->fields =  $this->jornada_fields->getFields('d1_jornada_secao1','d1_plugin_jornada');
                break;
        }
	}

    public function d1JornadaSecao1(){require_once plugin_dir_path(dirname_safe(__FILE__,2)) . 'templates/jornada/secao1.php';}
	public function d1JornadaSecao2(){require_once plugin_dir_path(dirname_safe(__FILE__,2)) . 'templates/jornada/secao2.php';}
	public function d1JornadaSecao3(){require_once plugin_dir_path(dirname_safe(__FILE__,2)) . 'templates/jornada/secao3.php';}
	public function d1JornadaSecao4(){require_once plugin_dir_path(dirname_safe(__FILE__,2)) . 'templates/jornada/secao4.php';}
	public function d1JornadaSecao5(){require_once plugin_dir_path(dirname_safe(__FILE__,2)) . 'templates/jornada/secao5.php';}
	public function d1JornadaSecao6(){require_once plugin_dir_path(dirname_safe(__FILE__,2)) . 'templates/jornada/secao6.php';}

}