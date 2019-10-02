<div class="wrap">
	<h1>D1 - Editor de Conteúdos</h1>
	<?php
		settings_errors(); 
		$active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'config_cards';
	?>

    <h2 class="nav-tab-wrapper">
        <a href="?page=d1_plugin_cases&tab=config_cards" class="nav-tab <?php echo $active_tab == 'config_cards' ? 'nav-tab-active' : ''; ?>">Cards</a>
        <a href="?page=d1_plugin_cases&tab=secao1" class="nav-tab <?php echo $active_tab == 'secao1' ? 'nav-tab-active' : ''; ?>">Fale Com Especialista</a>
        <a href="?page=d1_plugin_cases&tab=secao2" class="nav-tab <?php echo $active_tab == 'secao2' ? 'nav-tab-active' : ''; ?>">Seja um Expert</a>
        <input type="hidden" id="destination_field">
    </h2>

    <?php 
		switch($active_tab){
			case 'config_cards':
                settings_fields('d1_card_cases_group');
                do_settings_sections('d1_plugin_cases');
				break;
            case 'secao1':
                echo '<form method="post" action="options.php" enctype="multipart/form-data">';
				settings_fields('secao1_options_group');
                do_settings_sections('d1_plugin_cases');
                submit_button();
                echo '</form>';
				break;
            case 'secao2':
                echo '<form method="post" action="options.php" enctype="multipart/form-data">';
				settings_fields('secao2_options_group');
                do_settings_sections('d1_plugin_cases');
                submit_button();
                echo '</form>';
				break;
			default:
				settings_fields('config_cards');
				do_settings_sections('d1_plugin_cases');
				break;
        }
		?>
</div>