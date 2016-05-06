<?php
require('../../../wp-load.php');
$token = $_POST['tok'];
$name = get_bloginfo('name');
if($token!=get_option('pho_token')){
$res = array(
'name' => "Token no válido"
);
}else{
$res = array(
'name' => $name
);
}
echo json_encode($res);
?>