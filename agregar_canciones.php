<?php
include_once "cancionero/clases/conexion.php";
$query = "select * from categoria";
$rs = mysqli_query($link,$query);
$selCategoria = "";
while($row=mysqli_fetch_array($rs)){
	$selCategoria .= "<option value='".$row['idcategoria']."'>".$row['descripcion']."</option>";
}
if(isset($_POST["action"]) && $_POST["action"]=="grabar"){
	$categoria = $_POST["categoria"];
	$nombre = $_POST["nombre"];
	$orden = $_POST["orden"];
	if($nombre!="" && $orden!=""){
		$nombre = str_replace(",","",$nombre);//Elimino comas
		$fichero_nuevo = "cancionero/".strtolower(str_replace(" ","_",$nombre)).".php";
		//Verificamos si el nombre esta repetido
		
		//Creamos el fichero	
		$copia = copy("cancionero/cancion_modelo.php",$fichero_nuevo);
		//Obtenemos el maximo orden
		$query = "select max(orden) from canciones";
		$rs = mysqli_query($link,$query);
		$row=mysqli_fetch_array($rs);
		$maximo = $row[0];
		//Insertamose en la base de datos
		$query = "insert into canciones (idcategoria,orden,titulo,url) values ('".$categoria."','".$orden."','".$nombre."','".$fichero_nuevo."')";
		$rs = mysqli_query($link,$query);
		if($copia && $rs){
			//echo "Se creo exitosamente";
			header("location:indice_momentos.php");
		}
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php include_once "header.php";?>
</head>
<body>
	<?php
	include_once "menu.php";
	?>
	<div class="container">
	<form method="post">
		<div>
			<label>Categoria</label>
			<select class="form-control" name="categoria">
				<?php echo $selCategoria;?>
			</select>
		</div>
		<div>
			<label>Nombres</label>
			<input type="text" name="nombre" id="nombre" class="form-control" />
		</div>
		<div>
			<label>Orden</label>
			<input type="text" name="orden" id="orden" class="form-control" />
		</div>		
		<div style="text-align:">
			<input type="submit" class="btn btn-primary" value="Guardar"/>
			<input type="button" class="btn btn-cancel" value="Cancelar" onclick="location.href='indice_momentos.php'"/>
			<input type="hidden" value="grabar" name="action" />
		</div>
	</form>
	</div>
</body>
</html>
