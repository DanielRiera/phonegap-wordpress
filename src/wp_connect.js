/*
Autor: Daniel Riera
Version 3.0.0
(C) 2016
*/
offset = 0;
var WP = {
	init: function(urlOK, tokenOK, num){
		num_post = num || 5;
		url = urlOK;
		token = tokenOK;
		console.log("Wordpress Ready - Connect to "+ url);
	},
	categories: function(callback) {
		$.ajax({
			url : url+"/app/"+token+"/get_categories/0/0/",
			dataType : "JSON",
			method : "POST",
			success : function(result) {
				callback(result);
			}, error : function(e) {
				console.log("Error CATEGORIES-> URL "+this.url+" Result ->" + JSON.stringify(e));
			}
		});
	},
	category: function(callback,id,continuo) {
		if(continuo==1){
			offset = parseInt(offset)+parseInt(num_post);
		}else{
			offset = 0;
		}
		console.log("ID" +id);
		$.ajax({
			url : url+"/app/"+token+"/get_posts/"+id+"/"+offset,
			dataType : "JSON",
			method : "POST",
			success : function(result) {
				console.log(this.url);
				callback(result);
			}, error : function(e) {
				console.log("Error CATEGORY-> URL "+this.url+" Result ->" + JSON.stringify(e));
			}
		});
	},
	home: function(callback, continuo) {
		if(continuo==1){
			offset = parseInt(offset)+parseInt(num_post);
		}else{
			offset = 0;
		}
		$.ajax({
			url : url+"/app/"+token+"/get_home/0/"+offset+"/",
			dataType : "JSON",
			method : "POST",
			success : function(result) {
				console.log(this.url);
				callback(result);
			}, error : function(e) {
				console.log("Error HOME-> URL "+this.url+" Result ->" + JSON.stringify(e));
			}
		});
	},
	post: function(callback,id){
		offset = 0;
		$.ajax({
			url : url+"/app/"+token+"/get_post/"+id+"/0/",
			dataType : "JSON",
			method : "POST",
			success : function(result) {
				callback(result);
			}, error : function(e) {
				console.log("Error POST" + JSON.stringify(e));
			}
		});
	},
	page: function(callback,id){
		offset = 0;
		$.ajax({
			url : url+"/app/"+token+"/get_page/"+id+"/0/",
			dataType : "JSON",
			method : "POST",
			success : function(result) {
				callback(result);
			}, error : function(e) {
				console.log("Error Page" + JSON.stringify(e));
			}
		});
	},
	nextPost: function(callback,id){
		offset = 0;
		$.ajax({
			url : url+"/app/"+token+"/get_next_post/"+id+"/0/",
			dataType : "JSON",
			method : "POST",
			success : function(result) {
				callback(result);
			}, error : function(e) {
				console.log("Error next POST" + JSON.stringify(e));
			}
		});
	},
	prevPost: function(callback,id){
		offset = 0;
		$.ajax({
			url : url+"/app/"+token+"/get_prev_post/"+id+"/0/",
			dataType : "JSON",
			method : "POST",
			success : function(result) {
				callback(result);
			}, error : function(e) {
				console.log("Error prev POST" + JSON.stringify(e));
			}
		});
	},
	comment: function(callback,id) {
		$.ajax({
			url : url+"/app/"+token+"/get_comments/"+id+"/0/",
			dataType : "JSON",
			method : "POST",
			success : function(result) {
				console.log(this.url);
				callback(result);
			}, error : function(e) {
				console.log("Error COMMENTS-> URL "+this.url+" Result ->" + JSON.stringify(e));
			}
		});
	}
};