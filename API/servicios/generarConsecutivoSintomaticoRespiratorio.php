<?php
include_once '../DTO/sintomaticoRespiratorio_DTO.php';
 
//print_r($_POST['datos']);
$mngLP = new sintomaticoRespiratorio_DTO();
$data = $mngLP->generarConsecutivo($_POST['ano']);

echo json_encode($data);

?>