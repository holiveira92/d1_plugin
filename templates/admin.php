<div class="wrap">
	<h1>D1 Plugin - Configurações do Tema D1 Design</h1>
	<?php
		settings_errors(); 
		$active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'config_geral';
	?>
		
	<h2 class="nav-tab-wrapper">
		<a href="?page=d1_plugin&tab=config_geral" class="nav-tab <?php echo $active_tab == 'config_geral' ? 'nav-tab-active' : ''; ?>">Geral</a>
		<a href="?page=d1_plugin&tab=secao1" class="nav-tab <?php echo $active_tab == 'secao1' ? 'nav-tab-active' : ''; ?>">Seção1-Hero</a>
		<a href="?page=d1_plugin&tab=secao2" class="nav-tab <?php echo $active_tab == 'secao2' ? 'nav-tab-active' : ''; ?>">Seção2-Cases</a>
		<a href="?page=d1_plugin&tab=secao3" class="nav-tab <?php echo $active_tab == 'secao3' ? 'nav-tab-active' : ''; ?>">Seção3</a>
		<a href="?page=d1_plugin&tab=secao4" class="nav-tab <?php echo $active_tab == 'secao4' ? 'nav-tab-active' : ''; ?>">Seção4</a>
		<a href="?page=d1_plugin&tab=secao5" class="nav-tab <?php echo $active_tab == 'secao5' ? 'nav-tab-active' : ''; ?>">Seção5</a>
		<a href="?page=d1_plugin&tab=secao6" class="nav-tab <?php echo $active_tab == 'secao6' ? 'nav-tab-active' : ''; ?>">Seção6</a>
		<a href="?page=d1_plugin&tab=secao7" class="nav-tab <?php echo $active_tab == 'secao7' ? 'nav-tab-active' : ''; ?>">Seção7</a>
		<a href="?page=d1_plugin&tab=secao8" class="nav-tab <?php echo $active_tab == 'secao8' ? 'nav-tab-active' : ''; ?>">Seção8</a>
		<a href="?page=d1_plugin&tab=secao9" class="nav-tab <?php echo $active_tab == 'secao9' ? 'nav-tab-active' : ''; ?>">Seção9</a>
	</h2>
	
	<form method="post" action="options.php">
		<?php 
		switch($active_tab){
			case 'config_geral':
				settings_fields('d1_options_group');
				do_settings_sections('d1_plugin');
				break;
			case 'secao1':
				settings_fields('secao1_options_group');
				do_settings_sections('d1_plugin');
				break;
			case 'secao2':
				settings_fields('secao2_options_group');
				do_settings_sections('d1_plugin');
				break;
			default:
				settings_fields('d1_options_group');
				do_settings_sections('d1_plugin');
				break;
            
        }
        submit_button();
		?>
	</form>
</div>