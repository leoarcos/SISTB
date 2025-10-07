<?php

include_once '../DTO/resistenteFarmacos_DTO.php';

$mngLP = new resistenteFarmacos_DTO();
$data = $mngLP->ListarPacientes();

echo json_encode($data);
