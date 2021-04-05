<?php
include_once "cancionero/clases/conexion.php";

if(isset($_POST["datepicker"]) && isset($_POST["descripcion"])){
	$fecha = $_POST["datepicker"];
	$descripcion = $_POST["descripcion"];
	$url = str_replace(",","",$descripcion);//Elimino comas
	$url = strtolower(str_replace(" ","_",$url)).".php";
	
	//Grabamos la misa
	$cadena = "insert into misa (MISAC_Descripcion,MISAC_Url,MISAC_Fecha) values ('".$descripcion."','".$url."','".ReconvierteFecha($fecha)."')";
	$rs = mysqli_query($link,$cadena);
	$idmisa = mysqli_insert_id($link);
	
	//Guardamos las canciones
	if(isset($_POST["entrada"])){
		$entrada = $_POST["entrada"];
		foreach($entrada as $value){
			$cadena = "insert into misacancion (MISAP_Codigo,CANCP_Codigo,CATEGP_Codigo) values ('".$idmisa."','".$value."',1)";
			$rs = mysqli_query($link,$cadena);
		}
	}
	if(isset($_POST["perdon"])){
		$perdon = $_POST["perdon"];
		foreach($perdon as $value){
			$cadena = "insert into misacancion (MISAP_Codigo,CANCP_Codigo,CATEGP_Codigo) values ('".$idmisa."','".$value."',2)";
			$rs = mysqli_query($link,$cadena);
		}
	}
	if(isset($_POST["gloria"])){
		$gloria = $_POST["gloria"];
		foreach($gloria as $value){
			$cadena = "insert into misacancion (MISAP_Codigo,CANCP_Codigo,CATEGP_Codigo) values ('".$idmisa."','".$value."',3)";
			$rs = mysqli_query($link,$cadena);
		}
	}
	if(isset($_POST["aleluya"])){
		$aleluya = $_POST["aleluya"];
		foreach($aleluya as $value){
			$cadena = "insert into misacancion (MISAP_Codigo,CANCP_Codigo,CATEGP_Codigo) values ('".$idmisa."','".$value."',5)";
			$rs = mysqli_query($link,$cadena);
		}
	}
	if(isset($_POST["ofertorio"])){
		$ofertorio = $_POST["ofertorio"];
		foreach($ofertorio as $value){
			$cadena = "insert into misacancion (MISAP_Codigo,CANCP_Codigo,CATEGP_Codigo) values ('".$idmisa."','".$value."',6)";
			$rs = mysqli_query($link,$cadena);
		}
	}
	if(isset($_POST["santo"])){
		$santo = $_POST["santo"];
		foreach($santo as $value){
			$cadena = "insert into misacancion (MISAP_Codigo,CANCP_Codigo,CATEGP_Codigo) values ('".$idmisa."','".$value."',7)";
			$rs = mysqli_query($link,$cadena);
		}
	}
	if(isset($_POST["padre"])){
		$padre = $_POST["padre"];
		foreach($padre as $value){
			$cadena = "insert into misacancion (MISAP_Codigo,CANCP_Codigo,CATEGP_Codigo) values ('".$idmisa."','".$value."',8)";
			$rs = mysqli_query($link,$cadena);
		}
	}	
	if(isset($_POST["paz"])){
		$paz = $_POST["paz"];
		foreach($paz as $value){
			$cadena = "insert into misacancion (MISAP_Codigo,CANCP_Codigo,CATEGP_Codigo) values ('".$idmisa."','".$value."',9)";
			$rs = mysqli_query($link,$cadena);
		}
	}	
	if(isset($_POST["cordero"])){
		$cordero = $_POST["cordero"];
		foreach($cordero as $value){
			$cadena = "insert into misacancion (MISAP_Codigo,CANCP_Codigo,CATEGP_Codigo) values ('".$idmisa."','".$value."',10)";
			$rs = mysqli_query($link,$cadena);
		}
	}	
	if(isset($_POST["comunion"])){
		$comunion = $_POST["comunion"];
		foreach($comunion as $value){
			$cadena = "insert into misacancion (MISAP_Codigo,CANCP_Codigo,CATEGP_Codigo) values ('".$idmisa."','".$value."',11)";
			$rs = mysqli_query($link,$cadena);
		}
	}	
	if(isset($_POST["salida"])){
		$salida = $_POST["salida"];
		foreach($salida as $value){
			$cadena = "insert into misacancion (MISAP_Codigo,CANCP_Codigo,CATEGP_Codigo) values ('".$idmisa."','".$value."',13)";
			$rs = mysqli_query($link,$cadena);
		}
	}
	header("location:misas.php");		
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php include_once "header.php";?>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
 	 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 	 <script>
	  $( function() {
		$( "#datepicker" ).datepicker();
		$( "#datepicker" ).datepicker("option", "dateFormat","dd/mm/yy");
		
		$("a").click(function(){
			var id     = $(this).attr("id");
			var nombre = getCancion(id);
			var fila   = "";
			$.ajax({
				type:"POST",
				url:"cancionero/listar_canciones.php",
				data:"{}",
				contentType:"application/json",
				dataType:"json",
				success:function(resultado){
					option = "";
					$.each(resultado,function(index,value){
						option+= "<option value='"+value.idcancion+"'>"+value.titulo+"</option>";
					});
					selector  = "<select class='form-control form-control-sm' name='"+nombre+"'>"+option+"</select>";
					cajatexto = "<input type='text' name='txt"+nombre+"' class='form-control form-control-sm clasecaja'>";					
					//Construimos cada fila
					fila += "<div class='col-sm-7'>"+selector+"</div>";
					fila += "<div class='col-sm-4'>"+cajatexto+"</div>";
					$( ".col-sm-10:eq("+id+")" ).append(fila);			
				},
				error:function(){
					alert('Se producjo un error');
				}
			});
			
		    $(".clasecaja").on("keypress",function(e) {
				alert("hola");
			});	
			
			$(".btn-primary").click(function(){
				$("#frmMisa").submit();
			});		
		});
		
		function getCancion(pos){
			switch(pos){
				case '1':
					nombre = "entrada[]";break;
				case '2':
					nombre = "perdon[]";break;
				case '3':
					nombre = "gloria[]";break;
				case '4':
					nombre = "aleluya[]";break;
				case '5':
					nombre = "ofertorio[]";break;
				case '6':
					nombre = "santo[]";break;
				case '7':
					nombre = "padre[]";break;	
				case '8':
					nombre = "paz[]";break;	
				case '9':
					nombre = "cordero[]";break;	
				case '10':
					nombre = "comunion[]";break;	
				case '11':
					nombre = "salida[]";break;																																																		
				default:
					nombre = "cancion[]";break;
			}
			return nombre;
		}		
	  });
	  </script>	
</head>
<body>
	<?php
	$estadoComunidad = "";
	$estadoCancionero = "";
	$estadoMisas = "active";	
	include_once "menu.php";
	?>
	<div class="container">
	<form method="post" id="frmMisa">
		<div class="form-group"></div>
		<div class="form-group row">
			<label class="col-sm-2">Fecha</label>
			<div class="col-sm-2">
				<input type="text" name="datepicker" id="datepicker" class="form-control form-control-sm" autocomplete="off"/>			
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2">Descripcion</label>
			<div class="col-sm-10">
				<input type="text" name="descripcion" id="descripcion" class="form-control form-control-sm" autocomplete="off"/>
			</div>		
		</div>	
		<hr>
		<div class="form-group row">
			<label class="col-sm-2">ENTRADA: <a href='#' id="1"><b><font color="#FF0000">(+)</font></b></a></label>
			<div class="col-sm-10 row"></div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2">PERDON: <a href='#' id="2"><b><font color="#FF0000">(+)</font></b></a></label>
			<div class="col-sm-10 row"></div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2">GLORIA: <a href='#' id="3"><b><font color="#FF0000">(+)</font></b></a></label>
			<div class="col-sm-10 row"></div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2">ALELUYA: <a href='#' id="4"><b><font color="#FF0000">(+)</font></b></a></label>
			<div class="col-sm-10"></div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2">OFERTORIO: <a href='#' id="5"><b><font color="#FF0000">(+)</font></b></a></label>
			<div class="col-sm-10"></div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2">SANTO: <a href='#' id="6"><b><font color="#FF0000">(+)</font></b></a></label>
			<div class="col-sm-10"></div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2">P.NUESTRO: <a href='#' id="7"><b><font color="#FF0000">(+)</font></b></a></label>
			<div class="col-sm-10"></div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2">PAZ: <a href='#' id="8"><b><font color="#FF0000">(+)</font></b></a></label>
			<div class="col-sm-10"></div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2">CORDERO: <a href='#' id="9"><b><font color="#FF0000">(+)</font></b></a></label>
			<div class="col-sm-10"></div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2">COMUNION: <a href='#' id="10"><b><font color="#FF0000">(+)</font></b></a></label>
			<div class="col-sm-10"></div>
		</div>				
		<div class="form-group row">
			<label class="col-sm-2">SALIDA: <a href='#' id="11"><b><font color="#FF0000">(+)</font></b></a></label>
			<div class="col-sm-10"></div>
		</div>						
		<div style="text-align:">
			<input type="button" class="btn btn-primary" value="Guardar"/>
			<input type="button" class="btn btn-cancel" value="Cancelar" onclick="location.href='indice_momentos.php'"/>
			<input type="hidden" value="grabar" name="action" />
		</div>
	</form>
	</div>
</body>
</html>
<?php
function ReconvierteFecha($fecha){
	$arrFecha = explode("/",$fecha);
	return $arrFecha[2]."-".$arrFecha[1]."-".$arrFecha[0];
}
?>