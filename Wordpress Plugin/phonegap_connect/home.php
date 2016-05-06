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
$res[] = $term;	
}
echo json_encode($res);
}else{
	
}