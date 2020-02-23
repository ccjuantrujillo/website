<?php
include_once "clases/conexion.php";
include_once "clases/fpdf/fpdf.php";
$idmisa = $_GET["idmisa"];
$query = "select * from misas where idmisa='".$idmisa."'";
$rs = mysqli_query($link,$query);
$row = mysqli_fetch_array($rs);
$titulomisa = $row["descripcion"];
$fecha = $row["fecha"];
//Canciones
$query = "select a.idcategoria,a.idcancion,a.idcategoria,
	      b.titulo,b.url,b.orden,c.descripcion,c.descripcioncorta
		  from misacanciones as a 
		  inner join canciones as b on (b.idcancion=a.idcancion)
		  inner join categoria as c on (c.idcategoria=a.idcategoria)
		  where a.idmisa='".$idmisa."'		  
		  order by a.idcategoria
		  ";	  
$rs = mysqli_query($link,$query);
class PDF extends FPDF
{
	private $tituloPagina;
	// Cabecera de página
	function Header()
	{
		// Logo
		//$this->Image('logo_pb.png',10,8,33);
		// Arial bold 15
		$this->SetFont('Arial','B',15);
		// Movernos a la derecha
		$this->Cell(80);
		// Título
		$this->Cell(30,10,$this->tituloPagina,0,0,'C');
		// Salto de línea
		$this->Ln(20);
	}
	
	// Pie de página
	function Footer()
	{
		// Posición: a 1,5 cm del final
		$this->SetY(-15);
		// Arial italic 8
		$this->SetFont('Arial','I',8);
		// Número de página
		$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
	}
	function setTitulo($tit){
		$this->tituloPagina = $tit;
	}
}

// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->setTitulo($titulomisa);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
while($row=mysqli_fetch_array($rs)){
	$descripcion = strtoupper($row['descripcioncorta']);
	$titulo = strtoupper($row['titulo']);
	$idcancion = $row["idcancion"];
	$url = $row["url"];
	//Abrimos archivo a mostrar
	$archivo = fopen($url, "r");
	$contenido = "";
	while ($linea = fgets($archivo)) {
		$contenido=strip_tags($linea);
		$busca = array("A&nbsp;","B&nbsp;","C&nbsp;","D&nbsp;","E&nbsp;","F&nbsp;","G&nbsp;","&nbsp;A","&nbsp;B","&nbsp;C","&nbsp;D","&nbsp;E","&nbsp;F","&nbsp;G","&nbsp;");
		$contenido = str_replace($busca,"",$contenido);	
		$pdf->Cell(0,5,$contenido,0,1);		
	}
	//
	fclose($archivo);	
}		
$pdf->Output();
?>