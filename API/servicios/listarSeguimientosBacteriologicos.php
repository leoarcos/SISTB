<?php

include_once '../DTO/resistenteFarmacos_DTO.php';

$mngLP = new resistenteFarmacos_DTO();
$data = $mngLP->listarSeguimientosBacteriologicos($_POST['num']);

echo json_encode($data);
