<?php

include_once '../DTO/stock_DTO.php';
 
  
$mngLP = new stock_DTO();
        
$data = $mngLP->listarAutorizacionIpsMedicamentos($_POST['consecutivoAutorizacion']);

echo json_encode($data);
