<?php
include_once "cancionero/clases/conexion.php";
$query = "SELECT * FROM misa ORDER BY MISAC_Fecha DESC LIMIT 5";
$rs = mysqli_query($link,$query);
$fila = "";
while($row = mysqli_fetch_array($rs)){
    $fila.="<li><a href='misa_modelo.php?id=".$row['MISAP_Codigo']."'>".$row['MISAC_Descripcion']."</a></li>";
}
?>
<div class="card my-4">
<h5 class="card-header">Misas recientes </h5>
<div class="card-body">
  <ul class="list-unstyle mb-0">
	<?php echo $fila;?>
  </ul>
</div>
</div>

<div class="card my-4">
<h5 class="card-header">Oraciones</h5>
<div class="card-body">
  <ul class="list-unstyle mb-0">
	<li><a href="santo_rosario.php">Santo Rosario</a></li>
  </ul>
</div>
</div>

<div class="card my-4">
<h5 class="card-header">Formacion</h5>
<div class="card-body">
  <ul class="list-unstyle mb-0">
	<li><a href="fundamentos_fe.php">Fundamentos de la fe</a></li>
    <li><a href="la_oracion.php">La oraci&oacute;n</a> </li>
  </ul>
</div>
</div>