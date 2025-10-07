<?php

include_once '../DTO/autorizacion_DTO.php';

$datos=$_POST['data'];
 
//print_r($_POST['data']);



$mngLP = new autorizacion_DTO();
        
$data = $mngLP->registrarAutorizacionMedicamento($datos);

echo json_encode($data);
