<?php

include_once '../DTO/resistenteFarmacos_DTO.php';


$mngLP = new resistenteFarmacos_DTO(); 
$data = $mngLP->registrarSeguimientoBacteriologico($_POST['datos']);


echo json_encode($data);
