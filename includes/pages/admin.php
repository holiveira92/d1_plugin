<?php 
function pre($data) {
	echo "<pre>";
	   print_r($data);
	echo "</pre>";
}

class Admin{
	public $settings;
	public $callbacks;
	public $pages = array();
	public $subpages = array();

	function __construct(){
		add_action( 'whitelist_options', array( $this, 'whitelist_custom_options_page' ),11 );
	}
	
	public function register(){
		$this->plugin_path = plugin_dir_path( dirname( __FILE__, 2 ) );
		$this->plugin_url = plugin_dir_url( dirname( __FILE__, 2 ) );
		$this->plugin = plugin_basename( dirname( __FILE__, 3 ) ) . '/d1_plugin.php';
		$this->setPages();
		$this->setSettings();
		$this->setSections();
		$this->setFields();
		$this->registerCustomFields();
	}


	public function registerCustomFields(){
		// register setting
		foreach ( $this->settings as $setting ) {
			register_setting( $setting["option_group"], $setting["option_name"], ( isset( $setting["callback"] ) ? $setting["callback"] : '' ) );
		}
		
		// add settings section
		foreach ( $this->sections as $section ) {
			//add_settings_section( $section["id"], $section["title"], ( isset( $section["callback"] ) ? $section["callback"] : '' ), $section["page"] );
			$this->add_settings_section( $section["id"], $section["title"], ( isset( $section["callback"] ) ? $section["callback"] : '' ), $section["page"] );
		}

		// add settings field
		foreach ( $this->fields as $field ) {
			//add_settings_field( $field["id"], $field["title"], ( isset( $field["callback"] ) ? $field["callback"] : '' ), $field["page"], $field["section"], ( isset( $field["args"] ) ? $field["args"] : '' ) );
			$this->add_settings_section( $field["id"], $field["title"], ( isset( $field["callback"] ) ? $field["callback"] : '' ), $field["page"], $field["section"], ( isset( $field["args"] ) ? $field["args"] : '' ) );
		}

		if ( ! empty($this->admin_pages) ) {
			add_action( 'admin_menu', array( $this, 'addAdminMenu' ) );
		}

		if ( !empty($this->settings) ) {
			add_action( 'admin_init', array( $this, 'registerCustomFields' ) );
		}
	}

	public function setPages(){
		$this->pages = array(
			array(
				'page_title' => 'D1 Plugin', 
				'menu_title' => 'D1', 
				'capability' => 'manage_options', 
				'menu_slug' => 'd1_plugin', 
				'callback' => array(), 
				'icon_url' => 'dashicons-store', 
				'position' => 110
			)
		);

	}


	public function setSettings()
	{
		$this->settings = array(
			array(
				'option_group' => 'd1_options_group',
				'option_name' => 'url_link',
				'callback' => array( $this, 'd1OptionsGroup' )
			),
			array(
				'option_group' => 'd1_options_group',
				'option_name' => 'descricao_link',
				'callback' => array( $this, 'd1OptionsGroup' )
			)
		);

	}

	public function setSections()
	{
		$this->sections = array(
			array(
				'id' => 'd1_admin_index',
				'title' => 'Configurações',
				'callback' => array( $this, 'd1AdminSection' ),
				'page' => 'd1_plugin'
			)
		);

	}

	public function setFields()
	{
		$this->fields = array(
			array(
				'id' => 'url_link',
				'title' => 'URL Link',
				'callback' =>  array( $this, 'd1TextExample' ),
				'page' => 'd1_plugin',
				'section' => 'd1_admin_index',
				'args' => array(
					'label_for' => 'url_link',
					'class' => 'example-class'
				)
			),
			array(
				'id' => 'descricao_link',
				'title' => 'Descrição Link',
				'callback' => array( $this, 'd1FirstName' ),
				'page' => 'd1_plugin',
				'section' => 'd1_admin_index',
				'args' => array(
					'label_for' => 'descricao_link',
					'class' => 'example-class'
				)
			),
			array(
				'id' => 'img1',
				'title' => 'Hero Image',
				'callback' => array( $this, 'd1ImgHero' ),
				'page' => 'd1_plugin',
				'section' => 'd1_admin_index',
				'args' => array(
					'label_for' => 'img1',
					'class' => 'example-class'
				)
			)

				
		);

	}

	public function d1OptionsGroup( $input ){
		return $input;
	}

	public function d1AdminSection(){
		echo 'Opções de Navegação Exemplo';
	}

	public function d1TextExample(){
		$value = esc_attr( get_option( 'url_link' ) );
		echo '<input type="text" class="regular-text" name="url_link" value="' . $value . '" placeholder="URL Redirecionar Usuario">';
	}

	public function d1FirstName(){
		$value = esc_attr( get_option( 'descricao_link' ) );
		echo '<input type="text" class="regular-text" name="descricao_link" value="' . $value . '" placeholder="Descricao do Link">';
	}

	public function d1ImgHero(){
		$value = esc_attr( get_option( 'img1' ) );
		echo '<input type="file" class="regular-text" name="img1" value="' . $value . '">';
	}

	// White-lists options on custom pages.
	// Workaround for second issue: http://j.mp/Pk3UCF
	function whitelist_custom_options_page( $whitelist_options ){
		print_r($whitelist_options);die;
		// Custom options are mapped by section id; Re-map by page slug.
		foreach($this->page_sections as $page => $sections ){
			$whitelist_options[$page] = array();
			foreach( $sections as $section )
				if( !empty( $whitelist_options[$section] ) )
					foreach( $whitelist_options[$section] as $option )
						$whitelist_options[$page][] = $option;
				}
		return $whitelist_options;
	}

	// Wrapper for wp's `add_settings_section()` that tracks custom sections
	private function add_settings_section( $id, $title, $cb, $page ){
		add_settings_section( $id, $title, $cb, $page );
		if( $id != $page ){
			if( !isset($this->page_sections[$page]))
				$this->page_sections[$page] = array();
			$this->page_sections[$page][$id] = $id;
		}
	}
}