<?php

class D1_Settings_Api {
	private $teste_options;

	public function __construct(){}

	public function get_d1_general_options() {
        $gerenal_configs = array(
			'title' 					=> 'D1web',
			'descricao_link' 			=> get_option('descricao_link','')
		);

		return $gerenal_configs;
    }
}
