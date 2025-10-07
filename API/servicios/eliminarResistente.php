<?php
include_once '../DTO/resistenteFarmacos_DTO.php';
  
$mngLP = new resistenteFarmacos_DTO();
$data = $mngLP->eliminarResistente($_POST['num'], $_POST['id']);

echo json_encode($data);

?>