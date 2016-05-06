<?php
require('../../../wp-load.php');
if($_POST['to']!=get_option('pho_token')){
exit();	
}

if(get_option('pho_mostrar_comentarios')==1){
$postid = $_POST['id'];
$args = array(
	'status' => 'approve',
	'post_id' => $postid, // use post_id, not post_ID
);
$comments = get_comments($args);
foreach( $comments as $term) {
$res[] = $term;	
}
echo json_encode($res);
}else{
exit();
}
	