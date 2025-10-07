<?php
include_once '../DTO/quimioprofilaxis_DTO.php';
 
//print_r($_POST['datos']);
$mngLP = new quimioprofilaxis_DTO();
$data = $mngLP->generarConsecutivo($_POST['ano']);

echo json_encode($data);

?>