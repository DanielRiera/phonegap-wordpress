# Conexión a Wordpress desde Phonegap v3.0.0


Log de Cambios

- Añadido soporte para registro y login (16/05/2017)
- Actualizado soporte para paginas
- Añadido soporte para siguiente post y anterior
- Actualización a versión 3.0.0 (Compatibilidad con Plugin Oficial)
- Añadido soporte para imágenes destacadas 27/06/2016
- Añadido soporte para custom field 30/06/2016
- Añadido opción de paginación en HOME y CATEGORIAS 03/07/2016


# Información importante

Plugin disponible en el repositorio de WordPress Descargar <a href="https://wordpress.org/plugins/phonegap-connect/">desde Aquí</a>

<a href="http://danielriera.net/phonegap/conectar-wordpress-con-aplicacion-phonegap" target="_blank">Entra en el blog</a>

Versión actualizada del sistema de conexión entre Wordpress y Phonegap, se ha mejorado el plugin de Wordpress para ofrecer más datos sobre todo lo que puede recopilar de Wordpress, se han añadido mejoras en el plugin que hace más facil el control de lo que se muestra en nuestra aplicación.

# ¿Que hace?

- [Listado de Categorias creadas.](https://github.com/DanielRiera/phonegap-wordpress#categorias)
- [Listado de Entradas de cada categoría](https://github.com/DanielRiera/phonegap-wordpress#entradas-en-una-categoria)
- [Entradas](https://github.com/DanielRiera/phonegap-wordpress#entrada)
- [Siguiente Entrada](https://github.com/DanielRiera/phonegap-wordpress#siguiente-entrada)
- [Entrada Anterior](https://github.com/DanielRiera/phonegap-wordpress#entrada-anterior)
- [Listado de Comentarios de cada Entradas](https://github.com/DanielRiera/phonegap-wordpress#comentarios)
- [Páginas](https://github.com/DanielRiera/phonegap-wordpress#paginas)

# Instalacion

Descargar desde el repositorio oficial de Wordpress o desde la instalación en su sitio web, una vez instalado y activado configurar desde el menú lateral el plugin, guardar la configuración y actualizar los enlaces permanentes (No es necesario modificar nada en enlaces permanentes con solo guardar ya funciona)

# Uso

### Inicio **Obligatorio**

```javascript
WP.init(URL, TOKEN, NUMERO_POST_POR_LLAMADA);
```

**PARAMETROS**:
Los parametros enviados a esta función inician el sistema y generan las variables de conexión a Wordpress, no tiene Callback.

**URL :** Dirección de la instalación de Wordpress **IMPORTANTE** incluir "http://" para que funcione adecuadamente, será la raíz de la instalación por "Ejemplo, http://www.example.com" además **recuerda** no incluir "/" al final de la URL.

**TOKEN :** Lo genera automáticamente el plugin al instalarlo.

**NUMERO_POST_POR_LLAMADA :** El número de elementos que devolverá el plugin Wordpress, si no se establece será por defecto 5.


**Ejemplo:**
```javascript
WP.init("http://www.example.com","as545D4654654sdg64GH6A8SDhh48A16F81GAS6H468J4", 5);
```

### Ultimas entradas (Home)

```javascript
WP.home(callback, continuo);
```

**continuo: ** Si se establece 1 continuará la paginación.

**Respuesta**:
Estos son los parametros que se reciben, son los datos de cada post.

    posts:
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
    images:
        [imagen]
    custom_field
        [NOMBRE_PERSONALIZADOS]


**Ejemplo:**
```javascript
WP.home(function(result) {
        for(i=0;i < result.length;i++) {
             console.log(result[i]['post_title']);
         }
    });
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
WP.category(callback, ID_CATEGORIA, continuo);
```

**continuo: ** Si se establece 1 continuará la paginación.

**Respuesta**:
Estos son los parametros que se reciben al llamar a una categoría, son los datos de las entradas de cada categoría.

    posts:
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
    images:
        [imagen]
    custom_field
        [NOMBRE_PERSONALIZADOS]

**Ejemplo**:

```javascript
WP.category(function(result) {
        for(i=0;i < result['posts'].length;i++) {
             console.log(result['posts'][i]['post_title']);
         }
    }, 1);
```

### Entrada

```javascript
WP.post(callback, ID_POST);
```

**Respuesta**:
Estos son los parametros que se reciben al llamar a la función de entradas, son datos del post.

    posts:
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
    images:
        [imagen]
    custom_field
        [NOMBRE_PERSONALIZADOS]

**Ejemplo**:

```javascript
WP.post(function(result) {
             console.log(result['posts'][0][0]['post_title']);
             //Usa lo siguiente para que sea más facil.
             var p = result['posts'][0][0];
             //De este modo tendrás los datos del post desde
             console.log(p['post_title']);
             
    }, 1);
```

### Siguiente Entrada

```javascript
WP.nextPost(callback, ID_POST);
```

**Respuesta**:
Estos son los parametros que se reciben al llamar a la función de entradas, son datos del post.

    posts:
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
    images:
        [imagen]
    custom_field
        [NOMBRE_PERSONALIZADOS]

**Ejemplo**:

```javascript
WP.nextPost(function(result) {
             console.log(result['posts']['post_title']);
    }, 1);
```

### Entrada Anterior

```javascript
WP.prevPost(callback, ID_POST);
```

**Respuesta**:
Estos son los parametros que se reciben al llamar a la función de entradas, son datos del post.

    posts:
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
    images:
        [imagen]
    custom_field
        [NOMBRE_PERSONALIZADOS]

**Ejemplo**:

```javascript
WP.prevPost(function(result) {
             console.log(result['posts']['post_title']);
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

    posts:
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
    images:
        [imagen]
    custom_field
        [NOMBRE_PERSONALIZADOS]

**Ejemplo**:

```javascript
WP.page(function(result) {
             console.log(result['posts'][i]['post_title']);
    }, 1);
```

### Registrar Usuario

```javascript
WP.addUser(callback, user, email, pass, nombre);
```

**Respuesta**:
Estos son los parametros que se reciben al llamar a la función de addUser, devuelve el ID y el primer nombre del usuario.

    [ID] -> ID de usuario
    [first_name] -> Nombre del usuario

**Ejemplo**:

```javascript
WP.addUser(function(result) {
        console.log(result['first_name'] + " se ha registrado correctamente con el id " + result['ID'])
    }, 'USUARIO','EMAIL','CONTRASEÑA','NOMBRE');
```

### Login con usuario existente

```javascript
WP.login(callback, user, pass);
```

**Respuesta**:
Estos son los parametros que se reciben al llamar a la función de logi, son los datos del usuario que ha iniciado sesión.

    [ID]
    [allcaps]
        [level_0]
        [read]
        [subscriber]
    [cap_key]
    [caps]
        [subscriber]
    [data]
        [ID]
        [display_name]
        [user_activation_key]
        [user_email]
        [user_login]
        [user_nicename]
        [user_pass]
        [user_registered]
        [user_status]
        [user_url]
    [filter]
    [roles]
    [imagen]


**Ejemplo**:

```javascript
WP.login(function(result) {
        console.log(result['data']['data']['first_name'] + " ha realizado el logueo correctamente")
    }, 'USUARIO','CONTRASEÑA');
```


# Ayuda

##Me invitas a un café? :)

[![paypal](https://www.paypalobjects.com/es_ES/ES/i/btn/btn_donate_LG.gif)](https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=E453H4H5H4XM2)

# Licencia

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
