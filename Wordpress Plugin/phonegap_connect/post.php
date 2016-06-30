<?php
require('../../../wp-load.php');
require('../../../wp-includes/pluggable.php');
if($_POST['to']!=get_option('pho_token')){
exit();	
}
$id = $_POST['id'];
global $wpdb;
$post = $wpdb->get_row("SELECT * FROM $wpdb->posts WHERE post_status = 'publish' AND post_type='post' AND ID ='$id'");
if(0 < $post) {
//foreach( $post as $term) {
$res['posts'] = $post;	
$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );
$res['images']['imagen'] = $image;
$custom_fields = get_post_custom($post->ID);
  $res['custom_field'][] = $custom_fields;	
//}
echo json_encode($res);
}else{
exit();
}