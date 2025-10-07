<?php

include_once '../DTO/resistenteFarmacos_DTO.php';

$datos=$_POST['datos']; 

$instan = new resistenteFarmacos_DTO();
        
$data = $instan->registrarFarmacoResistente($datos);

echo json_encode($data);
