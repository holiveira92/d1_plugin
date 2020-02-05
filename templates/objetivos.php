<div class="wrap">
	<h1>D1 - Editor de Conteúdos</h1>
	<?php
		settings_errors(); 
		$active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'secao1';
	?>

    <h2 class="nav-tab-wrapper">
        <input type="hidden" id="destination_field">
    </h2>
    
    <?php 
		switch($active_tab){
            case 'secao1':
                settings_fields('objetivos_secao1_options_group');
                do_settings_sections('d1_plugin_objetivos');
				break;
            case 'secao2':
                settings_fields('objetivos_secao2_options_group');
                do_settings_sections('d1_plugin_objetivos');
                break;
            case 'secao3':
                echo '<form method="post" action="options.php" enctype="multipart/form-data">';
                settings_fields('objetivos_secao3_options_group');
                do_settings_sections('d1_plugin_objetivos');
                submit_button();
                echo '</form>';
                break;
			default:
				settings_fields('objetivos_secao1_options_group');
                do_settings_sections('d1_plugin_objetivos');
                break;
        }
		?>
</div>