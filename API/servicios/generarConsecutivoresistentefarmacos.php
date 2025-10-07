<?php
include_once '../DTO/resistenteFarmacos_DTO.php';
 
//print_r($_POST['datos']);
$mngLP = new resistenteFarmacos_DTO();
$data = $mngLP->generarConsecutivo();

echo json_encode($data);

?>