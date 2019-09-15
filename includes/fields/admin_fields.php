<?php
//Utilizar essa função apenas para modo compatibilidade com PHP menor que 7
function dirname_safe($path, $level = 0){
    $dir = explode(DIRECTORY_SEPARATOR, $path);
    $level = $level * -1;
    if($level == 0) $level = count($dir);
    array_splice($dir, $level);
    return implode($dir, DIRECTORY_SEPARATOR).DIRECTORY_SEPARATOR;
}

class Admin_Fields {
	private $path_data_fields;
	private $path_data_settings;
	private $active_tab;

	public function __construct(){
		require_once plugin_dir_path(dirname_safe(__FILE__,2)) . 'includes/base/d1_upload.php';
		$this->d1_upload = new D1_Upload();
		$this->path_data_fields = plugin_dir_path(dirname_safe(__FILE__,2)) . 'includes/fields/fields.json';
		$this->path_data_settings = plugin_dir_path(dirname_safe(__FILE__,2)) . 'includes/fields/settings.json';
		$this->active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'config_geral';
    }

    public function getSettings($opt_group=false){
		$settings = array();
		$config_data_settings = $this->getConfigDataFields($this->path_data_settings);
		if($opt_group){
			$settings = $config_data_settings[$opt_group];
		}else{
			$settings = $config_data_settings;
		}
		return $settings;
	}
	
    public function getFields($section=false){
		$fields = array();
		$config_data_fields = $this->getConfigDataFields($this->path_data_fields);
		if($section){
			$fields = $config_data_fields[$section];
		}else{
			$fields = $config_data_fields;
		}
		
        return $fields;
    }
	
	private function getConfigDataFields($path){
		//No arquivo JSON estarão as configurações sobre as seções e respectivos options_groups de campos
		$json = file_get_contents($path); 
		$config_data = json_decode($json,true);
		$config_data = !empty($config_data) ? $config_data : array();
		$config_data = $this->getCallbackClass($config_data);
		return $config_data;
	}
	private function getCallbackClass($data){
		if(empty($data))
			return array();
		
		foreach($data as &$conf){
			foreach($conf as $key=>&$option){
				$option['callback'] = array($this,$option['callback'][1]);
			}
		}
		return $data;
	}

	/* 	----------------------------------------------------------------------------------------------------------------------------
		Callback dos options group
		Funções callbacks devem ter o nome do grupo de opções correspondente
		----------------------------------------------------------------------------------------------------------------------------
	*/ 
	public function d1_options_group($input){return $input;}
	public function secao1_options_group($input){return $input;}
	public function secao2_options_group($input){return $input;}

	/* 	----------------------------------------------------------------------------------------------------------------------------
		Callback dos fields
		Funções callbacks devem ter o nome da opção correspondente
		----------------------------------------------------------------------------------------------------------------------------
	*/ 
	//Campos de entrada da página de configurações gerais
    public function d1_main_logo(){ echo '<input type="file" class="regular-text" name="'.__FUNCTION__.'" value="' . esc_attr(get_option(__FUNCTION__)) . '">';}
	public function d1_favicon(){echo $this->d1_upload->get_image_options(__FUNCTION__);}
    public function d1_web_title(){echo '<input type="text" class="regular-text" name="'.__FUNCTION__.'" value="' . get_option(__FUNCTION__)  . '" placeholder="Título da Página">';}

	//Campos de entrada da página seção 1 - Hero
	public function secao1_hero_name(){echo '<input type="text" class="regular-text" name="'.__FUNCTION__.'" value="' . get_option(__FUNCTION__)  . '" placeholder="Nome Hero">';}
	public function secao1_hero_cargo(){echo '<input type="text" class="regular-text" name="'.__FUNCTION__.'" value="' . get_option(__FUNCTION__)  . '" placeholder="Cargo Hero">';}
	public function secao1_hero_descricao(){echo '<input type="text" class="regular-text" name="'.__FUNCTION__.'" value="' . get_option(__FUNCTION__)  . '" placeholder="Descrição Trabalho Hero">';}
	public function secao1_hero_title(){echo '<input type="text" class="regular-text" name="'.__FUNCTION__.'" value="' . get_option(__FUNCTION__)  . '" placeholder="Proposta Hero">';}
    public function secao1_descricao_primaria(){echo '<input type="text" class="regular-text" name="'.__FUNCTION__.'" value="' . get_option(__FUNCTION__)  . '" placeholder="Descrição Primária">';}
	public function secao1_descricao_secundaria(){echo '<input type="text" class="regular-text" name="'.__FUNCTION__.'" value="' . get_option(__FUNCTION__)  . '" placeholder="Descrição Secundária">';}
	public function secao1_conheca_um_minuto(){echo '<input type="text" class="regular-text" name="'.__FUNCTION__.'" value="' . get_option(__FUNCTION__)  . '" placeholder="URL do Video Conheça em 1 Minuto">';}

