<?php
/*
Plugin Name: Phonegap Connect
Description: Conexión a Wordpress desde Phonegap
Author: Daniel Riera
Version: 2.0.1
*/

function pho_panel_opciones(){
$opciones = get_option('pho_opciones',$valores_default);
register_setting( 'pho_opciones_connect', 'pho_comentarios', 'pho_validar' );



add_menu_page(
'Opciones - Phonegap Connect',
'Phonegap',

'administrator',

'phonegap-connect',

'pho_opciones_panel',

plugins_url( 'phonegap_connect/img/icon.png' )
);

}
function pho_opciones_panel(){
echo "
<h1>Opciones Plugin Phonegap</h1>
<p>Aquí podrás realizar las configuraciones para conectar tu aplicación PhoneGap con Wordpress.</p>";
?>

    <?php
 if(isset($_POST['action']) && $_POST['action'] == "salvaropciones"){
        update_option('pho_limite_caracteres',$_POST['caracteres_limite']);
        update_option('pho_token',$_POST['token']);
        update_option('pho_mostrar_comentarios',$_POST['comentarios']);
        update_option('pho_mostrar_categorias_vacias',$_POST['cat_vacias']);
        echo("<div class='updated message' style='padding: 10px'>Opciones guardadas.</div>");
    }
 
    ?>
 <style>
 table tr td {
     padding:10px; 
 }
 .nota {
     color:#666;
     font-size:10px;     
    }
 </style>
 <div>
    <form method='post'>
        <input type='hidden' name='action' value='salvaropciones'> 
        <table width="1355">
        <tr>
                <td width="337">
                    Token de acceso
                </td>
                <td width="468">
                    <input type='text' name='token' id='token' value='<?=get_option('pho_token')?>' required>
                    <span class="nota">Token para acceder a los datos.</span>
                </td>
                <td width="534" rowspan="4" align="left" valign="top">&nbsp;</td>
            </tr>
            <tr>
                <td>
                    Limite caracteres categoria
                </td>
                <td>
                    <input type='text' name='caracteres_limite' id='caracteres_limite' value='<?=get_option('pho_limite_caracteres')?>'>
                    <span class="nota">Limite de caracteres del contenido de artículos en categorias.</span>
                </td>
            </tr>
            <tr>
                <td>
                  Mostrar comentarios
                </td>
                <td>
                    <input type='checkbox' name='comentarios' id='comentarios' value='1' <?php checked(1== get_option('pho_mostrar_comentarios'));?> />
                    <span class="nota">Mostrar los comentarios de los post, esto afecta tanto al listado de post en categoria como en la presentación del artículo.</span>
                </td>
            </tr>
            <tr>
                <td>
                   Mostrar Categorias Vacias
                </td>
                <td>
                    <input type='checkbox' name='cat_vacias' id='cat_vacias' value='1' <?php checked(1== get_option('pho_mostrar_categorias_vacias'));?> />
                    <span class="nota">Si está activado se mostrarán las categorias vacias.</span>
                </td>
            </tr>
            <tr>
                <td colspan='3'>
                    <input type='submit' value='Enviar'>
                </td>
            </tr>
        </table>
    </form></div>
    <div>
        <h2>Nos ayudas a seguir mejorando?</h2>
        <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="E453H4H5H4XM2">
<input type="image" src="https://www.paypalobjects.com/es_ES/ES/i/btn/btn_donate_LG.gif" border="0" name="submit" alt="PayPal. La forma rápida y segura de pagar en Internet.">
<img alt="" border="0" src="https://www.paypalobjects.com/es_ES/i/scr/pixel.gif" width="1" height="1">
</form>

    </div>
    <?php echo "";
}

add_action('admin_menu', 'pho_panel_opciones');