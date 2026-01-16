<?php



    header('Content-Type: application/json');

include_once '../DTO/libropacientes_DTO.php';

 



$inst = new libropacientes_DTO();



    $json = file_get_contents('php://input');

    

    $data = json_decode($json);

       

    $dataOut= $inst->registrarLibroPacientes($data);

  



    echo json_encode($dataOut);  



?>