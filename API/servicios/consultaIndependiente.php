<?php

include_once '../DTO/app_DTO.php';

$sql=$_POST['sql']; 

$mngLP = new app_DTO();
$data = $mngLP->consultaIndependiente($sql);
//echo "<script>alert('RegistroEliminado con Exito');</script>";
//header('Location: ../src/vistas/libroPacientes/');
echo json_encode($data);
?>
