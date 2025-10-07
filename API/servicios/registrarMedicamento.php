<?php

include_once '../DTO/medicamentos_DTO.php';

$datos=$_POST['data'];
 
//print_r($_POST['data']);



$mngLP = new medicamentos_DTO();
        
$data = $mngLP->registrarMedicamento($datos);

echo json_encode($data);
