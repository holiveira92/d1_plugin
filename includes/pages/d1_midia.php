<?php 
class D1_Midia{
	public $settings;
	public $callbacks;
	public $page = 'd1_plugin_d1_midia';
    private $active_tab;

	function __construct(){
		require_once  dirname(__FILE__).'/../fields/d1_midia_fields.php';
		require_once plugin_dir_path(dirname_safe(__FILE__,2)) . 'includes/base/d1_upload.php';
		$this->d1_upload = new D1_Upload();
        $this->d1_midia_fields = new D1_Midia_Fields();
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
                $this->settings =  $this->d1_midia_fields->getSettings('d1_midia_secao1_options_group',$this->page);
				break;
			case 'secao2': 
                $this->settings =  $this->d1_midia_fields->getSettings('d1_midia_secao2_options_group',$this->page);
				break;
			case 'secao3': 
                $this->settings =  $this->d1_midia_fields->getSettings('d1_midia_secao3_options_group',$this->page);
                break;
            case 'secao4':
                $this->settings =  $this->d1_midia_fields->getSettings('d1_midia_secao4_options_group',$this->page);
                break;
            default:
                $this->settings =  $this->d1_midia_fields->getSettings('d1_midia_secao1_options_group',$this->page);
                break;
        }
	}

	public function setSections(){
        switch($this->active_tab){
            case 'secao1': 
				$this->sections = array(
					array(
						'id' => 'd1_midia_secao1',
						'title' => 'Configurações Seção Principal',
						'callback' => array( $this, 'D1_MidiaSecao1' ),
						'page' => $this->page
					),
				);
				break;
			case 'secao2': 
				$this->sections = array(
					array(
						'id' => 'd1_midia_secao2',
						'title' => 'Configurações FAQ',
						'callback' => array( $this, 'D1_MidiaSecao2' ),
						'page' => $this->page
					),
				);
				break;
			case 'midia': 
				$this->sections = array(
					array(
						'id' => 'd1_midia',
						'title' => 'Configurações Itens de Mídia ',
						'callback' => array( $this, 'D1_Midia' ),
						'page' => $this->page
					),
				);
                break;
            case 'secao4': 
				$this->sections = array(
					array(
						'id' => 'd1_midia_secao4',
						'title' => 'Configurações da Seção ',
						'callback' => array( $this, 'D1_MidiaSecao4' ),
						'page' => $this->page
					),
				);
				break;
			default: 
				$this->sections = array(
					array(
						'id' => 'd1_midia_secao1',
						'title' => 'Configurações Seção',
						'callback' => array( $this, 'D1_MidiaSecao1' ),
						'page' => $this->page
					),
				);
                break;
        }
	}

	public function setFields(){
        switch($this->active_tab){
            case 'secao1': 
                $this->fields =  $this->d1_midia_fields->getFields('d1_midia_secao1','d1_plugin_d1_midia');
				break;
			case 'secao2': 
                $this->fields =  $this->d1_midia_fields->getFields('d1_midia_secao2','d1_plugin_d1_midia');
				break;
			case 'secao3': 
                $this->fields =  $this->d1_midia_fields->getFields('d1_midia_secao3','d1_plugin_d1_midia');
                break;
            case 'secao4': 
                $this->fields =  $this->d1_midia_fields->getFields('d1_midia_secao4','d1_plugin_d1_midia');
                break;
            default:
                $this->fields =  $this->d1_midia_fields->getFields('d1_midia_secao1','d1_plugin_d1_midia');
                break;
        }
	}

    public function D1_MidiaSecao1(){require_once plugin_dir_path(dirname_safe(__FILE__,2)) . 'templates/d1_midia/secao1.php';}
	public function D1_MidiaSecao2(){require_once plugin_dir_path(dirname_safe(__FILE__,2)) . 'templates/d1_midia/secao2.php';}
    public function D1_MidiaSecao3(){require_once plugin_dir_path(dirname_safe(__FILE__,2)) . 'templates/d1_midia/secao3.php';}
    public function D1_MidiaSecao4(){require_once plugin_dir_path(dirname_safe(__FILE__,2)) . 'templates/d1_midia/secao4.php';}
	public function D1_Midia(){require_once plugin_dir_path(dirname_safe(__FILE__,2)) . 'templates/d1_midia/midia.php';}
}