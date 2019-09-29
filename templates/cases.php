<div class="wrap">
	<h1>D1 - Editor de Conteúdos</h1>
	<?php
		settings_errors(); 
		$active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'config_geral';
	?>
	<form method="post" action="options.php" enctype="multipart/form-data">
		<?php 
		settings_fields('d1_cases_group');
        do_settings_sections('d1_plugin_cases');
        submit_button();
		?>
	</form>
</div>