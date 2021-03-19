<?php  
session_start();
$_SESSION['compania'] = $_POST['compania'];
$json = array("result" => "success", "message" => 'Cambio completo, actualice la página.');  
echo json_encode($json);
die;
?>