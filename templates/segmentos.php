<div class="wrap">
	<h1>D1 - Editor de Conteúdos</h1>
	<?php
		settings_errors(); 
		$active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'secao1';
	?>

    <h2 class="nav-tab-wrapper">
        <a href="?page=d1_plugin_segmentos&tab=secao1" class="nav-tab <?php echo $active_tab == 'secao1' ? 'nav-tab-active' : ''; ?>">Principal</a>
        <a href="?page=d1_plugin_segmentos&tab=secao2" class="nav-tab <?php echo $active_tab == 'secao2' ? 'nav-tab-active' : ''; ?>">Desafios</a>
        <a href="?page=d1_plugin_segmentos&tab=secao3" class="nav-tab <?php echo $active_tab == 'secao3' ? 'nav-tab-active' : ''; ?>">Key Points</a>
        <input type="hidden" id="destination_field">
    </h2>
    
    <form method="post" action="options.php" enctype="multipart/form-data">
    <?php 
		switch($active_tab){
            case 'secao1':
                settings_fields('segmentos_secao1_options_group');
                do_settings_sections('d1_plugin_segmentos');
				break;
            case 'secao2':
                settings_fields('segmentos_secao2_options_group');
                do_settings_sections('d1_plugin_segmentos');
                break;
            case 'secao3':
                settings_fields('segmentos_secao3_options_group');
                do_settings_sections('d1_plugin_segmentos');
                break;
			default:
				settings_fields('segmentos_secao1_options_group');
                do_settings_sections('d1_plugin_segmentos');
                break;
        }
        submit_button();
		?>
    </form>
</div>