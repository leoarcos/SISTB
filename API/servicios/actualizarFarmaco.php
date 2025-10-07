<?php

include_once '../DTO/medicamentos_DTO.php'; 

$mngLP = new medicamentos_DTO();
$data = $mngLP->ActualizarFarmaco($_POST['datos']);

echo json_encode($data);
