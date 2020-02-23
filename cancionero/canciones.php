<?php
include_once "clases/conexion.php";
$orden = $_REQUEST["orden"];
$query = "select cat.idcategoria,cat.descripcion,c.* 
	from canciones as c inner join categoria as cat on (cat.idcategoria=c.idcategoria)
	where c.orden='".$orden."'
	";
$rs = mysqli_query($link,$query);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <?php include_once "header.php";?>
  <script src="js/site.js"></script>  
</head>
<body>
<?php 
$estadoComunidad = "";
$estadoCancionero = "active";
$estadoMisas = "";
include_once "menu.php"; 
?>
<div class="container">
	<?php
	$row = mysqli_fetch_array($rs);
	$url = 	$row["url"];
	include_once $url;
	?>
	<div class="row">
		<input type="hidden" name="orden" id="orden" value="<?php echo $orden;?>"/>
		<div class="col"><button type="button" class="btn btn-link" id="atras">Anterior</button></div>
		<div class="col text-right"><button type="button" class="btn btn-link" id="sgte">Siguiente</button></div>
	</div>	
</div>
</body>
</html>