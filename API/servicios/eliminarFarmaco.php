<?php

include_once '../DTO/medicamentos_DTO.php'; 

$mngLP = new medicamentos_DTO();
$data = $mngLP->eliminarFarmaco($_POST['datos']);

echo json_encode($data);
