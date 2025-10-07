<?php

include_once '../DTO/resistenteFarmacos_DTO.php';

$mngLP = new resistenteFarmacos_DTO();
$data = $mngLP->buscarPacienteId($_POST['tipoid'], $_POST['id']);

echo json_encode($data);
