<?php
$archivo = fopen("iglesia_soy.php", "r");
$contenido = "";
while ($linea = fgets($archivo)) {
	$contenido.=strip_tags($linea,"<br>");
	$busca = array("A&nbsp;","B&nbsp;","C&nbsp;","D&nbsp;","E&nbsp;","F&nbsp;","G&nbsp;","&nbsp;A","&nbsp;B","&nbsp;C","&nbsp;D","&nbsp;E","&nbsp;F","&nbsp;G","&nbsp;");
	$contenido = str_replace($busca,"",$contenido);	
}
fclose($archivo);
echo $contenido;
?>