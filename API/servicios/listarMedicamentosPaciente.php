<?php

include_once '../DTO/autorizacion_DTO.php';
 
$mngLP = new autorizacion_DTO(); 
$data = $mngLP->listarMedicamentosPaciente($_POST['id'], $_POST['tipoid']);

echo json_encode($data);
