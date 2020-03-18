// JavaScript Document
$(document).ready(function(){
   $("#sgte").click(function(){
	    var page = parseInt($("#orden").val())+1;
		url = "canciones.php?orden="+page;
		location.href = url;				 
	});
   $("#atras").click(function(){
	    var page = parseInt($("#orden").val())-1;
		if(page==0) page=1;
		url = "canciones.php?orden="+page;
		location.href = url;				 
	});
});