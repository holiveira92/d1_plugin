<?php

class D1_Upload {

	public function __construct(){
        $this->img_default = get_template_directory_uri() . "/images/img_default.jpg";
        $this->setup();
	}

	function get_image_options($name_field){
		$img_options = esc_url(get_option($name_field));
		$name_button = $name_field . '_d1_upload_btn';
		$name_del_button = $name_field . '_d1_btn_del';
		$name_img_preview = $name_field . '_d1_img_preview';
		$img_component = "<input type='hidden' id=$name_field name=$name_field value='$img_options' readonly='readonly'>";
		if(!empty($img_options)){
			$img_component = $img_component . "<div id=$name_img_preview style='min-height: 100px;margin-top: 10px;'> <img id=$name_img_preview style='max-width:100%;' src=$img_options /> </div>";
			$img_component = $img_component . "<input dest=$name_field name=$name_button type='button' class='button' value='Upload Image'/>";
			$img_component = $img_component . "<input dest=$name_field name=$name_del_button type='button' class='button' value='Deletar Imagem' />";
		}
		//inserir imagem padrão para preview
		else{
			$img_component = $img_component . "<div id=$name_img_preview style='min-height: 100px;margin-top: 10px;'> <img id=$name_img_preview style='max-width:100%;' src=$this->img_default  /> </div>";
			$img_component = $img_component . "<input dest=$name_field name=$name_button type='button' class='button' value='Upload Imagem'/>";
		}
		return $img_component;
	}

	private function setup() {
        global $pagenow;
        if ('media-upload.php'==$pagenow || 'async-upload.php'==$pagenow) {
            //Trocando'Insert into Post Button' dentro do Thickbox(caixa de upload)
            add_filter('gettext',array($this,'replace_thickbox_text'),1,3);
        }
    }
     
    function replace_thickbox_text($translated_text,$text,$domain){
        if ('Insert into Post'==$text){
            $referer = strpos( wp_get_referer(),'d1_upload_settings');
            if ($referer!=''){
                return __('Inserir esta imagem na opção selecionada','d1_plugin');
            }
        }
        return $translated_text;
    }
	
	function delete_image($image_url){
		global $wpdb;
		$query = "SELECT ID FROM wp_posts where guid = '" . esc_url($image_url) . "' AND post_type = 'attachment'";
		$results = $wpdb->get_results($query);
		foreach($results as $row){
			wp_delete_attachment($row->ID);
		}
	}
}
