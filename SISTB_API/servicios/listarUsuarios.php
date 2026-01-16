<?php



    header('Content-Type: application/json');

include_once '../DTO/user_DTO.php';

 



$inst = new user_DTO();



    $json = file_get_contents('php://input');

    

    $data = json_decode($json);

    $dataOut= $inst->listarUsuarios($data);

  



    echo json_encode($dataOut);  



?>