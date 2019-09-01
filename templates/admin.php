<div class="wrap">
	<h1>D1 Plugin - Configurações do Tema D1 Design</h1>
	<?php settings_errors(); ?>

	<?php
		$active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'home_options';
    ?>
		
	<h2 class="nav-tab-wrapper">
		<a href="?page=d1_plugin&tab=home_options" class="nav-tab <?php echo $active_tab == 'home_options' ? 'nav-tab-active' : ''; ?>">Home</a>
		<a href="?page=d1_plugin&tab=plataforma_options" class="nav-tab <?php echo $active_tab == 'plataforma_options' ? 'nav-tab-active' : ''; ?>">Plataforma</a>
	</h2>
	
	<form method="post" action="options.php">
		<?php 
		/*
			settings_fields('d1_options_group');
			do_settings_sections('d1_plugin');
			submit_button();
		*/

		if($active_tab=='home_options'){
            settings_fields('d1_options_group');
            do_settings_sections('d1_plugin');
        }else{
            //settings_fields( 'sandbox_theme_social_options' );
            //do_settings_sections( 'sandbox_theme_social_options' );
        }
        submit_button();
		?>
	</form>
</div>