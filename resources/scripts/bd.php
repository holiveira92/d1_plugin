<?php 
// Cria uma tabela que ira guardar os IPs de quem aceder ao site.
function st_create_table() {
    // Acede ao objeto global de gestao de bd
    global $wpdb;
    
    // Verifica se a nova tabela existe
    // "prefix" o prefixo escolhido na instalacao do WordPress
    $tablename = $wpdb->prefix . 'd1-design';
    
    // Se a tabela nao existe sera criada
    if ( $wpdb->get_var( "SHOW TABLES LIKE '$tablename'" ) != $tablename ) {
        
        $sql = "CREATE TABLE `$tablename` (
        `id_` int(10) NOT NULL AUTO_INCREMENT,
        `hit_ip` varchar_(100) NOT NULL,
        `hit_date` datetime_ NOT NULL
        );";
    
        // Ao usar a funcao dbDelta() e necessario carregar este ficheiro
        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        
        // Funcao que cria a tabela na bd e executa as otimizacoes necessarias
        dbDelta($sql);
    
    }

}
add_action( 'init', 'st_create_table' );

/*
CREATE TABLE `wp_d1_cases` (
	`id_card` INT(11) NOT NULL AUTO_INCREMENT,
	`title_card` VARCHAR(250) NULL DEFAULT NULL,
	`subtitle_card` VARCHAR(250) NULL DEFAULT NULL,
	`text_footer_card` VARCHAR(250) NULL DEFAULT NULL,
	`subtext_footer_card` VARCHAR(250) NULL DEFAULT NULL,
	`card_link` VARCHAR(250) NULL DEFAULT NULL,
	`img_bg_url` VARCHAR(250) NULL DEFAULT NULL,
	`detach_card` INT(1) NOT NULL DEFAULT 0,
	`desc_card` TEXT NULL DEFAULT NULL,
	`impactos` TEXT NULL DEFAULT NULL,
	`desc_completa_primaria` TEXT NULL DEFAULT NULL,
	`desc_completa_secundaria` TEXT NULL DEFAULT NULL,
	`objetivos_title` VARCHAR(250) NULL DEFAULT NULL,
	`objetivos_desc_completa` TEXT NULL DEFAULT NULL,
	`desafios` TEXT NULL DEFAULT NULL,
	`implantacao` TEXT NULL DEFAULT NULL,
	`cases_options` TEXT NULL DEFAULT NULL,
	PRIMARY KEY (`id_card`)
)
COLLATE='latin1_swedish_ci'
ENGINE=InnoDB
AUTO_INCREMENT=1
;

CREATE TABLE `wp_d1_footer_links` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(300) NULL DEFAULT NULL,
	`link` VARCHAR(300) NULL DEFAULT NULL,
	`group_id` VARCHAR(50) NULL DEFAULT NULL,
	`parent_id` VARCHAR(50) NULL DEFAULT NULL,
	PRIMARY KEY (`id`)
)
COLLATE='latin1_swedish_ci'
ENGINE=InnoDB
AUTO_INCREMENT=1
;

CREATE TABLE `wp_d1_faq` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`question` TEXT NULL DEFAULT NULL,
	`description` TEXT NULL DEFAULT NULL,
	PRIMARY KEY (`id`)
)
ENGINE=InnoDB
;

CREATE TABLE `wp_d1_call_to_action` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`title` VARCHAR(250) NULL DEFAULT NULL,
	`link` VARCHAR(250) NULL DEFAULT NULL,
	`target` VARCHAR(50) NULL DEFAULT NULL,
	PRIMARY KEY (`id`)
)
COLLATE='latin1_swedish_ci'
ENGINE=InnoDB
AUTO_INCREMENT=1
;

CREATE TABLE `wp_d1_cases_categorias` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`descricao` VARCHAR(250) NULL DEFAULT NULL,
	`id_categoria` VARCHAR(50) NULL DEFAULT NULL,
	PRIMARY KEY (`id`)
)
COLLATE='latin1_swedish_ci'
ENGINE=InnoDB
AUTO_INCREMENT=1
;

CREATE TABLE `wp_d1_key_points` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`title` VARCHAR(250) NULL DEFAULT NULL,
	`description` TEXT NULL DEFAULT NULL,
	`url_img` TEXT NULL DEFAULT NULL,
	`page` VARCHAR(50) NULL DEFAULT NULL,
	PRIMARY KEY (`id`)
)
ENGINE=InnoDB
;


*/
?>