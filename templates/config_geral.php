<div class="wrap">
	<h1>D1 - Editor de Conteúdos</h1>
	<?php
		settings_errors(); 
		$active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'secao1';
	?>
		
	<h2 class="nav-tab-wrapper">
		<a href="?page=d1_plugin_config_geral&tab=secao1" class="nav-tab <?php echo $active_tab == 'secao1' ? 'nav-tab-active' : ''; ?>">Config. Geral</a>
		<a href="?page=d1_plugin_config_geral&tab=secao2" class="nav-tab <?php echo $active_tab == 'secao2' ? 'nav-tab-active' : ''; ?>">Linguagem</a>
		<input type="hidden" id="destination_field">
	</h2>
	
		<?php 
		switch($active_tab){
			case 'secao1':
				echo '<form method="post" action="options.php" enctype="multipart/form-data">';
				settings_fields('config_geral_secao_1');
				do_settings_sections('d1_plugin_config_geral');
				submit_button();
                echo '</form>';
				break;
			case 'secao2':
				echo '<form method="post" action="options.php" enctype="multipart/form-data">';
				settings_fields('config_geral_secao_2');
				do_settings_sections('d1_plugin_config_geral');
				submit_button();
				echo '</form>';
				break;
			default:
				echo '<form method="post" action="options.php" enctype="multipart/form-data">';
				settings_fields('config_geral_secao_1');
				do_settings_sections('d1_plugin_config_geral');
				submit_button();
                echo '</form>';
				break;
		}
		?>
</div>