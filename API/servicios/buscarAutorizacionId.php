<?php

include_once '../DTO/autorizacion_DTO.php';
 
$mngLP = new autorizacion_DTO(); 
$data = $mngLP->buscarAutorizacion($_POST['consecutivo'], $_POST['id']);

echo json_encode($data);
