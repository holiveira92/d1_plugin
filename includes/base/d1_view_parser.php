<?php

class D1_View_Parser {

	public function __construct(){
        require_once  dirname_safe(__FILE__,2).'/fields/admin_fields.php';
        require_once  dirname_safe(__FILE__,2).'/fields/cases_fields.php';
        require_once  dirname_safe(__FILE__,2).'/fields/footer_fields.php';
        $this->admin_fields = new Admin_Fields();
        $this->cases_fields = new Cases_Fields();
        $this->footer_fields = new Footer_Fields();
    }
    
    function get_data(){
        $home_options_settings = $this->admin_fields->getFields();
        $cases_options_settings = $this->cases_fields->getFields();
        $footer_options_settings = $this->footer_fields->getFields();
        $all_options_settings = array_merge($home_options_settings,$cases_options_settings,$footer_options_settings);
        $data_fields['img_default'] = get_template_directory_uri() . "/images/img_default.jpg";
        foreach($all_options_settings as $option){
            foreach($option as $key=>$field_name){
                $page = $field_name['page'];
                $id_option = $field_name['id'];
                $option_value = get_option_esc($field_name['id']);
                $data_fields[$page][$id_option] = !empty($option_value) ? $option_value : "";
            }
        }
        return $data_fields;
    }
}
