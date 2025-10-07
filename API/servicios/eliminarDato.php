<?php

include_once '../DTO/libroPacientes_DTO.php';

$num=$_POST['num'];
$id=$_POST['id'];
$ano=$_POST['ano'];
$nombres=$_POST['nombres'];
$fecha=$_POST['fecha'];
$tipoid=$_POST['tipoid'];  


$mngLP = new libroPacientes_DTO();
$data = $mngLP->eliminarDato($num, $id, $ano, $nombres, $fecha, $tipoid);
//echo "<script>alert('RegistroEliminado con Exito');</script>";
//header('Location: ../src/vistas/libroPacientes/');
echo json_encode($data);
?>
