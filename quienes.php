<?php  
session_start();
include_once "cancionero/clases/conexion.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
	  <?php include_once "header.php";?>
  </head>
  <body class="fondo">
    <!-- Navigation -->
	<?php include_once("menu.php");?>

    <!-- Page Content -->
    <div class="container">

      <div class="row fondo">

        <!-- Post Content Column -->
        <div class="col-lg-8">
			<div class="col col-lg-auto col-md-auto col-sm-auto">
				<p><img src="img/1.jpg" width="401" height="572" class="img-fluid"/></p>
				<p><img src="img/2.jpg" width="401" height="572" class="img-fluid"> </p>
				<p><img src="img/3.jpg" width="401" height="579" class="img-fluid"></p>
				<p><img src="img/4.jpg" width="401" height="549" class="img-fluid"></p>
				<p><img src="img/5.jpg" width="401" height="588" class="img-fluid"></p>
				<p><img src="img/6.jpg" width="401" height="579" class="img-fluid"></p>
				<p><img src="img/7.jpg" width="401" height="582" class="img-fluid"></p>
				<p><img src="img/8.jpg" width="401" height="579" class="img-fluid"></p>
				<p><img src="img/9.jpg" width="401" height="577" class="img-fluid"></p>
				<p><img src="img/10.jpg" width="401" height="575" class="img-fluid"></p>
				<p><img src="img/11.jpg" width="401" height="578" class="img-fluid"></p>
				<p><img src="img/12.jpg" width="401" height="583" class="img-fluid"></p>
			</div>
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
          <div class="card my-4">
            <h5 class="card-header">Acerca de mí</h5>
            <div class="card-body">
              La Capilla Santa Rosa tuvo sus orígenes en la época de los yanaconas del Ex Fundo Santa Rosa...            </div>
          </div>
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