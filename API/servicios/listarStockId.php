<?php
include_once '../DTO/stock_DTO.php';
 
//print_r($_POST['datos']);
$mngLP = new stock_DTO();
$data = $mngLP->listarStockId($_GET['consecutivo']);

echo json_encode($data);

?>