<?php
/*
    Plugin name: Stefano Javascript
    Plugin uri: https://www.linkedin.com/in/hiago-oliveira-12715011a/
    Descriptions: Freela com Javascript
    Version: 1.0
    Author: Hiago Oliveira
    Author uri: https://www.linkedin.com/in/hiago-oliveira-12715011a/
    License: GPLv2 or later
*/

//require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
//require_once(ABSPATH . 'wp-includes/pluggable.php');
add_action('admin_menu','st_admin_page');

            
function st_admin_page(){
    $slug = "stefano";
    $cap = 'manage_options';
    add_menu_page("Stefano", 'Stefano', $cap,  $slug, false, '', 110);
    //add_submenu_page($slug, "Teste 1", "Teste 1", $cap, $slug);
    //add_submenu_page($slug, "Teste 2", "Teste 2", $cap, $slug);
}

function st_create_page(){
    echo 'teste';
}
