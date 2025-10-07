<?php

include_once '../DTO/stock_DTO.php';
 
  
$mngLP = new stock_DTO();
        
$data = $mngLP->listarStocks($_POST['ESTADO']);

echo json_encode($data);
