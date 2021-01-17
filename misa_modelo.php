<?php
include_once "cancionero/clases/conexion.php";
$idmisa = $_GET["id"];
$query = "select * from misa where MISAP_Codigo='".$idmisa."'";
$rs = mysqli_query($link,$query);
$row = mysqli_fetch_array($rs);
$titulomisa = $row["MISAC_Descripcion"];
$fecha = $row["MISAC_Fecha"];

//Canciones
$query = "select a.CATEGP_Codigo, 
				 a.CANCP_Codigo, 
				 a.CATEGP_Codigo, 
				 b.CANCC_Titulo, 
				 b.CANCC_Url, 
				 cc.CATEGCANCC_Orden, 
				 c.CATEGC_Descripcion, 
				 c.CATEGC_DescripcionCorta 
		  from misacancion as a 
		  inner join cancion as b on (b.CANCP_Codigo=a.CANCP_Codigo)
		  inner join categoriacancion as cc on (cc.CANCP_Codigo = b.CANCP_Codigo and cc.COMPP_Codigo = 3)
		  inner join categoria as c on (c.CATEGP_Codigo=a.CATEGP_Codigo)
		  where a.MISAP_Codigo='".$idmisa."'		  
		  order by a.CATEGP_Codigo
		  ";

$fila = "";
$rs = mysqli_query($link,$query);
$descripcion_ant = "";
while($row=mysqli_fetch_array($rs)){
	$descripcion = strtoupper($row['CATEGC_DescripcionCorta']);
	if($descripcion!= $descripcion_ant) $fila.="<h6>".strtoupper($row['CATEGC_DescripcionCorta']).":</h6>";
	$descripcion_ant = $descripcion;
	$fila.="<div class='row'>";
	$fila.="<div class='col-lg col-sm col'><a href='canciones.php?orden=".$row['CATEGCANCC_Orden']."'>".strtoupper($row['CANCC_Titulo'])." (".$row['CATEGCANCC_Orden'].") </a></div>";
	$fila.="</div>";
}		  
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
	<div class="row">
		<div class="col text-center">
			<strong><?php echo strtoupper($titulomisa);?></strong><br>
			<strong><?php echo convierteFecha($fecha);?></strong>
		</div>
		
		<div style="float:right;text-align:center;vertical-align:top;">
			<!--img src="img/word_icon.png" alt="Exportar Word" /-->
			<!--img src="img/ppt_icon.jpg" alt="Exportar PPT" /-->
			<a href="misa_modelo_pdf.php?idmisa=<?php echo $idmisa;?>" target="_blank"><img src="img/pdf_icon.png" alt="Exportar PDF"/></a>
	    </div>		
	</div>
 
	<?php echo $fila;?>
</div>
</body>
</html>
<?php
function convierteFecha($fecha){
	$arrFecha = explode("-",$fecha);
	return $arrFecha[2]."/".$arrFecha[1]."/".$arrFecha[0];
}
?>