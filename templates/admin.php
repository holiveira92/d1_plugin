<div class="wrap">
	<h1>D1 - Editor de Conteúdos</h1>
	<?php
		settings_errors(); 
		$active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'secao1';
	?>
		
	<h2 class="nav-tab-wrapper">
		<a href="?page=d1_plugin&tab=secao1" class="nav-tab <?php echo $active_tab == 'secao1' ? 'nav-tab-active' : ''; ?>">Hero - Slider</a>
		<a href="?page=d1_plugin&tab=secao2" class="nav-tab <?php echo $active_tab == 'secao2' ? 'nav-tab-active' : ''; ?>">Cases</a>
		<a href="?page=d1_plugin&tab=secao3" class="nav-tab <?php echo $active_tab == 'secao3' ? 'nav-tab-active' : ''; ?>">Clientes</a>
		<a href="?page=d1_plugin&tab=secao4" class="nav-tab <?php echo $active_tab == 'secao4' ? 'nav-tab-active' : ''; ?>">Desafios</a>
		<a href="?page=d1_plugin&tab=secao5" class="nav-tab <?php echo $active_tab == 'secao5' ? 'nav-tab-active' : ''; ?>">Lead Generator</a>
		<a href="?page=d1_plugin&tab=secao6" class="nav-tab <?php echo $active_tab == 'secao6' ? 'nav-tab-active' : ''; ?>">Solução</a>
		<a href="?page=d1_plugin&tab=secao7" class="nav-tab <?php echo $active_tab == 'secao7' ? 'nav-tab-active' : ''; ?>">Diferencial</a>
		<input type="hidden" id="destination_field">
	</h2>
	
		<?php 
		switch($active_tab){
			case 'secao1':
				settings_fields('home_secao1_options_group');
				do_settings_sections('d1_plugin');
				break;
			case 'secao2':
				echo '<form method="post" action="options.php" enctype="multipart/form-data">';
				settings_fields('home_secao2_options_group');
				do_settings_sections('d1_plugin');
				submit_button();
                echo '</form>';
                break;
			case 'secao3':
				echo '<form method="post" action="options.php" enctype="multipart/form-data">';
				settings_fields('home_secao3_options_group');
				do_settings_sections('d1_plugin');
				submit_button();
                echo '</form>';
                break;
			case 'secao4':
				echo '<form method="post" action="options.php" enctype="multipart/form-data">';
				settings_fields('home_secao4_options_group');
				do_settings_sections('d1_plugin');
				submit_button();
                echo '</form>';
                break;
			case 'secao5':
				echo '<form method="post" action="options.php" enctype="multipart/form-data">';
				settings_fields('home_secao5_options_group');
				do_settings_sections('d1_plugin');
				submit_button();
                echo '</form>';
                break;
			case 'secao6':
				echo '<form method="post" action="options.php" enctype="multipart/form-data">';
				settings_fields('home_secao6_options_group');
				do_settings_sections('d1_plugin');
				submit_button();
                echo '</form>';
                break;
			case 'secao7':
				echo '<form method="post" action="options.php" enctype="multipart/form-data">';
				settings_fields('home_secao7_options_group');
				do_settings_sections('d1_plugin');
				submit_button();
                echo '</form>';
				break;
			case 'modulos':
				settings_fields('home_secao7_options_group');
				do_settings_sections('d1_plugin');
				break;
			case 'hero':
				settings_fields('home_secao7_options_group');
				do_settings_sections('d1_plugin');
				break;
			default:
				echo '<form method="post" action="options.php" enctype="multipart/form-data">';
				settings_fields('home_secao1_options_group');
				do_settings_sections('d1_plugin');
				submit_button();
                echo '</form>';
				break;
		}
		?>
</div>