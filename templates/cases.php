<div class="wrap">
	<h1>D1 - Editor de Conteúdos</h1>
	<?php
		settings_errors(); 
		$active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'config_cards';
	?>

    <h2 class="nav-tab-wrapper">
        <a href="?page=d1_plugin_cases&tab=config_cards" class="nav-tab <?php echo $active_tab == 'config_cards' ? 'nav-tab-active' : ''; ?>">Cards</a>
        <input type="hidden" id="destination_field">
    </h2>

    <?php 
		switch($active_tab){
			case 'config_cards':
                settings_fields('cases_d1_card_group');
                do_settings_sections('d1_plugin_cases');
				break;
            case 'secao1':
				settings_fields('cases_d1_card_group');
                do_settings_sections('d1_plugin_cases');
				break;
			default:
				settings_fields('config_cards');
				do_settings_sections('d1_plugin_cases');
				break;
        }
		?>
</div>