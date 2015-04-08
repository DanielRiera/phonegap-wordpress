/*************************************
Conexión con Wordpress desde Phonegap
Autor : Daniel Riera
Año : 2015
Versión : 1.0.0
*************************************/
function wp_ini(url,div_cat,div_posts,div_post,token,modo) {
    url_connect = url+"/wp-content/plugins/phonegap_connect/";
    if(url==null){ //Comprobación si URL está definido.
        alert("Parámetro URL no indicado.");
    }
    if(modo=='debug') {
        $.post(url_connect + "debug.php",{tok : token},function(result){
            alert(result);
        });
    }
    //CONFIGURACION
    to = token;
    cont_categoria = div_cat;
    cont_posts = div_posts;
    cont_comentarios = "comentarios";
    cont_post = div_post;
    wp_cats();
}
function wp_posts(idcategoria) {
    ocultarTodo();
     var datax = "id="+idcategoria + "&to=" + to;
        $.ajax({
        url : url_connect + "categoria.php",
        type : 'POST',
        data : datax,
        dataType : 'json',
        success : function (result) {
            document.getElementById("navegador").innerHTML = "<button onclick='wp_cats();'>Categorias</button>";
            if(result['error']=='error') {
                alert("Error");
            }else{
            $("#"+cont_posts).fadeIn(200);
            $("#menu").fadeOut(200);

            for(i=0;i<result.length;i++){
         var ndiv = document.createElement("div");
        ndiv.setAttribute("id", "post"+i);
        ndiv.setAttribute("class", "post");
        ndiv.setAttribute("onclick", "wp_post('"+result[i]['slug']+"',"+idcategoria+")");
        document.getElementById(cont_posts).appendChild(ndiv);
        if(result[i]['img']==null) { var imgpost = "display:none;"; }else{ var imgpost = "display:block";}
        document.getElementById("post"+i).innerHTML = "<div class='titulo_cat_post'>"+result[i]['titulo']+"</div><div class='fecha_cat_post' >Por " + result[i]['autor'] + " el " + result[i]['fecha'] + " - " + result[i]['numcomment'] + " comentarios</div><div class='contenido_cat_post' id='contenido_post"+i+"'><img class='img_cat_post' src='"+result[i]['img']+"' style='"+imgpost+"' /><div>"+result[i]['contenido']+"</div></div>";
        }
        }
        },
        error : function () {
           alert("Error en categorias");
        }
    });
    
}
function wp_post(slug,idcat) {
    ocultarTodo();
    document.getElementById("navegador").innerHTML = "<button onclick='wp_posts("+idcat+");'>Categoria</button>";
    $("#"+cont_posts).fadeOut(200);
     var datax = "slug="+slug+"&to="+to;
        $.ajax({
        url : url_connect + "post.php",
        type : 'POST',
        data : datax,
        dataType : 'json',
        success : function (result) {
            $("#"+cont_post).fadeIn(200);
            document.getElementById("titulo_post").innerHTML = result['titulo'];
            document.getElementById("fecha_post").innerHTML = result['fecha'];
            document.getElementById("contenido_post").innerHTML = result['contenido'];
            if(result['comentarios']!=0) {
                wp_comentarios(result['id']);
                
            }else{
                document.getElementById(cont_comentarios).innerHTML = "No hay comentarios";
            }
        $("#"+div_cat).fadeOut(200);
        },
        error : function () {
           alert("Error en Post");
        }
    });
}
function wp_cats() {
       ocultarTodo();
     var datax = "to="+to;
        $.ajax({
        url : url_connect + "categorias.php",
        type : 'POST',
        data : datax,
        dataType : 'json',
        success : function (result) {
        document.getElementById("navegador").innerHTML = "";
            $("#"+cont_categoria).fadeIn(200);
            for(i=0;i<result.length;i++){
         var ndiv = document.createElement("li");
        ndiv.setAttribute("id", "cat"+i);
        document.getElementById("list-categoria").appendChild(ndiv);
        document.getElementById("cat"+i).innerHTML = "<a onclick='wp_posts("+result[i]['id']+")'>"+result[i]['nombre']+"</a>";
        }
        },
        error : function () {
           alert("Error en categorias menu");
        }
    });
}
function wp_comentarios(id) {
    console.log("Iniciando comentarios para el post " + id);
        var datax = "id="+id+"&to="+to;
        $.ajax({
        url : url_connect + "comentarios.php",
        type : 'POST',
        data : datax,
        dataType : 'json',
        success : function (result) {
    if(result['aviso']==1) {}else{
            $("#"+cont_comentarios).fadeIn(200);
            document.getElementById(cont_comentarios).innerHTML = "<h2>Comentarios</h2>";
        for(i=0;i<result.length;i++){
        var ndiv = document.createElement("div");
        ndiv.setAttribute("id", "comment"+i);
        ndiv.setAttribute("class", "commentdiv");
        document.getElementById(cont_comentarios).appendChild(ndiv);
        document.getElementById("comment"+i).innerHTML = "<div class='nombre_comment_post' id='nombre_comment"+i+"'>"+result[i]['autor']+"</div><div class='fecha_comment_post' id='fecha_comment"+i+"'>"+result[i]['fecha']+"</div><div class='contenido_comment_post' id='contenido_comment"+i+"'>"+result[i]['contenido']+"</div>";
        }
    }
        },
        error : function () {
           alert("Error en Comentarios.");
        }
    });
}
function ocultarTodo() {
    document.getElementById(cont_comentarios).style.display = "none";
    document.getElementById(cont_posts).innerHTML = "";
    document.getElementById(cont_posts).style.display = "none";
    document.getElementById(cont_categoria).innerHTML = "";
    document.getElementById(cont_categoria).style.display = "none";
    document.getElementById(cont_post).innerHTML = "";
    document.getElementById(cont_post).style.display = "none";

}