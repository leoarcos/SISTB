<?php

include_once '../DTO/stock_DTO.php';

$datos=$_POST['datos'];
 
//print_r($_POST['data']);



$mngLP = new stock_DTO();
        
$data = $mngLP->registrarStock($datos);

echo json_encode($data);
