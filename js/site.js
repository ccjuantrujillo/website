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

   $("#sessionCompany").change(function(){
        var compania = $(this).val();
		$.ajax({
	            type: 'post',
	            dataType: 'json',
	            url: "cambiar_sesion.php",
	            data: {"compania": compania},
	            success: function (data) {
                    if (data.result == 'success') {
                        window.location.reload();
                    }
	            }
		});
   });

});