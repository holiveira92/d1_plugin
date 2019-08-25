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
?>