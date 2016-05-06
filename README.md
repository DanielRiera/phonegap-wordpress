#Conexión a Wordpress desde Phonegap

Versión actualizada del sistema de conexión entre Wordpress y Phonegap, se ha mejorado el plugin de Wordpress para ofrecer más datos sobre todo lo que puede recopilar de Wordpress, se han añadido mejoras en el plugin que hace más facil el control de lo que se muestra en nuestra aplicación.

#¿Que hace?

- [Listado de Categorias creadas.](https://github.com/DanielRiera/wordpress-phonegap-connect#categorias)
- [Listado de Entradas de cada categoría](https://github.com/DanielRiera/wordpress-phonegap-connect#entradas-en-una-categoria)
- [Entradas](https://github.com/DanielRiera/wordpress-phonegap-connect#entrada)
- [Listado de Comentarios de cada Entradas](https://github.com/DanielRiera/wordpress-phonegap-connect#comentarios)
- [Páginas](https://github.com/DanielRiera/wordpress-phonegap-connect#paginas)

#Instalacion

Comprimir en ZIP la carpeta phonegap_connect, subir el plugin con el administrador de plugins de Wordpress, una vez instalado y activado configurar desde el menú lateral el plugin añadiendo TOKEN.

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

Copyright (c) 2016 Daniel Riera

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
