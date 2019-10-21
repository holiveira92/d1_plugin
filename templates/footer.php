<div class="wrap">
	<h1>D1 - Editor de Conteúdos</h1>
	<?php
		settings_errors(); 
		$active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'secao1';
	?>

    <h2 class="nav-tab-wrapper">
        <a href="?page=d1_plugin_footer&tab=secao1" class="nav-tab <?php echo $active_tab == 'secao1' ? 'nav-tab-active' : ''; ?>">Pré-Footer</a>
        <a href="?page=d1_plugin_footer&tab=secao2" class="nav-tab <?php echo $active_tab == 'secao2' ? 'nav-tab-active' : ''; ?>">Blog</a>
        <a href="?page=d1_plugin_footer&tab=secao3" class="nav-tab <?php echo $active_tab == 'secao3' ? 'nav-tab-active' : ''; ?>">Footer</a>
        <input type="hidden" id="destination_field">
    </h2>
    
    <form method="post" action="options.php" enctype="multipart/form-data">
    <?php 
		switch($active_tab){
            case 'secao1':
                settings_fields('footer_secao1_options_group');
                do_settings_sections('d1_plugin_footer');
				break;
            case 'secao2':
                settings_fields('footer_secao2_options_group');
                do_settings_sections('d1_plugin_footer');
                break;
            case 'secao3':
                settings_fields('footer_secao3_options_group');
                do_settings_sections('d1_plugin_footer');
				break;
			default:
				settings_fields('footer_secao1_options_group');
                do_settings_sections('d1_plugin_footer');
				break;
        }
        submit_button();
		?>
    </form>
</div>