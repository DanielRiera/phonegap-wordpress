<?php
require('../../../wp-load.php');
if($_POST['to']!=get_option('pho_token')){
exit();	
}

$slug = $_POST['slug'];
global $wpdb;
$post = $wpdb->get_row("SELECT * FROM $wpdb->posts WHERE post_status = 'publish' AND post_type='post' AND post_name ='$slug'");
if(0 < $post) {
//CONSULTA EL ID DE LA CATEGORIA PARA GUARDARLO
$linea = array(
			'id' => $post->ID,
			'titulo' => $post->post_title,
			'slug' => $post->post_name,
			'fecha' => $post->post_date,
			'contenido' => $post->post_content,
			'comentarios' => $post->comment_count
			);
echo json_encode($linea);
}else{}