<?php
include_once '../DTO/quimioprofilaxis_DTO.php';
  
$mngLP = new quimioprofilaxis_DTO();
$data = $mngLP->listarQuimioprofilaxis();

echo json_encode($data);

?>