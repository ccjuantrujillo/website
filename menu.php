<?php
if(!isset($estadoComunidad))  $estadoComunidad = "active";
if(!isset($estadoCancionero)) $estadoCancionero = "";
if(!isset($estadoMisas))      $estadoMisas = "";
if(!isset($buscarCancion))    $buscarCancion = false;

$queryCompania = "SELECT * from compania where COMPC_FlagEstado = 1 order by COMPP_Codigo desc";
$rsCompania = mysqli_query($link,$queryCompania);
$lstCompania = mysqli_fetch_all($rsCompania,MYSQLI_ASSOC);
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
         
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" 
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
        </button>
        
        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto collapse">
          <li class="nav-item">
            <form id="frmChangeSession">
              <select name="sessionCompany" id="sessionCompany" class="form-control form-control-sm"> 
                <?php 
                $compania = $_SESSION['compania'];
                foreach($lstCompania as $value){
                  $selected = $value['COMPP_Codigo']==$compania?"selected='selected'":"";
                  ?>
                    <option value="<?php echo $value['COMPP_Codigo'];?>" <?php echo $selected;?>><?php echo $value['COMPC_Descripcion'];?></option>   
                  <?php
                }
                ?>
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