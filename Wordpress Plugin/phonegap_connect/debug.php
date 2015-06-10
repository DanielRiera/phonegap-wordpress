<?php
require('../../../wp-load.php');
$token = $_POST['tok'];
if($token!=get_option('pho_token')){
echo "Token no válido";
}else{
echo bloginfo('name');	
}
?>