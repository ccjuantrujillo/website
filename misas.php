<?php
session_start();
if(!isset($_SESSION['compania']))       $_SESSION['compania'] = 3;
include_once "cancionero/clases/conexion.php";
$hoy = date("Y-m-d",time());
$query = "select * from misa where MISAC_Fecha='".$hoy."'";
$rs = mysqli_query($link,$query);
/*if(mysqli_num_rows($rs)>0){
	$row = mysqli_fetch_array($rs);
	$url = $row["url"];
	header("location:".$url);
}
else{*/
$query = "select * from misa order by MISAC_Fecha desc";
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
	$estadoCancionero = "";
	$estadoMisas = "active";	
	include_once "menu.php";
	?>
	<div class="container">
		<div class="text-center"><H5><STRONG>MISAS Y LITURGIAS</STRONG></H5></div>
                <div style="float:right;margin-top:0px;"><a href="agregar_misas.php"><img src="img/agregar.png" width="24" height="24" /></a></div>
		  <?php
		    $ano_ant = 0;
			while($row = mysqli_fetch_array($rs)){
				$idmisa = $row["MISAP_Codigo"];
				$fecha = $row["MISAC_Fecha"];
				$url = "misa_modelo.php?id=".$idmisa;				
				$descripcion = $row["MISAC_Descripcion"];		
				$ano   = explode("-",$fecha)[0];
				if($ano!=$ano_ant){
					echo "<h5><strong>".$ano."</strong></h5>";
				}
				$ano_ant = $ano;
				?>
				<div class="row">
					<div class="col-lg-2 col-md-2 col-5"><?php echo convierteFecha($fecha);?></a></div>
					<div class="col-lg-10 col-md-10 col-7"><a href="<?php echo $url;?>"><?php echo $descripcion;?></a></div>
				</div>
				<?php
			}
		  ?>	
	</div>
</body>
</html>
<?php
//}
?>
<?php
function convierteFecha($fecha){
	$arrFecha = explode("-",$fecha);
	return $arrFecha[2]."/".$arrFecha[1]."/".$arrFecha[0];
}
?>
