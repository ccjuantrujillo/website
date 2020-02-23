<?php
include_once "clases/conexion.php";
$query = "select cat.idcategoria,cat.descripcion,c.* 
	from canciones as c inner join categoria as cat on (cat.idcategoria=c.idcategoria)
	order by cat.idcategoria,c.orden
	";
$rs = mysqli_query($link,$query);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php include_once "header.php";?>
</head>
<body>
	<?php 
	$estadoComunidad = "";
	$estadoCancionero = "active";
	$estadoMisas = "";
	include_once "menu.php";
	?>
	<div class="container">
<h4 class="text-center">CANCIONERO MISIONERO</h4> 
<h6 class="text-center">
<a href="indice_momentos.php">Indice Momentos</a> || <a href="indice.php">Indice Alfabetico</a>
</h6>
<div style="float:right;margin-top:-30px;"><a href="agregar_canciones.php"><img src="img/agregar.png" width="24" height="24" /></a></div>
		  <?php
			$categoria_ini = "";
			while($row = mysqli_fetch_array($rs)){
				$id = $row["idcancion"];
				$categoria = $row["descripcion"];
				$orden = $row["orden"];
				$url = $row["url"];
				$titulo = $row["titulo"];
				//Mostrar el listado
				if($categoria_ini!=$categoria){
					echo "<h6 class='text-left'>".strtoupper($categoria)."</h6>";
					$categoria_ini = $categoria;
				}
				//echo "<a href='".$url."'>".$orden.". ".$titulo."</a><br>";
				?>
				<div class="row">
					<div class="col-lg col-sm col"><a href="canciones.php?orden=<?php echo $orden;?>"><?php echo $orden.". ".$titulo;?></a></div>
				</div>				
				<?php
			}
		  ?>
	</div>
</body>
</html>