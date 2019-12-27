<?php
?>
<!DOCTYPE HTML>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<!-- Fontfaces CSS--><?php require_once dirname_safe(__FILE__,3) . 'includes/base/d1_constants.php'; ?>
	<link href="<?php echo plugins_url('d1_plugin/resources/css/font-face.css', 'd1_plugin'); ?>" rel="stylesheet" media="all">
	<link href="<?php echo plugins_url('d1_plugin/resources/vendor/font-awesome-4.7/css/font-awesome.min.css', 'd1_plugin'); ?>" rel="stylesheet" media="all">
	<link href="<?php echo plugins_url('d1_plugin/resources/vendor/font-awesome-5/css/fontawesome-all.min.css', 'd1_plugin'); ?>" rel="stylesheet" media="all">
	<link href="<?php echo plugins_url('d1_plugin/resources/vendor/mdi-font/css/material-design-iconic-font.min.css', 'd1_plugin'); ?>" rel="stylesheet" media="all">

	<!-- Bootstrap CSS-->
	<link href="<?php echo plugins_url('d1_plugin/resources/vendor/bootstrap-4.1/bootstrap.min.css', 'd1_plugin'); ?>" rel="stylesheet" media="all">

	<!-- Vendor CSS-->
	<link href="<?php echo plugins_url('d1_plugin/resources/vendor/animsition/animsition.min.css', 'd1_plugin'); ?>" rel="stylesheet" media="all">
	<link href="<?php echo plugins_url('d1_plugin/resources/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css', 'd1_plugin'); ?>" rel="stylesheet" media="all">
	<link href="<?php echo plugins_url('d1_plugin/resources/vendor/wow/animate.css', 'd1_plugin'); ?>" rel="stylesheet" media="all">
	<link href="<?php echo plugins_url('d1_plugin/resources/vendor/css-hamburgers/hamburgers.min.css', 'd1_plugin'); ?>" rel="stylesheet" media="all">
	<link href="<?php echo plugins_url('d1_plugin/resources/vendor/slick/slick.css', 'd1_plugin'); ?>" rel="stylesheet" media="all">
	<link href="<?php echo plugins_url('d1_plugin/resources/vendor/select2/select2.min.css', 'd1_plugin'); ?>" rel="stylesheet" media="all">
	<link href="<?php echo plugins_url('d1_plugin/resources/vendor/perfect-scrollbar/perfect-scrollbar.css', 'd1_plugin'); ?>" rel="stylesheet" media="all">
	<!-- Main CSS-->
	<link href="<?php echo plugins_url('d1_plugin/resources/css/theme.css', 'd1_plugin'); ?>" rel="stylesheet" media="all">
</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col form-style-5">
				<!-- ------------------------------------- Início Seção Config. Seção -  Cases de Sucesso --------------------------------------->
				<!-- Titulo Seção Parte 1 -->

				<div id='secao2_content1' class="content">
					<fieldset>
						<legend><span class="number">1</span>Informações da Seção</legend>
						<label for="secao2_section_title">Título:</label> <input type="text" name="secao2_section_title<?php echo D1Plugin::$language; ?>" value="<?php echo get_option_esc('secao2_section_title') ?>">
						<label for="secao2_call_action_cases">Chamada para Ação - Cases:</label> <input type="text" name="secao2_call_action_cases<?php echo D1Plugin::$language; ?>" value="<?php echo get_option_esc('secao2_call_action_cases') ?>">
					</fieldset>
				</div>
				<!-- ------------------------------------- Fim Seção Config. Seção -  Cases de Sucesso ------------------------------------------>

				<!-- ------------------------------------- Início Seção Cards Cases de Sucesso ----------------------------------------------->
				<?php
				//obtendo opções salvas no BD
				global $wpdb;
				$result = json_decode(json_encode($wpdb->get_results('SELECT * FROM ' . $wpdb->prefix . D1_LANG . 'd1_cases')), true);
				?>
			</div>
			<div class="col form-style-5">
				<!-- Card Primeira Parte -->
				<!-- Lista de Cards Disponíveis -->
				<div id='secao2_content2' class="content">
					<fieldset>
						<legend><span class="number">2</span>Selecione os Cases</legend>
						<span class="margin-bottom"> Verifique o cadastro de cases de sucesso <a href="?page=d1_plugin_cases&tab=config_cards">clicando aqui</a></span>
						<!-- Início de Select para Card 1 -->
						<label for="secao2_select_card_cases1">Selecione Opção 1:</label> <select name="secao2_select_card_cases1<?php echo D1Plugin::$language; ?>">
							<option value="0"> Selecione </option>
							<?php
							foreach ($result as $key => &$value) :
								$id_selected = get_option_esc('secao2_select_card_cases1');
								if ($value['id_card'] == $id_selected) {
									$value['selected'] = 'selected';
								} else {
									$value['selected'] = '';
								}
								?>
								<option value="<?php echo $value['id_card']; ?>" <?php echo $value['selected']; ?>> <?php echo $value['title_card']; ?> </option>
							<?php endforeach; ?>
						</select>
						<!-- Fim de Select para Card 1 -->

						<!-- Início de Select para Card 2 -->
						<label for="secao2_select_card_cases2">Selecione Opção 2:</label> <select name="secao2_select_card_cases2<?php echo D1Plugin::$language; ?>">
							<option value="0"> Selecione </option>
							<?php
							foreach ($result as $key => &$value) :
								$id_selected = get_option_esc('secao2_select_card_cases2');
								if ($value['id_card'] == $id_selected) {
									$value['selected'] = 'selected';
								} else {
									$value['selected'] = '';
								}
								?>
								<option value="<?php echo $value['id_card']; ?>" <?php echo $value['selected']; ?>> <?php echo $value['title_card']; ?> </option>
							<?php endforeach; ?>
						</select>
						<!-- Fim de Select para Card 2 -->

						<!-- Início de Select para Card 3 -->
						<label for="secao2_select_card_cases3">Selecione Opção 3:</label> <select name="secao2_select_card_cases3<?php echo D1Plugin::$language; ?>">
							<option value="0"> Selecione </option>
							<?php
							foreach ($result as $key => &$value) :
								$id_selected = get_option_esc('secao2_select_card_cases3');
								if ($value['id_card'] == $id_selected) {
									$value['selected'] = 'selected';
								} else {
									$value['selected'] = '';
								}
								?>
								<option value="<?php echo $value['id_card']; ?>" <?php echo $value['selected']; ?>> <?php echo $value['title_card']; ?> </option>
							<?php endforeach; ?>
						</select>
						<!-- Fim de Select para Card 3 -->

					</fieldset>
				</div>
				<!-- ------------------------------------- Fim Seção Cards Cases de Sucesso ----------------------------------------------->
			</div>
		</div>
	</div>
</body>

</html>

<script>
	//JS para expandir e reduzir conteudo
	var coll = document.getElementsByClassName("collapsible");
	var i;
	for (i = 0; i < coll.length; i++) {
		coll[i].addEventListener("click", function() {
			this.classList.toggle("active");
			var content = this.nextElementSibling;
			if (content.style.display === "block") {
				//content.style.display = "none";
			} else {
				//content.style.display = "block";
			}
		});
	}
</script>