<?php
header('Content-Type: application/json');
require('../../../wp-load.php');
require('../../../wp-includes/pluggable.php');
if($_POST['to'] != get_option('pho_token')){
exit();	
}
$post = "";
$elementos = 5;
$yaCargados = 0;
global $wpdb;
if($_POST['num_post']!=0 or $_POST['num_post']!="NULL") {
$elementos = $_POST['num_post'];
$yaCargados = $_POST['paginacion'];
}
$args = array(
	'posts_per_page'	=> $elementos,
	'offset'           => $yaCargados,
	'orderby'          => 'post_date',	
	'order'            => 'DESC',
	'post_type'        => 'post',
	'post_status'      => 'publish',
	'suppress_filters' => true 
);
$posts_array = get_posts( $args );
if(0 < $posts_array) {
foreach( $posts_array as $term) {
$res['posts'][] = $term;	
$image = wp_get_attachment_image_src( get_post_thumbnail_id( $term->ID ), 'medium' );
$res['images'][]['imagen'] = $image;
$custom_fields = get_post_custom($term->ID);
 $res['custom_field'][] = $custom_fields;
}
echo json_encode($res);
}else{
	
}