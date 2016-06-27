<?php
require('../../../wp-load.php');
if($_POST['to']!=get_option('pho_token')){
exit();	
}
$id = $_POST['id'];
global $wpdb;
$post = $wpdb->get_row("SELECT * FROM $wpdb->posts WHERE post_status = 'publish' AND post_type='page' AND ID ='$id'");
if(0 < $post) {
foreach( $post as $term) {
$res['posts'][] = $term;	
$image = wp_get_attachment_image_src( get_post_thumbnail_id( $term->ID ), 'medium' );
$res['images'][]['imagen'] = $image;	
}
echo json_encode($res);
}else{
exit();
}