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
$args = array(
    'orderby'           => 'name', 
    'order'             => 'ASC',
    'hide_empty'        => $oculta,
    'fields'            => 'all',
	'pad_counts' => true
);
$terms = get_terms('category',$args);
foreach( $terms as $term) {
$res[] = $term;	
}
echo json_encode($res);