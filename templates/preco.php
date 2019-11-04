<div class="wrap">
	<h1>D1 - Editor de Conteúdos</h1>
	<?php
		settings_errors(); 
		$active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'secao1';
	?>

    <h2 class="nav-tab-wrapper">
        <a href="?page=d1_plugin_preco&tab=secao1" class="nav-tab <?php echo $active_tab == 'secao1' ? 'nav-tab-active' : ''; ?>">Principal</a>
        <a href="?page=d1_plugin_preco&tab=secao2" class="nav-tab <?php echo $active_tab == 'secao2' ? 'nav-tab-active' : ''; ?>">FAQ</a>
        <a href="?page=d1_plugin_preco&tab=secao3" class="nav-tab <?php echo $active_tab == 'secao3' ? 'nav-tab-active' : ''; ?>">Cases</a>
        <input type="hidden" id="destination_field">
    </h2>
    
    <?php 
		switch($active_tab){
            case 'secao1':
                echo '<form method="post" action="options.php" enctype="multipart/form-data">';
                settings_fields('preco_secao1_options_group');
                do_settings_sections('d1_plugin_preco');
                submit_button();
                echo '</form>';
				break;
            case 'secao2':
                settings_fields('preco_secao2_options_group');
                do_settings_sections('d1_plugin_preco');
                break;
            case 'secao3':
                echo '<form method="post" action="options.php" enctype="multipart/form-data">';
                settings_fields('preco_secao3_options_group');
                do_settings_sections('d1_plugin_preco');
                submit_button();
                echo '</form>';
                break;
			default:
				settings_fields('preco_secao1_options_group');
                do_settings_sections('d1_plugin_preco');
                break;
        }
		?>
</div>