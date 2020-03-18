<?php
if(!isset($estadoComunidad))  $estadoComunidad = "active";
if(!isset($estadoCancionero)) $estadoCancionero = "";
if(!isset($estadoMisas))      $estadoMisas = "";
if(!isset($buscarCancion))    $buscarCancion = false;
?>
<nav class="navbar navbar-expand-lg navbar-expand-md navbar-expand-sm navbar-dark bg-primary">
  <div class="container"> 
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item <?php echo $estadoComunidad;?>">
				<a class="nav-link" href="http://www.comunidadsantarosa.org/comunidad.php">Lecturas</a>
			</li>			
			<li class="nav-item <?php echo $estadoCancionero;?>">
				<a class="nav-link" href="http://www.comunidadsantarosa.org/cancionero/indice_momentos.php">Cancionero</a>
			</li>	
			<li class="nav-item <?php echo $estadoMisas;?>">
				<a class="nav-link" href="http://www.comunidadsantarosa.org/cancionero/misas.php">Misas</a>
			</li>
		</ul>
	</div>
	<?php
	if($buscarCancion){
	?>
	<?php
	}
	?>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	  </button>

	    </div>
</nav>