<?php
header('Content-Type: application/json');
require('../../../wp-load.php');
if($_POST['to']!=get_option('pho_token')){
exit();	
}

if(get_option('pho_mostrar_comentarios')==1){
$linea = "";
$postid = $_POST['id'];
$args = array(
	'status' => 'approve',
	'post_id' => $postid, // use post_id, not post_ID
);
$comments = get_comments($args);
foreach($comments as $comment) :
	$linea[] = array(
			'autor' => $comment->comment_author,
			'contenido' => $comment->comment_content,
			'fecha' => $comment->comment_date
			);
endforeach;
echo json_encode($linea);
}else{
$error = array('aviso'=>'1');
echo json_encode($error);
}
	