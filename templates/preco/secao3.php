<?php
?>
<!DOCTYPE HTML>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <!-- Fontfaces CSS-->
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
                <fieldset>
                <legend><span class="number">1</span>Cases</legend>
                <div class="row">
                    <?php
                        //obtendo opções salvas no BD
                        global $wpdb;
                        $result = json_decode(json_encode($wpdb->get_results('SELECT * FROM ' . $wpdb->prefix . 'd1_cases')), true);
                        for($i=1;$i<=3;$i++):
                    ?>
                    <div class="col form-style-5 middle">
                        <!-- Início de Select para Card -->
						<label for="preco_secao3_case<?php echo $i;?>">Case <?php echo $i;?>:</label> <select name="preco_secao3_case<?php echo $i;?><?php echo D1Plugin::$language; ?>">
							<option value="0"> Selecione </option>
							<?php
							foreach ($result as $key => &$value) :
								$id_selected = get_option_esc("preco_secao3_case$i");
								if ($value['id_card'] == $id_selected) {
									$value['selected'] = 'selected';
								} else {
									$value['selected'] = '';
								}
								?>
								<option value="<?php echo $value['id_card']; ?>" <?php echo $value['selected']; ?>> <?php echo $value['title_card']; ?> </option>
							<?php endforeach; ?>
						</select>
						<!-- Fim de Select para Card -->
                    </div>
                    <?php endfor; ?>
                </div>
                </fieldset>

            </div>
        </div>
    </div>

</body>