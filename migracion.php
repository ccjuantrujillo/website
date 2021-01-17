<?php
include_once "cancionero/clases/conexion.php";
date_default_timezone_set('America/Lima');
setlocale(LC_TIME, 'spanish');
setlocale(LC_TIME, 'es_ES.UTF-8'); 
$today = date("Ymd");
if(isset($_GET["dia"])){
	$today = $_GET["dia"];
}
$diabd = date("Y-m-d",strtotime($today)); 

//Titulo de la lectura
$url = "http://feed.evangelizo.org/v2/reader.php?date=".$today."&type=liturgic_t&lang=SP";
$h = fopen($url,"r");
$titulo = "";
while (!feof($h)) {
  $titulo .= fgets($h);
}
$cadena = "insert into lectura (LECTC_Fecha,LECTC_Titulo,TIPOLECP_Codigo) values ('".$diabd."','".$titulo."',1)";
mysqli_query($link,$cadena);
echo $diabd."<br>";
echo "Ingresamos el titutlo del dia<br>";

//Titulo y Descripcion de la 1er lectura
$url = "http://feed.evangelizo.org/v2/reader.php?date=".$today."&type=reading_lt&lang=SP&content=FR";
$h = fopen($url,"r");
$tituloLectura1 = "";
while (!feof($h)) {
 $tituloLectura1 .= fgets($h);
}
$url = "http://feed.evangelizo.org/v2/reader.php?date=".$today."&type=reading&lang=SP&content=FR";
$h = fopen($url,"r");
$texto1eraLectura = "";
while (!feof($h)) {
 $texto1eraLectura .= fgets($h);
}
$cadena = "insert into lectura (LECTC_Fecha,LECTC_Titulo,LECTC_Descripcion,TIPOLECP_Codigo) 
		values ('".$diabd."','".htmlentities(htmlentities($tituloLectura1))."',
		'".htmlentities(htmlentities($texto1eraLectura))."',2)";
mysqli_query($link,$cadena);
echo $diabd."<br>";
echo "Ingresamos el titutlo de la 1era lectura <br>";

//Titulo y Descripcion de la 2da lectura
$url = "http://feed.evangelizo.org/v2/reader.php?date=".$today."&type=reading_lt&lang=SP&content=SR";
$h = fopen($url,"r");
$tituloLectura2 = "";
while (!feof($h)) {
 $tituloLectura2 .= fgets($h);
}	
$url = "http://feed.evangelizo.org/v2/reader.php?date=".$today."&type=reading&lang=SP&content=SR";
$h = fopen($url,"r");
$texto2daLectura = "";
while (!feof($h)) {
 $texto2daLectura .= fgets($h);
}	
$cadena = "insert into lectura (LECTC_Fecha,LECTC_Titulo,LECTC_Descripcion,TIPOLECP_Codigo) 
		values ('".$diabd."','".htmlentities(htmlentities($tituloLectura2))."',
		'".htmlentities(htmlentities($texto2daLectura))."',3)";
mysqli_query($link,$cadena);
echo "Ingresamos el titutlo de la 2da lectura <br>";

//Salmo
$url = "http://feed.evangelizo.org/v2/reader.php?date=".$today."&type=reading_lt&lang=SP&content=PS";
$h = fopen($url,"r");
$tituloSalmo = "";
while (!feof($h)) {
 $tituloSalmo .= fgets($h);
}	
$url = "http://feed.evangelizo.org/v2/reader.php?date=".$today."&type=reading&lang=SP&content=PS";
$h = fopen($url,"r");
$textoSalmo = "";
while (!feof($h)) {
 $textoSalmo .= fgets($h);
}		
$cadena = "insert into lectura (LECTC_Fecha,LECTC_Titulo,LECTC_Descripcion,TIPOLECP_Codigo) 
		values ('".$diabd."','".htmlentities(htmlentities($tituloSalmo))."',
		'".htmlentities(htmlentities($textoSalmo))."',4)";
mysqli_query($link,$cadena);
echo "Ingresamos salmo <br>";

//Evangelio
$url = "http://feed.evangelizo.org/v2/reader.php?date=".$today."&type=reading_lt&lang=SP&content=GSP";
$h = fopen($url,"r");
$tituloEvangelio = "";
while (!feof($h)) {
 $tituloEvangelio .= fgets($h);
}		
$url = "http://feed.evangelizo.org/v2/reader.php?date=".$today."&type=reading&lang=SP&content=GSP";
$h = fopen($url,"r");
$textoEvangelio = "";
while (!feof($h)) {
 $textoEvangelio .= fgets($h);
}		
$cadena = "insert into lectura (LECTC_Fecha,LECTC_Titulo,LECTC_Descripcion,TIPOLECP_Codigo) 
		values ('".$diabd."','".htmlentities(htmlentities($tituloEvangelio))."',
		'".htmlentities(htmlentities($textoEvangelio))."',5)";
mysqli_query($link,$cadena);
echo "Ingresamos evangelio <br>";

//Comentario
$url = "http://feed.evangelizo.org/v2/reader.php?date=".$today."&type=comment_t&lang=SP";
$h = fopen($url,"r");
$tituloComentario = "";
while (!feof($h)) {
 $tituloComentario .= fgets($h);
}			
$url = "http://feed.evangelizo.org/v2/reader.php?date=".$today."&type=comment&lang=SP";
$h = fopen($url,"r");
$textoComentario = "";
while (!feof($h)) {
 $textoComentario .= fgets($h);
}		
$cadena = "insert into lectura (LECTC_Fecha,LECTC_Titulo,LECTC_Descripcion,TIPOLECP_Codigo) 
values ('".$diabd."','".htmlentities(htmlentities($tituloComentario))."',
'".htmlentities(htmlentities($textoComentario))."',6)";
mysqli_query($link,$cadena);
echo "Ingresamos comentario <br>";
?>