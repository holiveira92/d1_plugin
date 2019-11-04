<?php 
class Segmentos{
	public $settings;
	public $callbacks;
	public $page = 'd1_plugin_segmentos';
    private $active_tab;

	function __construct(){
		require_once  dirname(__FILE__).'/../fields/segmentos_fields.php';
		require_once plugin_dir_path(dirname_safe(__FILE__,2)) . 'includes/base/d1_upload.php';
		$this->d1_upload = new D1_Upload();
        $this->segmentos_fields = new Segmentos_Fields();
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
                $this->settings =  $this->segmentos_fields->getSettings('segmentos_secao1_options_group',$this->page);
				break;
			case 'secao2': 
                $this->settings =  $this->segmentos_fields->getSettings('segmentos_secao2_options_group',$this->page);
				break;
			case 'secao3': 
                $this->settings =  $this->segmentos_fields->getSettings('segmentos_secao3_options_group',$this->page);
                break;
            default:
                $this->settings =  $this->segmentos_fields->getSettings('segmentos_secao1_options_group',$this->page);
                break;
        }
	}

	public function setSections(){
        switch($this->active_tab){
            case 'secao1': 
				$this->sections = array(
					array(
						'id' => 'd1_segmentos_secao1',
						'title' => 'Configurações Seção ',
						'callback' => array( $this, 'd1SegmentosSecao1' ),
						'page' => $this->page
					),
				);
				break;
			case 'secao2': 
				$this->sections = array(
					array(
						'id' => 'd1_segmentos_secao2',
						'title' => 'Configurações Seção ',
						'callback' => array( $this, 'd1SegmentosSecao2' ),
						'page' => $this->page
					),
				);
				break;
			case 'secao3': 
				$this->sections = array(
					array(
						'id' => 'd1_segmentos_secao3',
						'title' => 'Configurações Seção ',
						'callback' => array( $this, 'd1SegmentosSecao3' ),
						'page' => $this->page
					),
				);
				break;
			case 'keyp': 
				$this->sections = array(
					array(
						'id' => 'd1_segmentos_keyp',
						'title' => 'Configurações de Key Points ',
						'callback' => array( $this, 'd1SegmentosKeyp' ),
						'page' => $this->page
					),
				);
                break;
			default: 
				$this->sections = array(
					array(
						'id' => 'd1_segmentos_secao2',
						'title' => 'Configurações Seção',
						'callback' => array( $this, 'd1SegmentosSecao1' ),
						'page' => $this->page
					),
				);
                break;
        }
	}

	public function setFields(){
        switch($this->active_tab){
            case 'secao1': 
                $this->fields =  $this->segmentos_fields->getFields('d1_segmentos_secao1','d1_plugin_segmentos');
				break;
			case 'secao2': 
                $this->fields =  $this->segmentos_fields->getFields('d1_segmentos_secao2','d1_plugin_segmentos');
				break;
			case 'secao3': 
                $this->fields =  $this->segmentos_fields->getFields('d1_segmentos_secao3','d1_plugin_segmentos');
                break;
            default:
                $this->fields =  $this->segmentos_fields->getFields('d1_segmentos_secao1','d1_plugin_segmentos');
                break;
        }
	}

    public function d1SegmentosSecao1(){require_once plugin_dir_path(dirname_safe(__FILE__,2)) . 'templates/segmentos/secao1.php';}
	public function d1SegmentosSecao2(){require_once plugin_dir_path(dirname_safe(__FILE__,2)) . 'templates/segmentos/secao2.php';}
	public function d1SegmentosSecao3(){require_once plugin_dir_path(dirname_safe(__FILE__,2)) . 'templates/segmentos/secao3.php';}
	public function d1SegmentosKeyp(){require_once plugin_dir_path(dirname_safe(__FILE__,2)) . 'templates/segmentos/keyp.php';}
}