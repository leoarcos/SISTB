<?php

include_once '../DTO/libroPacientes_DTO.php';

$num=$_POST['numero'];
$ano=$_POST['ano'];


$mngLP = new libroPacientes_DTO();
$data = $mngLP->listarPaciente($num, $ano);
echo json_encode($data);
?>
