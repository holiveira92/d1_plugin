<?php

class D1_View_Parser {

	public function __construct(){
        require_once  $this->dirname_safe_parser(__FILE__,2) . '/fields/admin_fields.php';
        require_once  $this->dirname_safe_parser(__FILE__,2) . '/fields/cases_fields.php';
        require_once  $this->dirname_safe_parser(__FILE__,2) . '/fields/footer_fields.php';
        require_once  $this->dirname_safe_parser(__FILE__,2) . '/fields/segmentos_fields.php';
        require_once  $this->dirname_safe_parser(__FILE__,2) . '/fields/plataforma_fields.php';
        require_once  $this->dirname_safe_parser(__FILE__,2) . '/fields/jornada_fields.php';
        require_once  $this->dirname_safe_parser(__FILE__,2) . '/fields/seguranca_fields.php';
        require_once  $this->dirname_safe_parser(__FILE__,2) . '/fields/preco_fields.php';
        require_once  $this->dirname_safe_parser(__FILE__,2) . '/fields/contato_fields.php';
        require_once  $this->dirname_safe_parser(__FILE__,2) . '/fields/d1_midia_fields.php';
        require_once  $this->dirname_safe_parser(__FILE__,2) . '/fields/modulos_fields.php';
        require_once  $this->dirname_safe_parser(__FILE__,2) . '/fields/objetivos_fields.php';
        require_once  $this->dirname_safe_parser(__FILE__,2) . '/fields/departamentos_fields.php';
        require_once  $this->dirname_safe_parser(__FILE__,2) . '/fields/config_geral_fields.php';
        $this->admin_fields = new Admin_Fields();
        $this->cases_fields = new Cases_Fields();
        $this->footer_fields = new Footer_Fields();
        $this->segmentos_fields = new Segmentos_Fields();
        $this->plataforma_fields = new Plataforma_Fields();
        $this->jornada_fields = new Jornada_Fields();
        $this->seguranca_fields = new Seguranca_Fields();
        $this->preco_fields = new Preco_Fields();
        $this->contato_fields = new Contato_Fields();
        $this->d1_midia_fields = new D1_Midia_Fields();
        $this->modulos_fields = new Modulos_Fields();
        $this->objetivos_fields = new Objetivos_Fields();
        $this->departamentos_fields = new Departamentos_Fields();
        $this->config_geral_fields = new Config_Geral_Fields();
    }
    
    function dirname_safe_parser($path, $level = 0){
        $dir = explode(DIRECTORY_SEPARATOR, $path);
        $level = $level * -1;
        if ($level == 0) $level = count($dir);
        array_splice($dir, $level);
        return implode($dir, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;
    }

    function get_data($language="PT"){
        $home_options_settings = $this->admin_fields->getFields();
        $cases_options_settings = $this->cases_fields->getFields();
        $footer_options_settings = $this->footer_fields->getFields();
        $segmentos_options_settings = $this->segmentos_fields->getFields();
        $plataforma_options_settings = $this->plataforma_fields->getFields();
        $jornada_options_settings = $this->jornada_fields->getFields();
        $seguranca_options_settings = $this->seguranca_fields->getFields();
        $preco_options_settings = $this->preco_fields->getFields();
        $contato_options_settings = $this->contato_fields->getFields();
        $d1_midia_options_settings = $this->d1_midia_fields->getFields();
        $modulos_options_settings = $this->modulos_fields->getFields();
        $objetivos_options_settings = $this->objetivos_fields->getFields();
        $departamentos_options_settings = $this->departamentos_fields->getFields();
        $config_geral_options_settings = $this->config_geral_fields->getFields();
        $all_options_settings = array_merge(
            $home_options_settings,
            $cases_options_settings,
            $footer_options_settings,
            $segmentos_options_settings,
            $plataforma_options_settings,
            $jornada_options_settings,
            $seguranca_options_settings,
            $preco_options_settings,
            $contato_options_settings,
            $d1_midia_options_settings,
            $modulos_options_settings,
            $objetivos_options_settings,
            $departamentos_options_settings,
            $config_geral_options_settings
        );
        
        $data_fields['img_default'] = get_template_directory_uri() . "/images/img_default.jpg";
        foreach($all_options_settings as $option){
            foreach($option as $key=>$field_name){
                $page = $field_name['page'];
                $id_option = $field_name['id'];
                $language_option = ($language == "PT") ? "" : "_" . $language;
                $option_value       = get_option($field_name['id'].$language_option);
                if(empty($option_value) && ( strpos($field_name['id'], 'image') !== false 
                    || strpos($field_name['id'], 'img') !== false || strpos($field_name['id'], 'favicon') !== false 
                    || strpos($field_name['id'], 'logo') !== false )){
                    $option_value = $data_fields['img_default'];
                }

                if(empty($option_value)){
                    $option_value   = "Insira uma Informação";
                }
                $data_fields[$page][$id_option] = !empty($option_value) ? $option_value : "";
            }
        }
        return $data_fields;
    }
}
