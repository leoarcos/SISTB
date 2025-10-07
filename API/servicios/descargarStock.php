<?php
include_once '../DTO/stock_DTO.php';
 
  


 $mngLP = new stock_DTO();
         
 $data = $mngLP->descargarStock($_POST['datos']);
 
 echo json_encode($data);
 ?>