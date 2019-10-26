<?php 
class Footer{
	public $settings;
	public $callbacks;
	public $page = 'd1_plugin_footer';
    private $active_tab;

	function __construct(){
		require_once  dirname(__FILE__).'/../fields/footer_fields.php';
		require_once plugin_dir_path(dirname_safe(__FILE__,2)) . 'includes/base/d1_upload.php';
		$this->d1_upload = new D1_Upload();
        $this->footer_fields = new Footer_Fields();
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
                $this->settings =  $this->footer_fields->getSettings('footer_secao1_options_group',$this->page);
				break;
			case 'secao2': 
                $this->settings =  $this->footer_fields->getSettings('footer_secao2_options_group',$this->page);
                break;
            case 'secao3': 
                $this->settings =  $this->footer_fields->getSettings('footer_secao3_options_group',$this->page);
				break;
			case 'secao4': 
                $this->settings =  $this->footer_fields->getSettings('footer_secao4_options_group',$this->page);
				break;
			case 'secao5': 
                $this->settings =  $this->footer_fields->getSettings('footer_secao5_options_group',$this->page);
				break;
			case 'secao6': 
                $this->settings =  $this->footer_fields->getSettings('footer_secao6_options_group',$this->page);
                break;
            default:
                $this->settings =  $this->footer_fields->getSettings('footer_secao1_options_group',$this->page);
                break;
        }
	}

	public function setSections(){
        switch($this->active_tab){
            case 'secao1': 
				$this->sections = array(
					array(
						'id' => 'd1_footer_secao1',
						'title' => 'Configurações Seção Pré-Footer',
						'callback' => array( $this, 'd1FooterSecao1' ),
						'page' => $this->page
					),
				);
				break;
			case 'secao2': 
				$this->sections = array(
					array(
						'id' => 'd1_footer_secao2',
						'title' => 'Configurações Seção Blog',
						'callback' => array( $this, 'd1FooterSecao2' ),
						'page' => $this->page
					),
				);
                break;
            case 'secao3': 
				$this->sections = array(
					array(
						'id' => 'd1_footer_secao3',
						'title' => 'Configurações Seção Footer',
						'callback' => array( $this, 'd1FooterSecao3' ),
						'page' => $this->page
					),
				);
				break;
			case 'secao4': 
				$this->sections = array(
					array(
						'id' => 'd1_footer_secao4',
						'title' => 'Configurações Seção Footer',
						'callback' => array( $this, 'd1FooterSecao4' ),
						'page' => $this->page
					),
				);
				break;
			case 'secao5': 
				$this->sections = array(
					array(
						'id' => 'd1_footer_secao5',
						'title' => 'Configurações Seção Footer',
						'callback' => array( $this, 'd1FooterSecao5' ),
						'page' => $this->page
					),
				);
				break;
			case 'secao6': 
				$this->sections = array(
					array(
						'id' => 'd1_footer_secao6',
						'title' => 'Configurações Seção Footer',
						'callback' => array( $this, 'd1FooterSecao6' ),
						'page' => $this->page
					),
				);
				break;
			default: 
				$this->sections = array(
					array(
						'id' => 'd1_footer_secao1',
						'title' => 'Configurações Seção Pré-Footer',
						'callback' => array( $this, 'd1FooterSecao1' ),
						'page' => $this->page
					),
				);
                break;
        }
	}

	public function setFields(){
        switch($this->active_tab){
            case 'secao1': 
                $this->fields =  $this->footer_fields->getFields('d1_footer_secao1','d1_plugin_footer');
				break;
			case 'secao2': 
                $this->fields =  $this->footer_fields->getFields('d1_footer_secao2','d1_plugin_footer');
                break;
            case 'secao3': 
                $this->fields =  $this->footer_fields->getFields('d1_footer_secao3','d1_plugin_footer');
				break;
			case 'secao4': 
                $this->fields =  $this->footer_fields->getFields('d1_footer_secao4','d1_plugin_footer');
				break;
			case 'secao5': 
                $this->fields =  $this->footer_fields->getFields('d1_footer_secao5','d1_plugin_footer');
				break;
			case 'secao6': 
                $this->fields =  $this->footer_fields->getFields('d1_footer_secao6','d1_plugin_footer');
                break;
            default:
                $this->fields =  $this->footer_fields->getFields('d1_footer_secao1','d1_plugin_footer');
                break;
        }
	}

    public function d1FooterSecao1(){require_once plugin_dir_path(dirname_safe(__FILE__,2)) . 'templates/footer/secao1.php';}
    public function d1FooterSecao2(){require_once plugin_dir_path(dirname_safe(__FILE__,2)) . 'templates/footer/secao2.php';}
	public function d1FooterSecao3(){require_once plugin_dir_path(dirname_safe(__FILE__,2)) . 'templates/footer/secao3.php';}
	public function d1FooterSecao4(){require_once plugin_dir_path(dirname_safe(__FILE__,2)) . 'templates/footer/secao4.php';}
	public function d1FooterSecao5(){require_once plugin_dir_path(dirname_safe(__FILE__,2)) . 'templates/footer/secao5.php';}
	public function d1FooterSecao6(){require_once plugin_dir_path(dirname_safe(__FILE__,2)) . 'templates/footer/secao6.php';}
}