<?php
include_once "clases/conexion.php";
$query = "select idcancion,concat(LPAD(orden,3,'0'),' - ',titulo) as titulo from canciones order by titulo ";
$rs = mysqli_query($link,$query);
$datos = mysqli_fetch_all($rs, MYSQLI_ASSOC);
echo json_encode($datos,JSON_UNESCAPED_UNICODE);
?>