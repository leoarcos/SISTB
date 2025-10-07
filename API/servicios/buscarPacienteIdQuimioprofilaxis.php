<?php

include_once '../DTO/quimioprofilaxis_DTO.php';

$mngLP = new quimioprofilaxis_DTO();
$data = $mngLP->buscarPacienteId($_POST['tipoid'], $_POST['id']);

echo json_encode($data);
