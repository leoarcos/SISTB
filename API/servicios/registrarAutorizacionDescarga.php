<?php

include_once '../DTO/autorizacion_DTO.php';
 
$mngLP = new autorizacion_DTO(); 
$data = $mngLP->registrarAutorizacionDescarga($_POST['datos']);

echo json_encode($data);
