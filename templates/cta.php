<div class="wrap">
	<h1>D1 - Editor de Conteúdos</h1>
	<?php
		settings_errors(); 
		$active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'secao1';
	?>

    <h2 class="nav-tab-wrapper">
        <a href="?page=d1_plugin_cta&tab=secao1" class="nav-tab <?php echo $active_tab == 'secao1' ? 'nav-tab-active' : ''; ?>">Principal</a>
        <a href="?page=d1_plugin_cta&tab=secao2" class="nav-tab <?php echo $active_tab == 'secao2' ? 'nav-tab-active' : ''; ?>">FAQ</a>
        <input type="hidden" id="destination_field">
    </h2>
    
    <?php 
		switch($active_tab){
            case 'secao1':
                settings_fields('cta_secao2_options_group');
                do_settings_sections('d1_plugin_cta');
                break;
            case 'secao2':
                settings_fields('cta_secao2_options_group');
                do_settings_sections('d1_plugin_cta');
                break;
            case 'secao3':
                echo '<form method="post" action="options.php" enctype="multipart/form-data">';
                settings_fields('cta_secao3_options_group');
                do_settings_sections('d1_plugin_cta');
                submit_button();
                echo '</form>';
                break;
			default:
				settings_fields('cta_secao1_options_group');
                do_settings_sections('d1_plugin_cta');
                break;
        }
		?>
</div>