<?php
include_once "clases/conexion.php";
$query = "select * from canciones order by titulo";
$rs = mysqli_query($link,$query);
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
	<div>
		<h4 class="text-center">CANCIONERO MISIONERO</h4> 
		<h6 class="text-center">
			<a href="indice_momentos.php">Indice Momentos</a> || <a href="indice.php">Indice Alfabetico</a>
		</h6>		
		<div style="float:right;margin-top:-30px;"><a href="agregar_canciones.php"><img src="img/agregar.png" width="24" height="24" /></a></div>
	</div>
		  <?php
		  $capital_ini="";
			while($row = mysqli_fetch_array($rs)){
				$orden = $row["orden"];
				$url = $row["url"];
				$titulo = $row["titulo"];
				$capital = strtoupper(substr($titulo,0,1));			
				if($capital_ini!=$capital){
					echo "<h6 class='text-left'>".$capital."</h6>";
					$capital_ini = $capital;
				} 		
				?>
				<div class="row">
					<div class="col-lg col-sm col"><a href="<?php echo $url;?>"><?php echo $titulo;?></a></div>
					<div class="col-lg col-sm col text-left"><?php echo $orden;?></div>
				</div>
				<?php
			}
		  ?>			
</div>
</body>
</html>
