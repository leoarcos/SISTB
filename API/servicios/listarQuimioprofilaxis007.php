<?php
include_once '../DTO/quimioprofilaxis_DTO.php';
  
$mngLP = new quimioprofilaxis_DTO();
$data = $mngLP->listarQuimioprofilaxis007($_POST['ano']);

echo json_encode($data);

?>