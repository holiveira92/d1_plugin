<?php
class Footer_Fields {
	private $path_data_fields;
	private $path_data_settings;
	private $active_tab;

	public function __construct(){
		require_once plugin_dir_path(dirname_safe(__FILE__,2)) . 'includes/base/d1_upload.php';
		$this->d1_upload = new D1_Upload();
		$this->path_data_fields = plugin_dir_path(dirname_safe(__FILE__,2)) . 'includes/fields/register/footer_fields.json';
		$this->path_data_settings = plugin_dir_path(dirname_safe(__FILE__,2)) . 'includes/fields/register/footer_settings.json';
		$this->active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'secao1';
    }

    public function getSettings($opt_group=false,$page='d1_plugin_footer'){
		$settings = array();
		$config_data_settings = $this->getConfigDataSettings($this->path_data_settings);
		if($opt_group){
			$settings = $config_data_settings[$opt_group];
		}else{
			$settings = $config_data_settings;
		}
		return $settings;
	}

	private function getConfigDataSettings($path){
		//No arquivo JSON estarão as configurações sobre as seções e respectivos options_groups de campos
		$json = file_get_contents($path); 
		$config_data = json_decode($json,true);
		$config_data = !empty($config_data) ? $config_data : array();
		foreach($config_data as $k=>&$config){
			foreach($config as $key=>&$v){
				$v['option_group'] = $k;
			}
		}
		return $config_data;
	}
	
    public function getFields($section=false,$page='d1_plugin_footer'){
		$fields = array();
		$config_data_fields = $this->getConfigDataFields($this->path_data_fields,$page,$section);
		if($section){
			$fields = $config_data_fields[$section];
		}else{
			$fields = $config_data_fields;
		}
		
        return $fields;
    }
	
	private function getConfigDataFields($path,$page,$section){
		//No arquivo JSON estarão as configurações sobre as seções e respectivos options_groups de campos
		$json = file_get_contents($path); 
		$config_data = json_decode($json,true);
		$config_data = !empty($config_data) ? $config_data : array();
		$config_data = $this->getCallbackClass($config_data,$page,$section);
		return $config_data;
	}
	private function getCallbackClass($data,$page,$section){
		if(empty($data))
			return array();
		
		foreach($data as &$conf){
			foreach($conf as $key=>&$option){
				$option['page'] = $page;
				$option['section'] = $section;
			}
		}
		return $data;
	}

	/* 	----------------------------------------------------------------------------------------------------------------------------
		Callback dos options group
		Funções callbacks devem ter o nome do grupo de opções correspondente
		----------------------------------------------------------------------------------------------------------------------------
	*/ 
    public function d1_footer_secao1($input){return $input;}
    public function d1_footer_secao2($input){return $input;}
    public function d1_footer_secao3($input){return $input;}
}