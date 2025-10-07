<?php

include_once '../DTO/stock_DTO.php';
 
  


$mngLP = new stock_DTO();
        
$data = $mngLP->listarStocksPendientes($_POST['eapb']);

echo json_encode($data);
