#Conexión a Wordpress desde Phonegap

Versión actualizada del sistema de conexión entre Wordpress y Phonegap, se ha mejorado el plugin de Wordpress para ofrecer más datos sobre todo lo que puede recopilar de Wordpress, se han añadido mejoras en el plugin que hace más facil el control de lo que se muestra en nuestra aplicación.

#¿Que hace?

- [Listado de Categorias creadas.](https://github.com/DanielRiera/wordpress-phonegap-connect#categorias)
- [Listado de Entradas de cada categoría](https://github.com/DanielRiera/wordpress-phonegap-connect#entradas-en-una-categoria)
- [Entradas](https://github.com/DanielRiera/wordpress-phonegap-connect#entrada)
- [Listado de Comentarios de cada Entradas](https://github.com/DanielRiera/wordpress-phonegap-connect#comentarios)
- [Páginas](https://github.com/DanielRiera/wordpress-phonegap-connect#paginas)

#Instalacion

Descargar desde aqui el plugin que se tiene que instalar en nuestro Wordpress, una vez instalado vamos a la configuración del Plugin

Readme en Desarrollo....

#Uso

### Inicio **Obligatorio**

```javascript
WP.ini(URL, TOKEN, MODO);
```

**PARAMETROS**:
Los parametros enviados a esta función inician el sistema y generan las variables de conexión a Wordpress, no tiene Callback, solo si se ejecuta con el MODO: "DEBUG" lanzará un alert con una conexión satisfactoria, en caso de que no reciba ningún alert, el error aparecerá en la consola.

**URL :** Dirección de la instalación de Wordpress **IMPORTANTE** incluir "http://" para que funcione adecuadamente, será la raíz de la instalación por "Ejemplo, http://www.example.com" además **recuerda** no incluir "/" al final de la URL.

**TOKEN :** Token que tienes que generar en la instalación de Wordpress, puede ser números, letras, mayúsculas y minúsculas, todo junto, sin espacios, **No utilizar un token fácil de recordar o leer**.

**MODO :** Puede ser "DEBUG" o ninguno, en caso de que esté fijado en "DEBUG" este lanzará un alert con la conexión correcta al Wordpress, En producción utilizar "NULL". 


**Ejemplo:**
```javascript
WP.ini("http://www.example.com","as545D4654654sdg64GH6A8SDhh48A16F81GAS6H468J4", "DEBUG");
```


### Categorias

```javascript
WP.categories(callback);
```

**Respuesta**:
Estos son los parametros que se reciben, son los datos de cada categoría.

    [term_id]
    [name]
    [slug]
    [term_group]
    [term_taxonomy_id]
    [taxonomy]
    [description]
    [parent]
    [count]


**Ejemplo:**
```javascript
WP.categories(function(result) {
        for(i=0;i < result.length;i++) {
             console.log(result[i]['name']);
         }
    });
```

### Entradas en una Categoria

```javascript
WP.category(callback, ID_CATEGORIA);
```
**Respuesta**:
Estos son los parametros que se reciben al llamar a una categoría, son los datos de las entradas de cada categoría.

    [ID]
    [post_author]
    [post_date]
    [post_date_gmt] 
    [post_content] 
    [post_title] 
    [post_excerpt] 
    [post_status]
    [comment_status]
    [ping_status] 
    [post_password] 
    [post_name]
    [to_ping] 
    [pinged] 
    [post_modified] 
    [post_modified_gmt]
    [post_content_filtered] 
    [post_parent] 
    [guid] 
    [menu_order]
    [post_type]
    [post_mime_type] 
    [comment_count]
    [filter]

**Ejemplo**:

```javascript
WP.category(function(result) {
        for(i=0;i < result.length;i++) {
             console.log(result[i]['post_title']);
         }
    }, 1);
```

### Entrada

```javascript
WP.post(callback, ID_POST);
```

**Respuesta**:
Estos son los parametros que se reciben al llamar a la función de entradas, son datos del post.

    [ID]
    [post_author]
    [post_date]
    [post_date_gmt] 
    [post_content] 
    [post_title] 
    [post_excerpt] 
    [post_status]
    [comment_status]
    [ping_status] 
    [post_password] 
    [post_name]
    [to_ping] 
    [pinged] 
    [post_modified] 
    [post_modified_gmt]
    [post_content_filtered] 
    [post_parent] 
    [guid] 
    [menu_order]
    [post_type]
    [post_mime_type] 
    [comment_count]
    [filter]

**Ejemplo**:

```javascript
WP.post(function(result) {
             console.log(result[i]['post_title']);
    }, 1);
```

### Comentarios

```javascript
WP.comment(callback, ID_POST);
```

**Respuesta**:
Estos son los parametros que se reciben al llamar a la función de comentarios, son datos los datos de todos los comenatarios de esa entrada.
    [comment_ID]
    [comment_post_ID]
    [comment_author] 
    [comment_author_email] 
    [comment_author_url] 
    [comment_author_IP] 
    [comment_date] 
    [comment_date_gmt] 
    [comment_content] 
    [comment_karma] 
    [comment_approved] 
    [comment_agent] 
    [comment_type] 
    [comment_parent] 
    [user_id]

**Ejemplo**:

```javascript
WP.comment(function(result) {
        for(i=0;i < result.length;i++) {
             console.log(result[i]['comment_content']);
         }
    }, 1);
```

### Paginas

```javascript
WP.page(callback, ID_PAGINA);
```

**Respuesta**
Estos son los parametros que se reciben al llamar a la función de Páginas, son los mismos valores que se reciben en el caso de las entradas.
    
    [ID]
    [post_author]
    [post_date]
    [post_date_gmt]
    [post_content] 
    [post_title]
    [post_excerpt] 
    [post_status]
    [comment_status]
    [ping_status] 
    [post_password]
    [post_name]
    [to_ping]
    [pinged]
    [post_modified]
    [post_modified_gmt]
    [post_content_filtered]
    [post_parent]
    [guid]
    [menu_order]
    [post_type]
    [post_mime_type]
    [comment_count]
    [ancestors]
    [filter]

**Ejemplo**:

```javascript
WP.page(function(result) {
             console.log(result[i]['post_title']);
    }, 1);
```

#Licencia


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

