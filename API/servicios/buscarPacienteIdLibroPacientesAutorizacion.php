<?php

include_once '../DTO/libroPacientes_DTO.php';

$mngLP = new libroPacientes_DTO();
$data = $mngLP->buscarPacienteIdAutorizacion($_POST['tipoid'], $_POST['id']);

echo json_encode($data);
