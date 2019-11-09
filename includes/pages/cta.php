<?php 
class Cta{
	public $settings;
	public $callbacks;
	public $page = 'd1_plugin_cta';
    private $active_tab;

	function __construct(){
		require_once  dirname(__FILE__).'/../fields/cta_fields.php';
		require_once plugin_dir_path(dirname_safe(__FILE__,2)) . 'includes/base/d1_upload.php';
		$this->d1_upload = new D1_Upload();
        $this->cta_fields = new Cta_Fields();
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
                $this->settings =  $this->cta_fields->getSettings('cta_secao1_options_group',$this->page);
				break;
			case 'secao2': 
                $this->settings =  $this->cta_fields->getSettings('cta_secao2_options_group',$this->page);
				break;
			case 'secao3': 
                $this->settings =  $this->cta_fields->getSettings('cta_secao3_options_group',$this->page);
                break;
            case 'secao4':
                $this->settings =  $this->cta_fields->getSettings('cta_secao4_options_group',$this->page);
                break;
            default:
                $this->settings =  $this->cta_fields->getSettings('cta_secao1_options_group',$this->page);
                break;
        }
	}

	public function setSections(){
        switch($this->active_tab){
            case 'secao1': 
				$this->sections = array(
					array(
						'id' => 'd1_cta_secao1',
						'title' => 'Configurações Seção Principal',
						'callback' => array( $this, 'd1CtaSecao1' ),
						'page' => $this->page
					),
				);
				break;
			case 'secao2': 
				$this->sections = array(
					array(
						'id' => 'd1_cta_secao2',
						'title' => 'Configurações FAQ',
						'callback' => array( $this, 'd1CtaSecao2' ),
						'page' => $this->page
					),
				);
				break;
			case 'secao3': 
				$this->sections = array(
					array(
						'id' => 'd1_cta_secao3',
						'title' => 'Configurações Itens de Cases ',
						'callback' => array( $this, 'd1CtaSecao3' ),
						'page' => $this->page
					),
				);
                break;
            case 'secao4': 
				$this->sections = array(
					array(
						'id' => 'd1_cta_secao4',
						'title' => 'Configurações da Seção ',
						'callback' => array( $this, 'd1CtaSecao4' ),
						'page' => $this->page
					),
				);
				break;
			default: 
				$this->sections = array(
					array(
						'id' => 'd1_cta_secao1',
						'title' => 'Configurações Seção',
						'callback' => array( $this, 'd1CtaSecao1' ),
						'page' => $this->page
					),
				);
                break;
        }
	}

	public function setFields(){
        switch($this->active_tab){
            case 'secao1': 
                $this->fields =  $this->cta_fields->getFields('d1_cta_secao1','d1_plugin_cta');
				break;
			case 'secao2': 
                $this->fields =  $this->cta_fields->getFields('d1_cta_secao2','d1_plugin_cta');
				break;
			case 'secao3': 
                $this->fields =  $this->cta_fields->getFields('d1_cta_secao3','d1_plugin_cta');
                break;
            case 'secao4': 
                $this->fields =  $this->cta_fields->getFields('d1_cta_secao4','d1_plugin_cta');
                break;
            default:
                $this->fields =  $this->cta_fields->getFields('d1_cta_secao1','d1_plugin_cta');
                break;
        }
	}

    public function d1CtaSecao1(){require_once plugin_dir_path(dirname_safe(__FILE__,2)) . 'templates/cta/secao1.php';}
	public function d1CtaSecao2(){require_once plugin_dir_path(dirname_safe(__FILE__,2)) . 'templates/cta/secao2.php';}
    public function d1CtaSecao3(){require_once plugin_dir_path(dirname_safe(__FILE__,2)) . 'templates/cta/secao3.php';}
    public function d1CtaSecao4(){require_once plugin_dir_path(dirname_safe(__FILE__,2)) . 'templates/cta/secao4.php';}
	public function d1CtaConform(){require_once plugin_dir_path(dirname_safe(__FILE__,2)) . 'templates/cta/conformidade.php';}
	public function d1Cta(){require_once plugin_dir_path(dirname_safe(__FILE__,2)) . 'templates/cta/cta.php';}
}