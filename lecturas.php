<?php
session_start();
if(!isset($_SESSION['compania']))       $_SESSION['compania'] = 3;
include_once "cancionero/clases/conexion.php";
//Obtenemos la fecha a buscar
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
	   //Extraemos el titulo de la lectura
	   $url = "http://feed.evangelizo.org/v2/reader.php?date=".$sunday."&type=liturgic_t&lang=SP";
	   $h = fopen($url,"r");
	   $titulo = "";
	   while (!feof($h)) {
		 $titulo .= fgets($h);
	   }
	   //Extraemos el titulo de la 1er lectura
	   $url = "http://feed.evangelizo.org/v2/reader.php?date=".$sunday."&type=reading_lt&lang=SP&content=FR";
	   $h = fopen($url,"r");
	   $tituloLectura1 = "";
	   while (!feof($h)) {
		 $tituloLectura1 .= fgets($h);
	   }
	   //Extraemos el titulo de la 2da lectura
	   $url = "http://feed.evangelizo.org/v2/reader.php?date=".$sunday."&type=reading_lt&lang=SP&content=SR";
	   $h = fopen($url,"r");
	   $tituloLectura2 = "";
	   while (!feof($h)) {
		 $tituloLectura2 .= fgets($h);
	   }	
	   //Extraemos el titulo del salmo
	   $url = "http://feed.evangelizo.org/v2/reader.php?date=".$sunday."&type=reading_lt&lang=SP&content=PS";
	   $h = fopen($url,"r");
	   $tituloSalmo = "";
	   while (!feof($h)) {
		 $tituloSalmo .= fgets($h);
	   }	   
	   //Extraemos el titulo del evangelio
	   $url = "http://feed.evangelizo.org/v2/reader.php?date=".$sunday."&type=reading_lt&lang=SP&content=GSP";
	   $h = fopen($url,"r");
	   $tituloEvangelio = "";
	   while (!feof($h)) {
		 $tituloEvangelio .= fgets($h);
	   }	
	   //Extraemos el titulo del comentario
	   $url = "http://feed.evangelizo.org/v2/reader.php?date=".$sunday."&type=comment_t&lang=SP";
	   $h = fopen($url,"r");
	   $tituloComentario = "";
	   while (!feof($h)) {
		 $tituloComentario .= fgets($h);
	   }		   
	   //Extraemos el texto del evangelio
	   $url = "http://feed.evangelizo.org/v2/reader.php?date=".$sunday."&type=reading&lang=SP&content=GSP";
	   $h = fopen($url,"r");
	   $textoEvangelio = "";
	   while (!feof($h)) {
		 $textoEvangelio .= fgets($h);
	   }
	   //Extraemos el texto 1era lectura
	   $url = "http://feed.evangelizo.org/v2/reader.php?date=".$sunday."&type=reading&lang=SP&content=FR";
	   $h = fopen($url,"r");
	   $texto1eraLectura = "";
	   while (!feof($h)) {
		 $texto1eraLectura .= fgets($h);
	   }	  
	   //Extraemos el texto salmo
	   $url = "http://feed.evangelizo.org/v2/reader.php?date=".$sunday."&type=reading&lang=SP&content=PS";
	   $h = fopen($url,"r");
	   $textoSalmo = "";
	   while (!feof($h)) {
		 $textoSalmo .= fgets($h);
	   }	    
	   //Extraemos el texto 2da lectura
	   $url = "http://feed.evangelizo.org/v2/reader.php?date=".$sunday."&type=reading&lang=SP&content=SR";
	   $h = fopen($url,"r");
	   $texto2daLectura = "";
	   while (!feof($h)) {
		 $texto2daLectura .= fgets($h);
	   }	
	   //Extraemos el texto del comentario
	   $url = "http://feed.evangelizo.org/v2/reader.php?date=".$sunday."&type=comment&lang=SP";
	   $h = fopen($url,"r");
	   $textoComentario = "";
	   while (!feof($h)) {
		 $textoComentario .= fgets($h);
	   }		      	         
	  ?>
      <div class="row">
        <!-- Post Content Column -->
        <div class="col-lg-8">
		  <div class="row">
			<input type="hidden" name="sunday" id="sunday" value="<?php echo $sunday;?>"/>		  
			<div class="col-lg-10 align-self-baseline"><h4 class="mt-4"><strong><?php echo strtoupper($titulo);?></strong></h4></div>
			<div class="col-lg-2 align-self-center">
				<a href="lecturas.php?dia=<?php echo date("Ymd",strtotime($sunday."- 1 days"));?>"><<<</a>
				<a href="lecturas.php?dia=<?php echo date("Ymd",strtotime($sunday."+ 1 days"));?>">>>></a>
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
			<?php 
			$pos = strpos($texto1eraLectura,"<br /><br /><br />");
			echo substr($texto1eraLectura,0,$pos);
			?>
		  </p>

          <blockquote class="blockquote">
            <p class="mb-0"><b><?php echo $tituloSalmo;?></b></p>
          </blockquote>

          <p>
	        <?php 
			$pos = strpos($textoSalmo,"<br /><br /><br />");
			echo substr($textoSalmo,0,$pos);
			?>
		  </p>
		  
          <blockquote class="blockquote">
            <p class="mb-0"><b>2da Lectura</b></p>
            <footer class="blockquote-footer">
            Lectura de la <?php echo $tituloLectura2;?></footer>
          </blockquote>
          <p>
		  <?php
		  $pos = strpos($texto2daLectura,"<br /><br /><br />");
		  echo substr($texto2daLectura,0,$pos);
		  ?>
		  </p>
          <p>Palabra de dios. R. Te alabamos, Senor. </p>
		  
          <blockquote class="blockquote">
            <p class="mb-0"><b>Evangelio</b></p>
            <footer class="blockquote-footer">
              Lectura del santo <?php echo $tituloEvangelio;?></footer>
          </blockquote>
          <p>R. Gloria a ti, Senor.<br>
           <?php 
		   $pos = strpos($textoEvangelio,"<br /><br /><br />");
		   echo substr($textoEvangelio,0,$pos);
		   ?>
		  <br>
		  Palabra del Senor. R. Gloria a ti, Senor Jesus
		  </p>  
		  
          <blockquote class="blockquote">
            <p class="mb-0"><b>Comentario</b></p>
          </blockquote>
           <?php 
		   $pos = strpos($textoComentario,"<br /><br />");
		   echo substr($textoComentario,0,$pos);
		   ?>
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