<?php
include_once "clases/conexion.php";
$query = "
		select c.CANCP_Codigo idcancion,
			   concat(LPAD(cc.CATEGCANCC_Orden,3,'0'),' - ',c.CANCC_Titulo) as titulo 
		from cancion c
		inner join categoriacancion cc on (cc.CANCP_Codigo=c.CANCP_Codigo and cc.COMPP_Codigo=3)
		order by cc.CATEGCANCC_Orden 
		";
$rs = mysqli_query($link,$query);
$datos = mysqli_fetch_all($rs, MYSQLI_ASSOC);
echo json_encode($datos,JSON_UNESCAPED_UNICODE);
?>