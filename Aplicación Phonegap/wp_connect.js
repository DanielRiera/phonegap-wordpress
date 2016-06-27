/*

Autor: Daniel Riera
Version 2.0.2
(C) 2016

*/
url = null;
token = null;
var WP = (function() {
	function categorias(callback) {
		checkStatus();
		$.ajax({
			url : url+"/wp-content/plugins/phonegap_connect/categorias.php",
			dataType : "JSON",
			method : "POST",
			data : "to="+token,
			success : function(result) {
				callback(result);
			}, error : function(e) {
				console.log("Error CATEGORIES" + JSON.stringify(e));
			}
		});
	}
	function categoriaPost(callback,id) {
		console.log("ID" +id);
		checkStatus();
		$.ajax({
			url : url+"/wp-content/plugins/phonegap_connect/cat.php",
			dataType : "JSON",
			method : "POST",
			data : "to="+token+"&id="+id,
			success : function(result) {
				console.log(JSON.stringify(result));
				callback(result);
			}, error : function(e) {
				console.log("Error CATEGORY" + JSON.stringify(e));
			}
		});
	}
	function homePost(callback) {
		checkStatus();
		$.ajax({
			url : url+"/wp-content/plugins/phonegap_connect/home.php",
			dataType : "JSON",
			method : "POST",
			data : "to="+token,
			success : function(result) {
				callback(result);
			}, error : function(e) {
				console.log("Error HOME");
			}
		});
	}
	function post(callback,id){
		checkStatus();
		$.ajax({
			url : url+"/wp-content/plugins/phonegap_connect/post.php",
			dataType : "JSON",
			method : "POST",
			data : "to="+token+"&id="+id,
			success : function(result) {
				callback(result);
			}, error : function(e) {
				console.log("Error POST");
			}
		});
	}
	function comenatarios(callback,id) {
		checkStatus();
		$.ajax({
			url : url+"/wp-content/plugins/phonegap_connect/comentarios.php",
			dataType : "JSON",
			method : "POST",
			data : "to="+token+"&id="+id,
			success : function(result) {
				callback(result);
			}, error : function(e) {
				console.log("Error COMMENTS");
			}
		});
	}
	function pagina(callback,id) {
		checkStatus();
		$.ajax({
			url : url+"/wp-content/plugins/phonegap_connect/pagina.php",
			dataType : "JSON",
			method : "POST",
			data : "to="+token+"&id="+id,
			success : function(result) {
				callback(result);
			}, error : function(e) {
				console.log("Error HOME");
			}
		});
	}
	function init(urltw, tokentw, mode) {
		watchCallback ="";
		url = urltw;
		token = tokentw;
		if(mode=="DEBUG") {
				$.ajax({
					url : url+"/wp-content/plugins/phonegap_connect/debug.php",
					dataType : "JSON",
					method : "POST",
					data : "tok="+token,
					success : function(result) {
						console.log("Conexión establecida correctamente con " + result['name']);
					}, error : function(e) {
						console.log("Error INIT" + JSON.stringify(e));
					}
				});
		}else{
			console.log("Parámetros establecidos en modo Producción");
		}
	}
	function checkStatus() {
		if(url==null||token==null) { console.error("Es necesario iniciar el sistema para declarar las variables, utilice WP.init(URL, TOKEN, MODO) primero"); }else{
			console.log("La URL establecida es " + url + " el TOKEN del sistema es " + token);
		}
	}
    return {
        categories: categorias,
        category : categoriaPost,
        home: homePost,
        post : post,
        comment : comenatarios,
        page: pagina,
        ini: init,
        check: checkStatus
    };
})();