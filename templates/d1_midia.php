<div class="wrap">
	<h1>D1 - Editor de Conteúdos</h1>
	<?php
        require_once plugin_dir_path(__FILE__) . 'languages_options.php';
		settings_errors(); 
		$active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'secao1';
	?>

    <h2 class="nav-tab-wrapper">
        <a href="?page=d1_plugin_d1_midia&tab=secao1" class="nav-tab <?php echo $active_tab == 'secao1' ? 'nav-tab-active' : ''; ?>">Midia</a>
        <a href="?page=d1_plugin_d1_midia&tab=secao2" class="nav-tab <?php echo $active_tab == 'secao2' ? 'nav-tab-active' : ''; ?>">Cases</a>
        <input type="hidden" id="destination_field">
    </h2>
    
    <?php 
		switch($active_tab){
            case 'secao1':
                echo '<form method="post" action="options.php" enctype="multipart/form-data">';
				settings_fields('d1_midia_secao1_options_group');
				do_settings_sections('d1_plugin_d1_midia');
				submit_button();
                echo '</form>';
				break;
            case 'secao2':
                echo '<form method="post" action="options.php" enctype="multipart/form-data">';
                settings_fields('d1_midia_secao2_options_group');
                do_settings_sections('d1_plugin_d1_midia');
                submit_button();
                echo '</form>';
                break;
            case 'secao3':
                echo '<form method="post" action="options.php" enctype="multipart/form-data">';
                settings_fields('d1_midia_secao3_options_group');
                do_settings_sections('d1_plugin_d1_midia');
                submit_button();
                echo '</form>';
                break;
			default:
				settings_fields('d1_midia_secao1_options_group');
                do_settings_sections('d1_plugin_d1_midia');
                break;
        }
		?>
</div>