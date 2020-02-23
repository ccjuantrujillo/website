<?php
if(!isset($estadoComunidad))  $estadoComunidad = "active";
if(!isset($estadoCancionero)) $estadoCancionero = "";
if(!isset($estadoMisas))      $estadoMisas = "";
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item <?php echo $estadoComunidad;?>">
				<a class="nav-link" href="http://www.comunidadsantarosa.org/comunidad.php">Comunidad</a>
			</li>			
			<li class="nav-item <?php echo $estadoCancionero;?>">
				<a class="nav-link" href="http://www.comunidadsantarosa.org/cancionero/indice_momentos.php">Cancionero</a>
			</li>	
			<li class="nav-item <?php echo $estadoMisas;?>">
				<a class="nav-link" href="http://www.comunidadsantarosa.org/cancionero/misas.php">Misas</a>
			</li>
		</ul>
	</div>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
	<!--div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">&nbsp;</ul>
		<form class="form-inline my-2 my-lg-0">
			<button class="btn btn-outline-info my-2 my-sm-0" type="submit">Login</button>
		</form>
	</div-->
  </div>  
</nav>