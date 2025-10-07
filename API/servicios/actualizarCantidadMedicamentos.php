<?php

include_once '../DTO/medicamentos_DTO.php';
 
$mngLP = new medicamentos_DTO(); 
$data = $mngLP->actualizarCantidadMedicamentos($_POST['medicamentos']);

echo json_encode($data);
