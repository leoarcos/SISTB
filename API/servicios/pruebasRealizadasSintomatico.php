<?php
include_once '../DTO/sintomaticoRespiratorio_DTO.php';
  
$mngLP = new sintomaticoRespiratorio_DTO();
$data = $mngLP->listarPruebasRealizadasEspecifico($_POST['datos']);

echo json_encode($data);

?>