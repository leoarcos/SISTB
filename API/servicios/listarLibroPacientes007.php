<?php

include_once '../DTO/libroPacientes_DTO.php';

$mngLP = new libroPacientes_DTO();
$data = $mngLP->listarPacientes007($_POST['ano']);

echo json_encode($data);
