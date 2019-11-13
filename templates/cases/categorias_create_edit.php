<?php
function pre($data) {
    echo "<pre>";
        print_r($data);
    echo "</pre>";
}

define( 'SHORTINIT', true );
require(trim($_REQUEST["path_wp"]) . "wp-load.php");
global $wpdb;
$id_card                = !empty($_REQUEST["id_card"]) ? $_REQUEST["id_card"]: false;

$impactos_data = array(
    'impacto_title'     => !empty($_REQUEST['impacto_title']) ? $_REQUEST['impacto_title'] : '',
    'impacto1_total'    => !empty($_REQUEST['impacto1_total']) ? $_REQUEST['impacto1_total'] : '',
    'impacto1_desc'     => !empty($_REQUEST['impacto1_desc']) ? $_REQUEST['impacto1_desc'] : '',
    'impacto2_title'    => !empty($_REQUEST['impacto2_title']) ? $_REQUEST['impacto2_title'] : '',
    'impacto2_total'    => !empty($_REQUEST['impacto2_total']) ? $_REQUEST['impacto2_total'] : '',
    'impacto2_desc'     => !empty($_REQUEST['impacto2_desc']) ? $_REQUEST['impacto2_desc'] : '',
    'impacto3_title'    => !empty($_REQUEST['impacto3_title']) ? $_REQUEST['impacto3_title'] : '',
    'impacto3_total'    => !empty($_REQUEST['impacto3_total']) ? $_REQUEST['impacto3_total'] : '',
    'impacto3_desc'     => !empty($_REQUEST['impacto3_desc']) ? $_REQUEST['impacto3_desc'] : '',
);

$desafios_data = array(
    'desafios_title'            => !empty($_REQUEST['desafios_title']) ? $_REQUEST['desafios_title'] : '',
    'desafio1_desc_completa'    => !empty($_REQUEST['desafio1_desc_completa']) ? $_REQUEST['desafio1_desc_completa'] : '',
    'desafio2_desc_completa'    => !empty($_REQUEST['desafio2_desc_completa']) ? $_REQUEST['desafio2_desc_completa'] : '',
    'desafio3_desc_completa'    => !empty($_REQUEST['desafio3_desc_completa']) ? $_REQUEST['desafio3_desc_completa'] : '',
);

$implantacao_data = array(
    'implantacao_title'             => !empty($_REQUEST['implantacao_title']) ? $_REQUEST['implantacao_title'] : '',
    'implantacao_desc_primaria'     => !empty($_REQUEST['implantacao_desc_primaria']) ? $_REQUEST['implantacao_desc_primaria'] : '',
    'implantacao_desc_secundaria'   => !empty($_REQUEST['implantacao_desc_secundaria']) ? $_REQUEST['implantacao_desc_secundaria'] : '',
    'implantacao_resultado1_title'  => !empty($_REQUEST['implantacao_resultado1_title']) ? $_REQUEST['implantacao_resultado1_title'] : '',
    'implantacao_resultado1_valor'  => !empty($_REQUEST['implantacao_resultado1_valor']) ? $_REQUEST['implantacao_resultado1_valor'] : '',
    'implantacao_resultado1_desc'   => !empty($_REQUEST['implantacao_resultado1_desc']) ? $_REQUEST['implantacao_resultado1_desc'] : '',
    'implantacao_resultado2_title'  => !empty($_REQUEST['implantacao_resultado2_title']) ? $_REQUEST['implantacao_resultado2_title'] : '',
    'implantacao_resultado2_valor'  => !empty($_REQUEST['implantacao_resultado2_valor']) ? $_REQUEST['implantacao_resultado2_valor'] : '',
    'implantacao_resultado2_desc'   => !empty($_REQUEST['implantacao_resultado2_desc']) ? $_REQUEST['implantacao_resultado2_desc'] : '',
);

$cases_options_data = array(
    'cases_random'                  => $_REQUEST['cases_random'],
    'list_case1'                    => $_REQUEST['list_case1'],
    'list_case2'                    => $_REQUEST['list_case2'],
    'list_case3'                    => $_REQUEST['list_case3'],
);

