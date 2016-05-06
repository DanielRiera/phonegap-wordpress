<?php
require('../../../wp-load.php');
if($_POST['to']!=get_option('pho_token')){
exit();	
}
$id = $_POST['id'];
global $wpdb;
$post = $wpdb->get_row("SELECT * FROM $wpdb->posts WHERE post_status = 'publish' AND post_type='post' AND ID ='$id'");
if(0 < $post) {
echo json_encode($post);
}else{
exit();
}