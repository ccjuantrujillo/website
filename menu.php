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
                    <a class="nav-link" href="lecturas.php" onclick="$(this).addClass('disabled');">Lecturas</a>
                </li>			
                <li class="nav-item <?php echo $estadoCancionero;?>">
                    <a class="nav-link" href="cancionero/indice_momentos.php">Cancionero</a>
                </li>	
                <li class="nav-item <?php echo $estadoMisas;?>">
                    <a class="nav-link" href="cancionero/misas.php">Misas</a>
                </li>
            </ul>
	</div>
        
	<?php
	if($buscarCancion){
	?>
	<?php
	}
	?>
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" 
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
        </button>
        
        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <form id="frmChangeSession">
                    <select name="sessionCompany" id="sessionCompany" class="form-control form-control-sm" onchange="change_session();"> 
                        <option value="">CANCIONERO 2015</option> 
                        <option value="">CANCIONERO Columbano</option> 
                    </select>
                    <input type="hidden" name="caja_activa" id="caja_activa" value="<?php echo $caja_activa;?>"/>
                  </form>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
              <i class="fas fa-th-large"></i>
            </a>
          </li>
        </ul>        

    </div>
</nav>