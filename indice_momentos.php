<?php
include_once "cancionero/clases/conexion.php";
$busqueda = "";
$valor = "";
if(isset($_REQUEST["busqueda"]))   $busqueda = "where c.titulo like '%".$_REQUEST["busqueda"]."%'";
if(isset($_REQUEST["busqueda"]))   $valor = $_REQUEST["busqueda"];
$query = "
		SELECT cat.CATEGP_Codigo,
			   cat.CATEGC_Descripcion,
			   c.*,cc.* 
		FROM cancion AS c
		INNER JOIN categoriacancion cc ON (cc.CANCP_Codigo=c.CANCP_Codigo AND cc.COMPP_Codigo=3)
		INNER JOIN categoria AS cat ON (cat.CATEGP_Codigo=cc.CATEGP_Codigo)
		".$busqueda."
		ORDER BY cat.CATEGP_Codigo,cc.CATEGCANCC_Orden
	";
$rs = mysqli_query($link,$query);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php include_once "header.php";?>
    <script>
    $(document).ready(function(){
            val = $('#busqueda').val();
            $('#busqueda').focus().val("").val(val);

            /*$("#busqueda").keyup(function(){
                    var tamano = $("#busqueda").val().length;
                    if(tamano>3){
                            $("#frmBusqueda").submit();
                    }
            }); */
    });
    </script>
</head>
<body>
    <?php 
    $estadoComunidad = "";
    $estadoCancionero = "active";
    $estadoMisas = "";
    $buscarCancion = true;
    include_once "menu.php";
    ?>
    <div class="container">
    <form method="post" id="frmBusqueda">
      <input class="form-control mr-sm-2" type="search" placeholder="Buscar cancion" id="busqueda" name="busqueda" value="<?php echo $valor;?>">
      <!--button class="btn btn-outline-info my-2 my-sm-0" type="submit">Login</button-->
    </form> 	
    <div style="float:right;margin-top:0px;">
        <a href="agregar_canciones.php"><img src="img/agregar.png" width="24" height="24" /></a>
    </div>
        <?php
              $categoria_ini = "";
              while($row = mysqli_fetch_array($rs)){
                      $id = $row["CANCP_Codigo"];
                      $categoria = $row["CATEGC_Descripcion"];
                      $orden = $row["CATEGCANCC_Orden"];
                      $url = $row["CANCC_Url"];
                      $titulo = $row["CANCC_Titulo"];
                      //Mostrar el listado
                      if($categoria_ini!=$categoria){
                              echo "<h6 class='text-left'><strong>".strtoupper($categoria)."</strong></h6>";
                              $categoria_ini = $categoria;
                      }
                      //echo "<a href='".$url."'>".$orden.". ".$titulo."</a><br>";
                      ?>
                      <div class="row">
                              <div class="col-lg col-sm col"><a href="canciones.php?orden=<?php echo $orden;?>"><?php echo $orden.". ".$titulo;?></a></div>
                      </div>				
                      <?php
              }
        ?>
    </div>
</body>
</html>