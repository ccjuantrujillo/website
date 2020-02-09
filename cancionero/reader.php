<?php
$archivo = fopen("archivos/textos/paz_amor_bendicion.txt", "r");
while ($linea = fgets($archivo)) {
    $linea = urlencode($linea);
	echo urldecode($linea)."<br>";
    $aux[] = $linea;    
}
fclose($archivo);