<?php
require('../../../wp-load.php');
require('../../../wp-includes/pluggable.php');
$categoria = $_POST['id'];
if($_POST['to'] != get_option('pho_token')){
//exit();	
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
foreach($posts_array as $post) :
$user_info = get_userdata(1);
      $username = $user_info->user_login;
      $first_name = $user_info->first_name;
      $last_name = $user_info->last_name;
$contenidotexto = strip_tags($post->post_content);
$cadena = $post->post_content;
preg_match('@src="([^"]+)"@', $cadena, $array);
$src = array_pop($array);
$linea[] = array(
			'id' => $post->ID,
			'autor' => $username,
			'img' => $src,
			'titulo' => $post->post_title,
			'fecha' => $post->post_date,
			'slug' => $post->post_name,
			'numcomment' => $post->comment_count,
			'contenido' => substr($contenidotexto,0,get_option('pho_limite_caracteres'))
			);
endforeach;
echo json_encode($linea);
}else{
	
}
	