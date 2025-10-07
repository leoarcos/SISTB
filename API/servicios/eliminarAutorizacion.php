<?php

include_once '../DTO/autorizacion_DTO.php';
 
$mngLP = new autorizacion_DTO();
$data = $mngLP->eliminarAutorizacion($_POST['id']);

echo json_encode($data);
