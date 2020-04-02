<div class="wrap">
	<h1>D1 - Editor de Conteúdos</h1>
	<?php
		require_once plugin_dir_path(__FILE__) . 'languages_options.php';
		settings_errors(); 
		$active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'config_cards';
	?>

    <h2 class="nav-tab-wrapper">
		<a href="?page=d1_plugin_cases&tab=config_cards" class="nav-tab <?php echo $active_tab == 'config_cards' ? 'nav-tab-active' : ''; ?>">Cases</a>
		<a href="?page=d1_plugin_cases&tab=secao2" class="nav-tab <?php echo $active_tab == 'secao2' ? 'nav-tab-active' : ''; ?>">Categorias</a>
		<a href="?page=d1_plugin_cases&tab=secao4" class="nav-tab <?php echo $active_tab == 'secao4' ? 'nav-tab-active' : ''; ?>">Whitepapers</a>
        <input type="hidden" id="destination_field">
    </h2>

    <?php 
		switch($active_tab){
			case 'config_cards':
                echo '<form method="post" action="options.php" enctype="multipart/form-data">';
				settings_fields('cases_d1_card_group');
				do_settings_sections('d1_plugin_cases');
				submit_button();
                echo '</form>';
                break;
            case 'secao2':
				settings_fields('cases_d1_card_group');
                do_settings_sections('d1_plugin_cases');
				break;
			case 'secao4':
				echo '<form method="post" action="options.php" enctype="multipart/form-data">';
				settings_fields('whitepaper_d1_options_group');
				do_settings_sections('d1_plugin_cases');
				submit_button();
                echo '</form>';
				break;
			default:
				settings_fields('cases_d1_card_group');
				do_settings_sections('d1_plugin_cases');
				break;
        }
		?>
</div>