//consolida as informações
$data = array(
    'id_card'               => !empty($_REQUEST["id_card"]) ? $_REQUEST["id_card"] : '',
    'title_card'            => !empty($_REQUEST["title_card"]) ? $_REQUEST["title_card"] : '',
    'desc_card'             => !empty($_REQUEST["desc_card"]) ? $_REQUEST["desc_card"] : '',
    'subtitle_card'         => !empty($_REQUEST["subtitle_card"]) ? $_REQUEST["subtitle_card"] : '',
    'text_footer_card'      => !empty($_REQUEST["text_footer_card"]) ? $_REQUEST["text_footer_card"] : '',
    'subtext_footer_card'   => !empty($_REQUEST["subtext_footer_card"]) ? $_REQUEST["subtext_footer_card"] : '',
    'card_link'             => !empty($_REQUEST["card_link"]) ? $_REQUEST["card_link"] : '',
    'img_bg_url'            => !empty($_REQUEST["img_bg_url"]) ? urldecode($_REQUEST["img_bg_url"]) : '',
    'detach_card'           => !empty($_REQUEST["detach_card_hidden"]) ? $_REQUEST["detach_card_hidden"] : 0,
    'destaque'              => ($_REQUEST['detach_card'] == 1) ? 'checked' : '',
    'desc_completa_primaria'=> !empty($_REQUEST["desc_completa_primaria"]) ? $_REQUEST["desc_completa_primaria"] : '',
    'desc_completa_secundaria'=> !empty($_REQUEST["desc_completa_secundaria"]) ? $_REQUEST["desc_completa_secundaria"] : '',
    'objetivos_title'       => !empty($_REQUEST["objetivos_title"]) ? $_REQUEST["objetivos_title"] : '',
    'objetivos_desc_completa'=> !empty($_REQUEST["objetivos_desc_completa"]) ? $_REQUEST["objetivos_desc_completa"] : '',
    'impactos'              => json_encode($impactos_data),
    'desafios'              => json_encode($desafios_data),
    'implantacao'           => json_encode($implantacao_data),
    'cases_options'         => json_encode($cases_options_data),
);

//insert
if(empty($id_card)){
    $sql                = "INSERT INTO " . $wpdb->prefix . "d1_cases(title_card,desc_card,subtitle_card,text_footer_card,subtext_footer_card,card_link,img_bg_url,
                        detach_card,desc_completa_primaria,desc_completa_secundaria,objetivos_title,objetivos_desc_completa,impactos, desafios, implantacao, cases_options) 
    VALUES('%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s')";
    $wpdb->query($wpdb->prepare($sql,array(
        $data['title_card'],$data['desc_card'],$data['subtitle_card'],$data['text_footer_card'],$data['subtext_footer_card'],$data['card_link'],$data['img_bg_url'],
        $data['detach_card'],$data['desc_completa_primaria'],$data['desc_completa_secundaria'],$data['objetivos_title'],$data['objetivos_desc_completa'],
        $data['impactos'],$data['desafios'],$data['implantacao'],$data['cases_options']
    )));
    $param              = array('path_wp' => $_REQUEST["path_wp"], 'id_card' => $wpdb->insert_id, 'url_location' => $_REQUEST["admin_url"]);
    $query_string       = http_build_query($param);
    $location           = $_REQUEST["admin_url"] . "admin.php?page=d1_plugin_cases&tab=secao1&" . $query_string;
    //pre($location);die;
}
//update
else{
    $param              = array('path_wp' => $_REQUEST["path_wp"], 'id_card' => $id_card, 'url_location' => $_REQUEST["admin_url"]);
    $query_string       = http_build_query($param);
    $location           = $_REQUEST["admin_url"] . "admin.php?page=d1_plugin_cases&tab=secao1&" . $query_string;
    $sql                = "UPDATE " . $wpdb->prefix ."d1_cases SET title_card='%s', desc_card='%s', subtitle_card='%s', text_footer_card='%s', subtext_footer_card='%s', card_link='%s', img_bg_url='%s',
    detach_card='%s', desc_completa_primaria='%s', desc_completa_secundaria='%s', objetivos_title='%s', objetivos_desc_completa='%s', 
    impactos='%s', desafios='%s', implantacao='%s', cases_options='%s' WHERE id_card = %d";
    $wpdb->query($wpdb->prepare($sql,array($data['title_card'],$data['desc_card'],$data['subtitle_card'],$data['text_footer_card'],$data['subtext_footer_card'],$data['card_link'],$data['img_bg_url'],
    $data['detach_card'],$data['desc_completa_primaria'],$data['desc_completa_secundaria'],$data['objetivos_title'],$data['objetivos_desc_completa'],
    $data['impactos'],$data['desafios'],$data['implantacao'],$data['cases_options'],$data['id_card'])));
}

header("location: " . $location);

