<div class="wrap">
	<h1>D1 - Editor de Conteúdos</h1>
	<?php
		settings_errors(); 
		$active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'secao1';
	?>

    <h2 class="nav-tab-wrapper">
        <a href="?page=d1_plugin_seguranca&tab=secao1" class="nav-tab <?php echo $active_tab == 'secao1' ? 'nav-tab-active' : ''; ?>">Principal</a>
        <a href="?page=d1_plugin_seguranca&tab=secao2" class="nav-tab <?php echo $active_tab == 'secao2' ? 'nav-tab-active' : ''; ?>">Segurança</a>
        <a href="?page=d1_plugin_seguranca&tab=secao3" class="nav-tab <?php echo $active_tab == 'secao3' ? 'nav-tab-active' : ''; ?>">Conformidade</a>
        <a href="?page=d1_plugin_seguranca&tab=secao4" class="nav-tab <?php echo $active_tab == 'secao4' ? 'nav-tab-active' : ''; ?>">Status Sistema</a>
        <input type="hidden" id="destination_field">
    </h2>
    
    <?php 
		switch($active_tab){
            case 'secao1':
                echo '<form method="post" action="options.php" enctype="multipart/form-data">';
                settings_fields('seguranca_secao1_options_group');
                do_settings_sections('d1_plugin_seguranca');
                submit_button();
                echo '</form>';
				break;
            case 'secao2':
                settings_fields('seguranca_secao2_options_group');
                do_settings_sections('d1_plugin_seguranca');
                break;
            case 'secao3':
                settings_fields('seguranca_secao3_options_group');
                do_settings_sections('d1_plugin_seguranca');
                break;
            case 'secao4':
                echo '<form method="post" action="options.php" enctype="multipart/form-data">';
                settings_fields('seguranca_secao4_options_group');
                do_settings_sections('d1_plugin_seguranca');
                submit_button();
                echo '</form>';
                break;
			default:
				settings_fields('seguranca_secao1_options_group');
                do_settings_sections('d1_plugin_seguranca');
                break;
        }
		?>
</div>