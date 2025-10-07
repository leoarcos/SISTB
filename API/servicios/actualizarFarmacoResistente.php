<?php

include_once '../DTO/resistenteFarmacos_DTO.php'; 

$mngLP = new resistenteFarmacos_DTO();
$data = $mngLP->ActualizarResistente($_POST['datos']);

echo json_encode($data);
