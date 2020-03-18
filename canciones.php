<?php
include_once "cancionero/clases/conexion.php";
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
	<input type="hidden" name="orden" id="orden" value="<?php echo $orden;?>"/>
	<div style="float:left;text-align:left;vertical-align:top;font:18px arial, sans-serif;"><a href="#" id="atras"><<<</a></div>
	<div style="float:right;text-align:right;vertical-align:top;font:18px arial, sans-serif;"><a href="#" id="sgte">>>></a></div>
	<?php
	$row = mysqli_fetch_array($rs);
	$url = 	"cancionero/".$row["url"];
	include_once $url;
	?>
</div>
</body>
</html>