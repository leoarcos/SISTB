<?php
include_once '../DTO/stock_DTO.php';
 
//print_r($_POST['datos']);
$mngLP = new stock_DTO();
$data = $mngLP->actualizarStock($_POST['datos']);

echo json_encode($data);

?>