<?php
require('../../../wp-load.php');
if($_POST['to']!=get_option('pho_token')){
exit();	
}

if(get_option('pho_mostrar_categorias_vacias')==1){
$oculta = 0;
}else{
$oculta = 1;
}
$linea = "";
$args = array(
    'orderby'           => 'name', 
    'order'             => 'ASC',
    'hide_empty'        => $oculta,
    'fields'            => 'all'
);
$terms = get_terms('category',$args);
    $count = count( $terms );
    foreach ( $terms as $term ) {
    	$linea[] = array(
		'id' => $term->term_id,
		'nombre' => $term->name
		);
    }
    echo json_encode($linea);
	