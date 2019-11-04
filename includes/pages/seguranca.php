<?php 
class Seguranca{
	public $settings;
	public $callbacks;
	public $page = 'd1_plugin_seguranca';
    private $active_tab;

	function __construct(){
		require_once  dirname(__FILE__).'/../fields/seguranca_fields.php';
		require_once plugin_dir_path(dirname_safe(__FILE__,2)) . 'includes/base/d1_upload.php';
		$this->d1_upload = new D1_Upload();
        $this->seguranca_fields = new Seguranca_Fields();
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
                $this->settings =  $this->seguranca_fields->getSettings('seguranca_secao1_options_group',$this->page);
				break;
			case 'secao2': 
                $this->settings =  $this->seguranca_fields->getSettings('seguranca_secao2_options_group',$this->page);
				break;
			case 'secao3': 
                $this->settings =  $this->seguranca_fields->getSettings('seguranca_secao3_options_group',$this->page);
                break;
            case 'secao4':
                $this->settings =  $this->seguranca_fields->getSettings('seguranca_secao4_options_group',$this->page);
                break;
            default:
                $this->settings =  $this->seguranca_fields->getSettings('seguranca_secao1_options_group',$this->page);
                break;
        }
	}

	public function setSections(){
        switch($this->active_tab){
            case 'secao1': 
				$this->sections = array(
					array(
						'id' => 'd1_seguranca_secao1',
						'title' => 'Configurações Seção ',
						'callback' => array( $this, 'd1SegurancaSecao1' ),
						'page' => $this->page
					),
				);
				break;
			case 'secao2': 
				$this->sections = array(
					array(
						'id' => 'd1_seguranca_secao2',
						'title' => 'Configurações Itens de Segurança ',
						'callback' => array( $this, 'd1SegurancaSecao2' ),
						'page' => $this->page
					),
				);
				break;
			case 'secao3': 
				$this->sections = array(
					array(
						'id' => 'd1_seguranca_secao3',
						'title' => 'Configurações Itens de Conformidade ',
						'callback' => array( $this, 'd1SegurancaSecao3' ),
						'page' => $this->page
					),
				);
                break;
            case 'secao4': 
				$this->sections = array(
					array(
						'id' => 'd1_seguranca_secao4',
						'title' => 'Configurações da Seção ',
						'callback' => array( $this, 'd1SegurancaSecao4' ),
						'page' => $this->page
					),
				);
				break;
			case 'conform': 
				$this->sections = array(
					array(
						'id' => 'd1_seguranca_conform',
						'title' => 'Configurações de Conformidades ',
						'callback' => array( $this, 'd1SegurancaConform' ),
						'page' => $this->page
					),
				);
				break;
			case 'seg': 
				$this->sections = array(
					array(
						'id' => 'd1_seguranca_seg',
						'title' => 'Configurações de Segurança ',
						'callback' => array( $this, 'd1Seguranca' ),
						'page' => $this->page
					),
				);
                break;
			default: 
				$this->sections = array(
					array(
						'id' => 'd1_seguranca_secao1',
						'title' => 'Configurações Seção',
						'callback' => array( $this, 'd1SegurancaSecao1' ),
						'page' => $this->page
					),
				);
                break;
        }
	}

	public function setFields(){
        switch($this->active_tab){
            case 'secao1': 
                $this->fields =  $this->seguranca_fields->getFields('d1_seguranca_secao1','d1_plugin_seguranca');
				break;
			case 'secao2': 
                $this->fields =  $this->seguranca_fields->getFields('d1_seguranca_secao2','d1_plugin_seguranca');
				break;
			case 'secao3': 
                $this->fields =  $this->seguranca_fields->getFields('d1_seguranca_secao3','d1_plugin_seguranca');
                break;
            case 'secao4': 
                $this->fields =  $this->seguranca_fields->getFields('d1_seguranca_secao4','d1_plugin_seguranca');
                break;
            default:
                $this->fields =  $this->seguranca_fields->getFields('d1_seguranca_secao1','d1_plugin_seguranca');
                break;
        }
	}

    public function d1SegurancaSecao1(){require_once plugin_dir_path(dirname_safe(__FILE__,2)) . 'templates/seguranca/secao1.php';}
	public function d1SegurancaSecao2(){require_once plugin_dir_path(dirname_safe(__FILE__,2)) . 'templates/seguranca/secao2.php';}
    public function d1SegurancaSecao3(){require_once plugin_dir_path(dirname_safe(__FILE__,2)) . 'templates/seguranca/secao3.php';}
    public function d1SegurancaSecao4(){require_once plugin_dir_path(dirname_safe(__FILE__,2)) . 'templates/seguranca/secao4.php';}
	public function d1SegurancaConform(){require_once plugin_dir_path(dirname_safe(__FILE__,2)) . 'templates/seguranca/conformidade.php';}
	public function d1Seguranca(){require_once plugin_dir_path(dirname_safe(__FILE__,2)) . 'templates/seguranca/seguranca.php';}
}