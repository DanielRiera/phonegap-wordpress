El plugin tiene las siguientes opciones:
- Token
- Mostrar comentarios en la aplicación
- Mostrar categorías vacías
(Se crearán más opciones)
¿Qué hace?
1.	Menú de Categorías
Genera un menú 
```html
<ul><li><a></a></li></ul> 
```
con todas las categorías que estén creadas en Wordpress.

2.	Listado de Artículos en cada Categoría
	Muestra en divs los artículos de cada categoría con los datos
 	(Se irán agregando nuevos datos en las siguientes versiones):

	- Titulo Artículo
	- Fecha Artículo
	- Comentarios Artículo
	- Imagen (Si tiene)
	- Contenido del Artículo

3.	Artículo
	Muestra el artículo completo

4.	Comentarios de Cada Post
	En cada artículo muestra todos los comentarios basados en divs.

5.	Próximamente y cuando se compruebe que nadie tiene problemas en su implementación y que todo está correcto se crearán más funciones....
	
Como se implementa en nuestra aplicación

Lo primero que hay que hacer es descargar el plugin para instalarlo en nuestro Wordpress puedes descargarlo desde Github.

Una vez instalado y configurado descargamos el JS para incluirlo en nuestra aplicación Phonegap.

Añade el siguiente código en el index.html de tu proyecto.

```html
<script type="text/javascript" src="js/wp_connect.js"></script>
```

Ahora que tenemos el JS en nuestra carpeta de javascript de nuestro proyecto  e incluido el código anterior en el index.html procedemos a la configuración dentro del plugin.

Cuando el dispositivo está preparado llamamos a la función para iniciar el plugin.

```javascript
wp_ini(" URL "," DIV MENU "," DIV CATEGORIA"," DIV POST","TOKEN","MODO");
```


URL : La url de nuestra instalación wordpress, por ejemplo si nuestra instalación está en el directorio raíz sería "www.dominio.com".

DIV MENU: ID del div donde irá el listado de categorías.

DIV CATEGORIA: ID del div donde irán los posts de cada categoría.

DIV POST:  ID del div donde se mostrará cada post.

TOKEN : Token de acceso por seguridad, así nadie que no tenga el Token correcto no podrá listar los contenidos de su wordpress.

MODO: Mientras que se esté instalando ponerlo  "DEBUG" esto hará que cuando el dispositivo esté preparado iniciará una conexión con Wordpress y en caso de que esté configurado correctamente aparecerá en un alert el nombre de nuestro blog.

Nota: Una vez que esté todo correcto, puede eliminar el modo y quedaría así:

```javascript
wp_ini(" URL "," DIV MENU "," DIV CATEGORIA"," DIV POST","TOKEN");
```

Ahora solo faltaría darle algún estilo CSS a el contenido rescatado desde wordpress
Estos son los CSS que he creado por defecto, ya cada uno que cambie a su gusto.


#CSS
```css
/************* GENERALES ***********/

li {}
ul {}
.contenido {}
#navegador {}
button {}

/*************** MENU **************/

#menu {}
#menu ul {}
#menu ul li a {}
#menu ul li a:hover {}

/************* POST ****************/

#post {}
#titulo_post {}
#fecha_post {}
#contenido_post {}
#contenido_post img {}
#comentarios {}
#comentarios h2 {}
#comentarios .nombre_comment_post {}
#comentarios .commentdiv {}
#comentarios .nombre_comment_post {}
#comentarios .fecha_comment_post {}
#comentarios .contenido_comment_post {}

/*********** CATEGORIA **************/

.post {}
.titulo_cat_post {}
.fecha_cat_post {}
.contenido_cat_post {}
.img_cat_post {}
```
En nuestro archivo index.html debe tener la siguiente estructura:

#HTML
```html
    <div class="contenido">
        <div id="navegador"></div>
        <div id="menu">
            <ul id="list-categoria"></ul>
        </div>
        <div id="categoria"></div>
        <div id="post">
        <div id="titulo_post"></div>
        <div id="fecha_post"></div>
        <div id="contenido_post"></div>
        <div id="comentarios"></div>
        </div>
    </div>
```

