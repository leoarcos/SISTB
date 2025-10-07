<?php

include_once '../DTO/autorizacion_DTO.php';
 

$mngLP = new autorizacion_DTO();
$data = $mngLP->listarAutorizacionesTodas();

echo json_encode($data);
