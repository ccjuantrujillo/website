<?php
include_once "clases/conexion.php";
$idmisa = $_GET["id"];
$query = "select * from misas where idmisa='".$idmisa."'";
$rs = mysqli_query($link,$query);
$row = mysqli_fetch_array($rs);
$titulomisa = $row["descripcion"];
$fecha = $row["fecha"];
//Canciones
$query = "select a.idcategoria,a.idcancion,a.idcategoria,
	      b.titulo,b.url,b.orden,c.descripcion,c.descripcioncorta
		  from misacanciones as a 
		  inner join canciones as b on (b.idcancion=a.idcancion)
		  inner join categoria as c on (c.idcategoria=a.idcategoria)
		  where a.idmisa='".$idmisa."'		  
		  order by a.idcategoria
		  ";
$fila = "";
$rs = mysqli_query($link,$query);
$descripcion_ant = "";
while($row=mysqli_fetch_array($rs)){
	$descripcion = strtoupper($row['descripcioncorta']);
	if($descripcion!= $descripcion_ant) $fila.="<h6>".strtoupper($row['descripcioncorta']).":</h6>";
	$descripcion_ant = $descripcion;
	$fila.="<div class='row'>";
	$fila.="<div class='col-lg col-sm col'><a href='canciones.php?orden=".$row['orden']."'>".strtoupper($row['titulo'])." (".$row['orden'].") </a></div>";
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
		<div class="col"></div>
		<div class="col text-center">
			<strong><?php echo strtoupper($titulomisa);?></strong><br>
			<strong><?php echo convierteFecha($fecha);?></strong>
		</div>
		<div class="col text-right align-self-center">
			<img src="img/word_icon.png" alt="Exportar Word" />
			<img src="img/ppt_icon.jpg" alt="Exportar PPT" />
			<a href="misa_modelo_pdf.php?idmisa=<?php echo $idmisa;?>" target="_blank"><img src="img/pdf_icon.png" alt="Exportar PDF"/></a>
	    </div>		
	</div>
	</p>  
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