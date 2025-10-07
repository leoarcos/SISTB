<?php

include_once '../DTO/libroPacientes_DTO.php';

$mngLP = new libroPacientes_DTO();
$data = $mngLP->ListarPacientes();

echo json_encode($data);
