<?php

include_once '../DTO/autorizacion_DTO.php';

$datos=$_POST['data'];
 


$mngLP = new autorizacion_DTO();
        
$data = $mngLP->actualizarAutorizacion($datos);

echo json_encode($data);
