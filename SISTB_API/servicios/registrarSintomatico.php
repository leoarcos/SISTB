<?php



    header('Content-Type: application/json');

include_once '../DTO/sintomaticos_DTO.php';

 



$inst = new sintomaticos_DTO();



    $json = file_get_contents('php://input');

    

    $data = json_decode($json);

       

    $dataOut= $inst->registrarsintomaticoRespiratorio($data);

  



    echo json_encode($dataOut);  



?>