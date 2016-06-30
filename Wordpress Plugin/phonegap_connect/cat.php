<?php
require('../../../wp-load.php');
require('../../../wp-includes/pluggable.php');
$categoria = $_POST['id'];
if($_POST['to'] != get_option('pho_token')){
exit();	
}
global $wpdb;
$args = array(
	'category'         => $categoria,
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
header('Content-Type: application/json');
echo json_encode($res);
}else{
	
}
	
