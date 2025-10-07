<?php
include_once '../DTO/quimioprofilaxis_DTO.php';
  
$mngLP = new quimioprofilaxis_DTO();
$data = $mngLP->eliminarQuimioprofilaxis($_POST['datos']);

echo json_encode($data);

?>