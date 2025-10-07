<?php

include_once '../DTO/autorizacion_DTO.php';
 
$mngLP = new autorizacion_DTO(); 
$data = $mngLP->listarMedicamentosAutorizacion($_POST['consecutivoautorizacion']);

echo json_encode($data);