	//-----------------------------Início Campos de entrada da página seção 2 - Cases de Sucesso---------------------------------------------
	//Titulo Seção Parte 1
	public function secao2_section_title(){echo '<input type="text" class="regular-text" name="'.__FUNCTION__.'" value="' . get_option(__FUNCTION__)  . '" placeholder="Titulo da Seção Parte 1">';}
	//Card Primeira Parte
	//Case 1
	public function secao2_title_card_case1(){echo '<input type="text" class="regular-text" name="'.__FUNCTION__.'" value="' . get_option(__FUNCTION__)  . '" placeholder="Titulo do Card 1">';}
	public function secao2_subtitle_card_case1(){echo '<input type="text" class="regular-text" name="'.__FUNCTION__.'" value="' . get_option(__FUNCTION__)  . '" placeholder="SubTitulo do Card 1">';}
	public function secao2_text_footer_card_case1(){echo '<input type="text" class="regular-text" name="'.__FUNCTION__.'" value="' . get_option(__FUNCTION__)  . '" placeholder="Texto Card Footer 1">';}
	public function secao2_subtext_footer_card_case1(){echo '<input type="text" class="regular-text" name="'.__FUNCTION__.'" value="' . get_option(__FUNCTION__)  . '" placeholder="SubTexto Card Footer 1">';}
	public function secao2_img_bg_case1(){ echo $this->d1_upload->get_image_options(__FUNCTION__);}
	//Case 2
	public function secao2_title_card_case2(){echo '<input type="text" class="regular-text" name="'.__FUNCTION__.'" value="' . get_option(__FUNCTION__)  . '" placeholder="Titulo do Card 2">';}
	public function secao2_subtitle_card_case2(){echo '<input type="text" class="regular-text" name="'.__FUNCTION__.'" value="' . get_option(__FUNCTION__)  . '" placeholder="SubTitulo do Card 2">';}
	public function secao2_text_footer_card_case2(){echo '<input type="text" class="regular-text" name="'.__FUNCTION__.'" value="' . get_option(__FUNCTION__)  . '" placeholder="Texto Card Footer 2">';}
	public function secao2_subtext_footer_card_case2(){echo '<input type="text" class="regular-text" name="'.__FUNCTION__.'" value="' . get_option(__FUNCTION__)  . '" placeholder="SubTexto Card Footer 2">';}
	public function secao2_img_bg_case2(){echo $this->d1_upload->get_image_options(__FUNCTION__);}
	//Case 3
	public function secao2_title_card_case3(){echo '<input type="text" class="regular-text" name="'.__FUNCTION__.'" value="' . get_option(__FUNCTION__)  . '" placeholder="Titulo do Card 3">';}
	public function secao2_subtitle_card_case3(){echo '<input type="text" class="regular-text" name="'.__FUNCTION__.'" value="' . get_option(__FUNCTION__)  . '" placeholder="SubTitulo do Card 3">';}
	public function secao2_text_footer_card_case3(){echo '<input type="text" class="regular-text" name="'.__FUNCTION__.'" value="' . get_option(__FUNCTION__)  . '" placeholder="Texto Card Footer 3">';}
	public function secao2_subtext_footer_card_case3(){echo '<input type="text" class="regular-text" name="'.__FUNCTION__.'" value="' . get_option(__FUNCTION__)  . '" placeholder="SubTexto Card Footer 3">';}
	public function secao2_img_bg_case3(){echo $this->d1_upload->get_image_options(__FUNCTION__);}

	//Titulo Seção Parte 2
	public function secao2_section_title_part2(){echo '<input type="text" class="regular-text" name="'.__FUNCTION__.'" value="' . get_option(__FUNCTION__)  . '" placeholder="Titulo da Seção Parte 2">';}

	//Titulo Seção Parte 3
	public function secao2_section_title_part3(){echo '<input type="text" class="regular-text" name="'.__FUNCTION__.'" value="' . get_option(__FUNCTION__)  . '" placeholder="Titulo da Seção Parte 3">';}
	//Card Segunda Parte
	//Case 1
	public function secao2_title_card2_case1(){echo '<input type="text" class="regular-text" name="'.__FUNCTION__.'" value="' . get_option(__FUNCTION__)  . '" placeholder="Titulo Card 2 Case 1">';}
	public function secao2_subtitle_card2_case1(){echo '<input type="text" class="regular-text" name="'.__FUNCTION__.'" value="' . get_option(__FUNCTION__)  . '" placeholder="SubTitulo Card 2 Case 1">';}
	public function secao2_img_bg_card2_case1(){echo $this->d1_upload->get_image_options(__FUNCTION__);}
	//Case 2
	public function secao2_title_card2_case2(){echo '<input type="text" class="regular-text" name="'.__FUNCTION__.'" value="' . get_option(__FUNCTION__)  . '" placeholder="Titulo Card 2 Case 2">';}
	public function secao2_subtitle_card2_case2(){echo '<input type="text" class="regular-text" name="'.__FUNCTION__.'" value="' . get_option(__FUNCTION__)  . '" placeholder="SubTitulo Card 2 Case 2">';}
	public function secao2_img_bg_card2_case2(){echo $this->d1_upload->get_image_options(__FUNCTION__);}
	//Case 3
	public function secao2_title_card2_case3(){echo '<input type="text" class="regular-text" name="'.__FUNCTION__.'" value="' . get_option(__FUNCTION__)  . '" placeholder="Titulo Card 2 Case 3">';}
	public function secao2_subtitle_card2_case3(){echo '<input type="text" class="regular-text" name="'.__FUNCTION__.'" value="' . get_option(__FUNCTION__)  . '" placeholder="SubTitulo Card 2 Case 3">';}
	public function secao2_img_bg_card2_case3(){echo $this->d1_upload->get_image_options(__FUNCTION__);}
	//-----------------------------Fim Campos de entrada da página seção 2 - Cases de Sucesso---------------------------------------------
}