<?php
header('Content-Type: application/json');
require('../../../wp-load.php');
require('../../../wp-includes/pluggable.php');
if($_POST['to'] != get_option('pho_token')){
exit();	
}
$post = "";
global $wpdb;
$args = array(
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
}
echo json_encode($res);
}else{
	
}