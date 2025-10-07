<?php
include_once '../DTO/sintomaticoRespiratorio_DTO.php';
  
$mngLP = new sintomaticoRespiratorio_DTO();
$data = $mngLP->listarSintomaticoRespiratorio();

echo json_encode($data);

?>