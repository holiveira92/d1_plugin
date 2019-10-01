<?php

/**
 * Trigger this file on Plugin uninstall - TODO: TESTAR A DESINSTALAÇÃO COM PREFIXOS EM NOME DAS TABELAS
 *
 */

if(!defined( 'WP_UNINSTALL_PLUGIN')){
	die;
}

// Clear Database stored data
/*
$teste = get_posts( array( 'post_type' => 'teste', 'numberposts' => -1 ) );

foreach( $teste as $teste ) {
	wp_delete_post($book->ID,true);
}
*/

// Access the database via SQL
/*
global $wpdb;
$wpdb->query( "DELETE FROM wp_posts WHERE post_type = 'teste'" );
$wpdb->query( "DELETE FROM wp_postmeta WHERE post_id NOT IN (SELECT id FROM wp_posts)" );
$wpdb->query( "DELETE FROM wp_term_relationships WHERE object_id NOT IN (SELECT id FROM wp_posts)" );
*/

//another way 2.0
global $wpdb;
global $table_prefix;
$posts = $table_prefix . "posts";
$meta = $table_prefix . "postmeta";
$relationships = $table_prefix . "term_relationships";

// Delete Meta of custom post type (book only)
$wpdb->query("DELETE FROM " . $meta . " WHERE post_id IN (SELECT id FROM " . $posts . " WHERE post_type = 'book')");

// Delete relationships of custom post type ( book only )
$wpdb->query("DELETE FROM " . $relationships . " WHERE object_id IN (SELECT id FROM " . $posts . " WHERE post_type = 'book')");

// Delete records of custom post type ( books )
$wpdb->query("DELETE FROM " . $posts . " WHERE post_type = 'book'");