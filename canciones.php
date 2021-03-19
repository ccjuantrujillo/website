<?php
session_start();
include_once "cancionero/clases/conexion.php";
$orden = $_REQUEST["orden"];
$query = "
		SELECT cat.CATEGP_Codigo,
			   cat.CATEGC_Descripcion,
			   c.*,cc.* 
		FROM cancion AS c
		INNER JOIN categoriacancion cc ON (cc.CANCP_Codigo=c.CANCP_Codigo AND cc.COMPP_Codigo=3)
		INNER JOIN categoria AS cat ON (cat.CATEGP_Codigo=cc.CATEGP_Codigo)	
		where cc.CATEGCANCC_Orden='".$orden."'
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
	<input type="hidden" name="orden" id="orden" value="<?php echo $orden;?>"/>
	<div style="float:left;text-align:left;vertical-align:top;font:18px arial, sans-serif;"><a href="#" id="atras"><<<</a></div>
	<div style="float:right;text-align:right;vertical-align:top;font:18px arial, sans-serif;"><a href="#" id="sgte">>>></a></div>
	<?php
	$row = mysqli_fetch_array($rs);
	$url = 	"cancionero/".$row["CANCC_Url"];
	include_once $url;
	?>
</div>
</body>
</html>