<?php
//Obtenemos la fecha a buscar
include_once "cancionero/clases/conexion.php";
date_default_timezone_set('America/Lima');
setlocale(LC_TIME, 'spanish');
setlocale(LC_TIME, 'es_ES.UTF-8');
$today = date("Ymd");
if(isset($_GET["dia"])){
	$sunday = $_GET["dia"];
}
else{
	if(date("w")!=0){
		$sunday = date("Ymd",strtotime($today."+ ".(7-date("w"))." days")); 	
	}
	else{
		$sunday = $today;
	}
}
$fechabd = date("Y-m-d",strtotime($sunday)); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
	  <?php include_once "header.php";?>
  </head>
  <body>
    <!-- Navigation -->
	<?php include_once("menu.php");?>

    <!-- Page Content -->
    <div class="container">
	  <?php
	   	$query = "select * from lectura where LECTC_Fecha='".$fechabd."'";	      	         
		$rs    = mysqli_query($link,$query);
		while($row=mysqli_fetch_array($rs)){
			$tipo   = $row["TIPOLECP_Codigo"];
			$titulo[$tipo] =  $row["LECTC_Titulo"];
			$desc[$tipo]   =  $row["LECTC_Descripcion"];
		}
		$titulo = $titulo[1];
		$tituloLectura1   = html_entity_decode(html_entity_decode($titulo[2]));
		$texto1eraLectura = html_entity_decode(html_entity_decode($desc[2]));
		$tituloSalmo      = html_entity_decode(html_entity_decode($titulo[4]));
		$textoSalmo       = html_entity_decode(html_entity_decode($desc[4])); 
		$tituloLectura2   = html_entity_decode(html_entity_decode($titulo[3]));
		$texto2daLectura  = html_entity_decode(html_entity_decode($desc[3]));
		$tituloEvangelio  = html_entity_decode(html_entity_decode($titulo[5]));
		$textoEvangelio   = html_entity_decode(html_entity_decode($desc[5]));
		$tituloComentario = html_entity_decode(html_entity_decode($titulo[6]));
		$textoComentario  = html_entity_decode(html_entity_decode($desc[6]));
	  ?>
      <div class="row">
        <!-- Post Content Column -->
        <div class="col-lg-8">
		  <div class="row">
			<input type="hidden" name="sunday" id="sunday" value="<?php echo $sunday;?>"/>		  
			<div class="col-lg-10 align-self-baseline">
				<h4 class="mt-4"><strong><?php echo strtoupper($titulo);?></strong></h4>
			</div>
			<div class="col-lg-2 align-self-center">
				<a href="lecturas2.php?dia=<?php echo date("Ymd",strtotime($sunday."- 1 days"));?>"><<<</a>
				<a href="lecturas2.php?dia=<?php echo date("Ymd",strtotime($sunday."+ 1 days"));?>">>>></a>
		     </div>
		  </div>
          <h4 class="mt-1"><?php echo $tituloComentario;?></h4>		  
          <p>Publicado el <?php echo date("j F, Y", strtotime($sunday));?></p>

          <!--hr>

          <!-- Preview Image -->
          <!--img class="img-fluid rounded" src="http://placehold.it/900x300" alt="">

          <hr>

          <!-- Post Content -->
          <blockquote class="blockquote">
            <p class="mb-0">
			<b>1era Lectura:</b>
			</p>
          </blockquote>

          <p>Lectura del <?php echo $tituloLectura1;?><br>
			<?php echo $texto1eraLectura;?>
		  </p>

          <blockquote class="blockquote">
            <p class="mb-0"><b><?php echo $tituloSalmo;?></b></p>
          </blockquote>

          <p>
	        <?php echo $textoSalmo;?>
		  </p>
		  
          <blockquote class="blockquote">
            <p class="mb-0"><b>2da Lectura</b></p>
            <footer class="blockquote-footer">
            Lectura de la <?php echo $tituloLectura2;?></footer>
          </blockquote>
          <p>
		  <?php echo $texto2daLectura;?>
		  </p>
          <p>Palabra de dios. R. Te alabamos, Senor. </p>
		  
          <blockquote class="blockquote">
            <p class="mb-0"><b>Evangelio</b></p>
            <footer class="blockquote-footer">
              Lectura del santo <?php echo $tituloEvangelio;?></footer>
          </blockquote>
          <p>R. Gloria a ti, Senor.<br>
           <?php echo $textoEvangelio;?>
		  <br>
		  Palabra del Senor. R. Gloria a ti, Senor Jesus
		  </p>  
		  
          <blockquote class="blockquote">
            <p class="mb-0"><b>Comentario</b></p>
          </blockquote>
           <?php echo $textoComentario;?>
		  </p>  
		  
          <hr>
        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">

     <!-- Recent post -->
	<?php include_once "articulos.php";?>

          <!-- Archives -->
          <!--div class="card mb-4">
             <h5 class="card-header">Archivos</h5>
            <div class="card-body">
              <ul class="list-unstyle mb-0">
                <li>
                  <a href="#">Enero 2018</a>
                </li>                  
                <li>
                  <a href="#">Diciembre 2017</a>
                </li>
              </ul>
            </div>
          </div>

          <!-- Side Widget -->
		<?php include_once("acerca.php");?>
        </div>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->


    <!-- Bootstrap core JavaScript -->
	
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>

  </body>

</html>